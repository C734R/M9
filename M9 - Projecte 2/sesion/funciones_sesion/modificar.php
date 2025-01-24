<?php
// Cargar ficheros necesarios
require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Projecte 2/global.php';
require_once $_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'BBDD/funcionesSQL.php';

// Checkear si hay sesion abierta
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si la solicitud HTTP es tipo 'POST'
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Definimos variables globales en la sesión
    $_SESSION['exitousuario'] = "";
    $_SESSION['errorusuario'] = "";
    $_SESSION['exitocontraseña'] = "";
    $_SESSION['errorcontraseña'] = "";
    $_SESSION['exitonombre'] = "";
    $_SESSION['errornombre'] = "";
    
    // Tomamos nombre de usuario de la sesión para consultas BBDD
    $usuario = $_SESSION['usuario']['usuario'];

    // Si es admin, lo registramos
    $admin = $usuario === 'admin' ? true : false;

    // Si recibimos POST con usuarionuevo y no es admin
    if(!empty($_POST['usuarionuevo']) && !$admin) {

        $usuarionuevo = $_POST['usuarionuevo'];
        $resultado = select($conexion,'usuarios','*',"usuario = '$usuarionuevo'");
        
        if ($resultado->num_rows === 0) {

            $resultado = update($conexion,'usuarios',"usuario='$usuarionuevo'","usuario = '$usuario'");
        
            if ($conexion->affected_rows > 0) {
                $_SESSION['exitousuario'] = "Nombre de usuario modificado con éxito. Espera...";
                $_SESSION['usuario']['usuario'] = $usuarionuevo;
            }
            else  $_SESSION['errorusuario'] = "Error. No se ha podido modificar el nombre de usuario. Espera...";
        }
        else $_SESSION['errorusuario'] = "Error. El nombre de usuario introducido ya existe. Selecciona otro. Espera...";
    }
    elseif ($admin) $_SESSION['errorusuario'] = "Error. No se puede modificar el nombre de usuario del administrador.";

    // Si registramos algún mensaje relativo a usuario
    if(!empty($_SESSION['errorusuario']) || !empty($_SESSION['exitousuario'])) {
        echo "<meta http-equiv='refresh' content='0;url=".URL_Proyecto."sesion/areapersonal.php#botonusuario'>";
        exit();
    }

    // Si recibimos POST con password
    if(!empty($_POST['password'])) {
        $password = hash("sha256",$_POST['password']);
        // Buscar datos del usuario actual
        $resultado = select($conexion, 'usuarios', '*', "usuario = '$usuario'");

        // Si devuelve resultado (una fila)
        if ($resultado->num_rows === 1) {
            // Formateamos datos en array asociativo
            $datos = $resultado->fetch_assoc();

            // Si el dato contraseña coincide con la introducida
            if ($password === $datos['password']) {
                $passwordnueva1 = hash("sha256",$_POST['password1']);
                $passwordnueva2 = hash("sha256",$_POST['password2']);
            
                if ($passwordnueva1 === $passwordnueva2) {
                    $resultado = update($conexion, 'usuarios',"password='$passwordnueva1'","usuario = '$usuario'");
                    if ($conexion->affected_rows > 0) $_SESSION['exitocontraseña'] = "Contraseña modificada con éxito. Espera...";
                    else $_SESSION['errorcontraseña'] = "No se ha podido modificar la contraseña del usuario. Espera...";
                }
                else $_SESSION['errorcontraseña'] = "Error. Las nuevas contraseñas no coinciden. Espera...";
            }
            else $_SESSION['errorcontraseña'] = "Error. La contraseña actual introducida no coincide. Espera...";
        }
        else $_SESSION['errorcontraseña'] = "Error al acceder a los datos del servidor. Espera...";
    }

    // Si registramos algún mensaje relativo a contraseña
    if(!empty($_SESSION['errorcontraseña']) || !empty($_SESSION['exitocontraseña'])) {
        echo "<meta http-equiv='refresh' content='0;url=".URL_Proyecto."sesion/areapersonal.php#botoncontraseña'>";
        exit();
    }

    // Si recibimos POST con nombre
    if(!empty($_POST['nombre'])) {

        // Recopilamos valores introducidos
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];

        // Realizamos consulta para actualizar datos
        $resultado = update($conexion,'usuarios',"nombre='$nombre', apellido1='$apellido1', apellido2='$apellido2'","usuario = '$usuario'");

        // Si no se reportan filas modificadas es que no ha ido bien
        if ($conexion->affected_rows === 0) {
            $_SESSION['errornombre'] = "No se ha podido modificar el nombre completo del usuario. Espera...";
        } 
        // Si ha ido bien, actualizamos datos sesión   
        else{
            $_SESSION['exitonombre'] = "Se ha modificado el nombre completo del usuario con éxito. Espera...";
            $_SESSION['usuario']['nombre'] = $nombre;
            $_SESSION['usuario']['apellido1'] = $apellido1;
            $_SESSION['usuario']['apellido2'] = $apellido2;
        } 
    }

    // Si registramos algún mensaje relativo a nombre
    if(!empty($_SESSION['errornombre']) || !empty($_SESSION['exitonombre'])) {
        echo "<meta http-equiv='refresh' content='0;url=".URL_Proyecto."sesion/areapersonal.php#botonnombre'>";
        exit();
    }

    // En cualquier otro caso, volvemos a áreapersonal
    header("Location: ".URL_Proyecto."sesion/areapersonal.php");
}
?>
