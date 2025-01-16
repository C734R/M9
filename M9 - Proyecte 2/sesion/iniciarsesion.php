<!-- Ficheros necesarios -->
<?php
// Cargar ficheros necesarios
require_once '../global.php';
require_once '../BBDD/funcionesSQL.php';
?>

<!-- Página Inicio Sesión -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - Underground Workshop</title>
    <link rel="stylesheet" href="<?=URL_Proyecto?>estilos/estilos.css">
    <link rel="stylesheet" href="<?=URL_Proyecto?>estilos/formulario.css">
</head>
<body>
    <?php include('../cabecera.php'); ?>
    <main>
        <h1>
            INICIAR SESIÓN
        </h1>
        <div class="formulario">
            <form action="" method="POST">
                <div>
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>

                <div>
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <br>
                <div>
                    <button type="submit">Iniciar sesión</button>
                </div>
            </form>
            <!-- Si registramos algún error en el inicio de sesión, lo mostramos en rojo -->
            <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
        </div>
    </main>
    <?php include('../pie.php'); ?>
</body>
</html>

<!-- Código funcional insertado -->
<?php
// Checkear si hay sesion abierta
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si la solicitud HTTP es tipo 'POST'
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Buscar datos de usuario introducido
    $resultado = select($conexion, 'usuarios', '*', "usuario = '$usuario'");

    // Si devuelve resultado (una fila)
    if ($resultado->num_rows === 1) {
        // Formateamos datos en array de datos
        $datos = $resultado->fetch_assoc();
        // Si el dato contraseña coincide con la introducida
        if (password_verify($password, $datos['password'])) {
            // Registramos los datos de la BBDD en la sesión del navegador
            $_SESSION['usuario'] = [
                'usuario' => $datos['usuario'],
                'nombre' => $datos['nombre'],
                'apellido1' => $datos['apellido1'],
                'apellido2' => $datos['apellido2']
            ];
            // Volvemos a index.php
            header('Location: '.URL_Proyecto.'index.php');
            exit;
        } 
        // Si la contraseña no coincide
        else {
            $error = "Contraseña incorrecta.";
        }
    }
    // Si no devuelve resultado
    else {
        $error = "Usuario no encontrado.";
    }
}
?>