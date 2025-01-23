<?php
// Cargar archivos necesarios
require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Proyecte 2/global.php';

// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si hay mensaje registrarlo, si no, definir mensaje vacío
$mensaje = !empty($_SESSION['mensajesesion']) ? $_SESSION['mensajesesion'] : "";
$error = !empty($_SESSION['errorsesion']) ? $_SESSION['errorsesion'] : "";

// Borrar la sesión activa
if (isset($_SESSION['usuario'])) {
    // Borrar todas las variables guardadas de la sesión
    session_unset();
    // Terminar la sesión del navegador
    session_destroy();
}

// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirigir al usuario a la página de inicio con mensaje
$_SESSION['mensajesesion'] = "Se ha cerrado la sesión del usuario con éxito.".(!empty($mensaje) ? " $mensaje" : "");
$_SESSION['errorsesion'] = $error;

header('Location: '.URL_Proyecto.'index.php');

?>