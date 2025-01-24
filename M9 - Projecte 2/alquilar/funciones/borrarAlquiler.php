<?php
// Cargar ficheros requeridos
require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Projecte 2/global.php';
require_once $_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'/BBDD/funcionesSQL.php';

// Iniciar sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Declarar variables sesion
$_SESSION['exito_alquilados'] = "";
$_SESSION['error_alquilados'] = "";

// Comprobar acceso mediante método POST y que existen alquileres
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['alquileres'])) {

    // Verifica si se solicita eliminar todos los registros
    if (isset($_POST['accion']) && $_POST['accion'] === 'eliminar_todo') {

        // Mientras haya alquileres registrados
        while(isset($_SESSION['alquileres'])) {
            foreach($_SESSION['alquileres'] as $alquiler) {
                delete($conexion, 'alquileres', "id_alquiler = ".$alquiler['id_alquiler']."");
                if($conexion -> affected_rows === 0) {
                    $_SESSION['error_alquilados'] .= "Error. No se ha podido eliminar alguno de los alquileres registrados.";
                    break 2;
                }
                update($conexion, 'coches', 'cantidad = (cantidad + 1)', "modelo = '".$alquiler['modelo']."'");
                if($conexion -> affected_rows === 0) {
                    $_SESSION['error_alquilados'] .= "Error. No se ha podido actualizar el número de vehículos disponibles.";
                    break 2;
                }
            }
            unset($_SESSION['alquileres']);
        }

        if(!isset($_SESSION['alquileres'])) $_SESSION['exito_alquilados'] .= "Todos los registros de alquiler han sido eliminados con éxito.";
        else $_SESSION['exito_alquilados'] .= "Ha habido algún error con la BBDD.";
    } 
    // En cualquier otro caso
    else $_SESSION['error_alquilados'] .= " Error: Acción no válida.";
} 
// Si no se accede mediante post
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_SESSION['alquileres'])) $_SESSION['error_alquilados'] = "No existen alquileres que eliminar.";
// Acceso desde cualquier otro método
else $_SESSION['error_alquilados'] = "Acceso no autorizado.";

// Volver finalmente a la lista de alquileres
header("Location: ".URL_Proyecto."alquilar/alquilados.php");
?>