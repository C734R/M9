<?php
// Cargar archivos necesarios
require_once '../../global.php';

// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si hay mensaje registrarlo, si no, definir mensaje vacío
$mensaje = !empty($_SESSION['mensajesesion']) ? $_SESSION['mensajesesion'] : "";

// Borrar la sesión activa
if (isset($_SESSION['usuario'])) {
    // Borrar todas las variables guardadas de la sesión
    session_unset();
    // Terminar la sesión del navegador
    session_destroy();
}

// Iniciar nueva sesión
session_start();

// Redirigir al usuario a la página de inicio con mensaje
$_SESSION['mensajesesion'] = "Se ha cerrado la sesión del usuario con éxito.".(!empty($mensaje) ? " $mensaje" : "");
header('Location: '.URL_Proyecto.'index.php');
exit();
?>