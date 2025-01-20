<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Proyecte 2/global.php';

// Iniciar sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Declarar variables sesion
$_SESSION['mensaje_exito'] = "";
$_SESSION['mensaje_error'] = "";

// Comprobar acceso mediante método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['alquileres'])) {
    // Verifica si se solicita eliminar todos los registros
    if (isset($_POST['accion']) && $_POST['accion'] === 'eliminar_todo') {
        unset($_SESSION['alquileres']);
        $_SESSION['mensaje_exito'] = "Todos los registros de alquiler han sido eliminados con éxito.";
    } 
    // En cualquier otro caso
    else $_SESSION['mensaje_error'] = "Error: Acción no válida.";
} 
// Si no se accede mediante post
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_SESSION['alquileres'])) $_SESSION['mensaje_error'] = "No existen alquileres que eliminar.";
else $_SESSION['mensaje_error'] = "Acceso no autorizado.";
// Volver finalmente a la lista de alquileres
header("Location: ".$_SERVER['DOCUMENT_ROOT'].URL_Proyecto."alquilar/alquilados.php");
?>