<?php
// Obtener páginas necesarias
require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Proyecte 2/global.php';
require_once $_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'/BBDD/funcionesSQL.php';

// Iniciar sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si se reciben los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Registrar localmente datos
    $modelo = $_SESSION['modelo'];
    $dias = $_POST['dias'];
    $piloto = $_POST['piloto'];
    $precio_total = floatval($_POST['precio_total']);
    $_SESSION['alquileres'] = []; 

    // Buscamos y registramos ID del modelo
    $resultado = select($conexion, 'coches', 'id_coche', "modelo = '$modelo'");
    if($resultado->num_rows > 0) {
        while ($datos = $resultado->fetch_assoc()) {
            $id_coche = $datos['id_coche'];
        }
    }
    else $_SESSION['error_alquiler'] = "Error. No se ha obtenido el id del coche.";

    // Insertamos en BBDD
    insert($conexion, 'alquileres', "coche,piloto,dias,precio_total","'$id_coche','$piloto','$dias','$precio_total'");
    if($conexion->affected_rows > 0) {

        include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'obtenerAlquileres.php');
        // $resultado = select_innerjoin($conexion, 'alquileres','*','usuarios ON alquileres.piloto = usuarios.usuario',"usuario = '$piloto' ");
        // if ($resultado->num_rows > 0) {
        //     while ($datos = $resultado->fetch_assoc()) {
        //         $_SESSION['alquileres'][] = 
        //         [
        //             'modelo' => $datos['modelo'],
        //             'dias' => $datos['dias'],
        //             'piloto' => $datos['piloto'],
        //             'precio_total' => $datos['precio_total']
        //         ];
        //     }
        // }
        // else $_SESSION['error_alquiler'] = "Error. No se han obtenido resultados.";
    }
    else $_SESSION['error_alquiler'] = "Error. No se ha podido registrar el alquiler.";

    // Redirige a la página de alquileres registrados
    header("Location: ".URL_Proyecto."alquilar/alquilados.php");
    exit();
} 
// Si no se accede mediante POST vamos a lista alquileres
else {
    $_SESSION['errorsesion'] = "Acceso no autorizado. Espera..";
    header("Refresh: 5; url=".URL_Proyecto."index.php");
    exit();
}

?>