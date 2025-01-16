<?php
// Cargar archivos necesarios
require_once '../global.php';

// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Borrar la sesión activa
if (isset($_SESSION['usuario'])) {
    // Borrar todas las variables guardadas de la sesión
    session_unset();
    // Terminar la sesión del navegador
    session_destroy();
}

// Redirigir al usuario a la página de inicio con un mensaje de cierre
header('Location: ../index.php');
exit;
?>