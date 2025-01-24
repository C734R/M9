<?php
// Cargar ficheros necesarios
require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Projecte 2/global.php';
require_once $_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'BBDD/funcionesSQL.php';

// Checkear si hay sesion abierta
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Tomar usuario de la sesión
$usuario = isset($_SESSION['usuario']['usuario']) ? $_SESSION['usuario']['usuario'] : "";
$pass = isset($_SESSION['usuario']['pass']) ? $_SESSION['usuario']['pass'] : "";

// Buscar coincidencia en la base de datos
$resultado = select($conexion, 'usuarios', '*', "usuario = '$usuario'");

// Si no obtenemos resultado (no existe)
if (!empty($usuario) && !empty($pass) && $resultado->num_rows === 0){
    $_SESSION['errorsesion'] = "El usuario ha dejado de existir.".(!empty($_SESSION['errorsesion']) ? " ".$_SESSION['errorsesion'] : "");
    include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'sesion/funciones_sesion/cerrarsesion.php');
    header("Location: ".URL_Proyecto."index.php");
    exit();
}
elseif (!empty($pass) && $resultado->num_rows > 0) {
    // Obtener array asociativo de la consulta realizada
    $datos = $resultado -> fetch_assoc();

    // Comprobar coincidencia de 
    $pass_OK = $pass === hash("sha_256",$datos['password']) ? true : false;
    if (!$pass_OK){
        $_SESSION['errorsesion'] = "La contraseña registrada no coincide con la de la sesión.".(!empty($_SESSION['errorsesion']) ? " ".$_SESSION['errorsesion'] : "");
        include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'sesion/funciones_sesion/cerrarsesion.php');
        header("Location: ".URL_Proyecto."index.php");
    }
}

?>