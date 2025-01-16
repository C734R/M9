<?php
// Cargar ficheros necesarios
require_once '../global.php';
require_once '../BBDD/funcionesSQL.php';

// Checkear si hay sesion abierta
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si la solicitud HTTP es tipo 'POST'
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];

    // Verificar si el usuario ya existe
    $resultado = select($conexion, 'usuarios', '*', "usuario = '$usuario'");

    // Si no obtenemos resultado (no existe)
    if ($resultado->num_rows === 0) {
        // Insertar nuevo usuario en la base de datos
        $campos = "usuario, password, nombre, apellido1, apellido2";
        $valores = "'$usuario', '$password', '$nombre', '$apellido1', '$apellido2'";

        // Tratamos de insertar el nuevo usuario en la tabla
        if (insert($conexion, 'usuarios', $campos, $valores)) {
            // Redirigir al inicio de sesión tras el registro exitoso
            $exito = "Usuario registrado con éxito.";
            header('Refresh: 5; url=iniciarsesion.php');
            exit;
        } 
        // Si no se puede
        else $error = "Error al registrar el usuario. Por favor, inténtalo de nuevo.";
    } 
    // Si ya existe
    else $error = "El usuario ya existe. Por favor, elije otro nombre de usuario.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Usuario - Underground Workshop</title>
    <link rel="stylesheet" href="<?=URL_Proyecto?>estilos/estilos.css">
    <link rel="stylesheet" href="<?=URL_Proyecto?>estilos/formulario.css">
</head>
<body>
    <?php include('../cabecera.php'); ?>
    <main>
        <!-- Formulario de datos de usuario con método POST -->
        <div class="formulario">
            <div><h2>Registrar Usuario</h2></div>
            <form action="" method="POST">
                <div>
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>

                <div>
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div>
                    <label for="apellido1">Primer Apellido:</label>
                    <input type="text" id="apellido1" name="apellido1" required>
                </div>

                <div>
                    <label for="apellido2">Segundo Apellido:</label>
                    <input type="text" id="apellido2" name="apellido2" required>
                </div>

                <br>
                <div>
                    <button type="submit">Registrar</button>
                </div>
            </form>
            <!-- Si registramos algún error en el registro, lo mostramos en rojo -->
            <?php if (!empty($error)) echo "<p style='color:red;padding:1%;'>$error</p>"; ?>
            <!-- Si se registra exitosamente, lo mostramos en verde -->
            <?php if (!empty($exito)) echo "<p style='color:green;padding:1%;'>$exito</p>"; ?>
        </div>
    </main>
    <?php include('../pie.php'); ?>
</body>
</html>
