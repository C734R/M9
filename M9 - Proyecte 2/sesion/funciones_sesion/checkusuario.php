<?php
// Cargar ficheros necesarios
require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Proyecte 2/global.php';
require_once $_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'BBDD/funcionesSQL.php';

// Checkear si hay sesion abierta
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Tomar usuario de la sesión
$usuario = isset($_SESSION['usuario']['usuario']) ? $_SESSION['usuario']['usuario'] : "";

// Buscar coincidencia en la base de datos
$resultado = select($conexion, 'usuarios', '*', "usuario = '$usuario'");

// Si no obtenemos resultado (no existe)
if (!empty($usuario) && $resultado->num_rows === 0){
    $_SESSION['errorsesion'] = "El usuario ha dejado de existir.".(!empty($_SESSION['errorsesion']) ? " ".$_SESSION['errorsesion'] : "");
    include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'sesion/funciones_sesion/cerrarsesion.php');
}

?>