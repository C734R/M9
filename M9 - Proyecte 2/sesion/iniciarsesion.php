<!-- Ficheros necesarios -->
<?php
// Cargar ficheros necesarios
require_once '../global.php';
require_once '../BBDD/funcionesSQL.php';
?>

<!-- Comprobar sesión iniciada y tratar datos -->
<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Guardar mensajes de la sesión de forma local si tienen contenido
    $exito = isset($_SESSION['exito']) ? $_SESSION['exito'] : "";
    $error = isset($_SESSION['error']) ? $_SESSION['error'] : "";
    
    // Vaciar datos de la sesion
    unset($_SESSION['exito']);
    unset($_SESSION['error']);
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
            <form action="<?=URL_Proyecto?>sesion/funciones_sesion/iniciar.php" method="POST">
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
            <!-- Si los datos son correctos e iniciamos sesión -->
            <?php if (!empty($exito)) {
                echo "<p style='color:green;'>$exito</p>"; 
                header('Location: '.URL_Proyecto.'index.php');
            } 
            ?>
        </div>
    </main>
    <?php include('../pie.php'); ?>
</body>
</html>

