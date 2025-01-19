<?php
// Cargar ficheros necesarios
require_once '../../global.php';
require_once '../../BBDD/funcionesSQL.php';


// Si la solicitud HTTP es tipo 'POST'
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Checkear si hay sesion abierta
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Definimos variables globales en la sesión
    $_SESSION['exito'] = "";
    $_SESSION['error'] = "";
    
    // Recopilamos datos introducidos
    $usuario = $_POST['usuario'];
    $password = hash("sha256",$_POST['password']);
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];

    // Buscar coincidencia en la base de datos
    $resultado = select($conexion, 'usuarios', '*', "usuario = '$usuario'");

    // Si no obtenemos resultado (no existe)
    if ($resultado->num_rows === 0) {
        // Insertar nuevo usuario en la base de datos
        $campos = "usuario, password, nombre, apellido1, apellido2";
        $valores = "'$usuario', '$password', '$nombre', '$apellido1', '$apellido2'";

        // Tratamos de insertar el nuevo usuario en la tabla
        if (insert($conexion, 'usuarios', $campos, $valores)) {
            // Redirigir al inicio de sesión tras el registro exitoso
            $_SESSION['exito'] = "Usuario registrado con éxito. Redirigiendo a inicio de sesión...";
        } 
        // Si no se puede registrar
        else $_SESSION['error'] = "Error al registrar el usuario. Por favor, inténtalo de nuevo.";
    } 
    // Si ya existe
    else $_SESSION['error'] = "El usuario ya existe. Por favor, elije otro nombre de usuario.";
    header("Location: ".URL_Proyecto."sesion/registrarusuario.php");
}
?>
