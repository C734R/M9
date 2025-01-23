<?php
// Cargar archivos necesarios
require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Proyecte 2/global.php';
require_once $_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'BBDD/funcionesSQL.php';

// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Tomar usuario de la sesión
$usuario = $_SESSION['usuario']['usuario'];

// Tomamos nombre de usuario de la sesión para consultas BBDD
$usuario = $_SESSION['usuario']['usuario'];

// Si es admin, lo registramos
$admin = $usuario === 'admin' ? true : false;

// Si llegamos a través de POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$admin) {

    // Eliminamos el usuario de la sesión activa
    $resultado = delete($conexion,'usuarios',"usuario = '$usuario'");

    // Si se ha modificado alguna fila es que ha funcionado
    if ($conexion->affected_rows > 0) {
        $_SESSION['mensajesesion'] = "Usuario eliminado con éxito.";
        header("Location: ".URL_Proyecto."sesion/funciones_sesion/cerrarsesion.php");
        exit();
    }
    // Si no, indicamos
    else  $_SESSION['erroreliminar'] = "Error. No se ha podido eliminar el usuario.";
}
elseif ($admin) $_SESSION['erroreliminar'] = "Error. No se puede eliminar el usuario administrador.";

// Si se produce error volvemos a área personal al espacio de eliminar usuario
if(!empty($_SESSION['erroreliminar'])) {
    echo "<meta http-equiv='refresh' content='0;url=".URL_Proyecto."sesion/areapersonal.php#botoneliminar'>";
    exit();
}

// En cualquier otro caso, volvemos a áreapersonal
header("Location: ".URL_Proyecto."sesion/areapersonal.php");
?>