<!-- Ficheros necesarios -->
<?php
    // Cargar ficheros necesarios
    require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Proyecte 2/global.php';
    require_once $_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'BBDD/funcionesSQL.php';

    //Comprobar sesión iniciada y tratar datos
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Guardar mensajes de la sesión de forma local si tienen contenido
    $exito_iniciar = isset($_SESSION['exito_iniciar']) ? $_SESSION['exito_iniciar'] : "";
    $error_iniciar = isset($_SESSION['error_iniciar']) ? $_SESSION['error_iniciar'] : "";
    
    // Vaciar datos de la sesion
    unset($_SESSION['exito_iniciar']);
    unset($_SESSION['error_iniciar']);
?>

<!-- Página Inicio Sesión -->
<html lang="es">
<link rel="shortcut icon" href="<?=URL_Proyecto?>img/logo.ico" />
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - Underground Workshop</title>
    <link rel="stylesheet" href="<?=URL_Proyecto?>estilos/estilos.css">
    <link rel="stylesheet" href="<?=URL_Proyecto?>estilos/formulario.css">
</head>
<body>
    <?php include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'cabecera.php'); ?>
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
            <?php if (!empty($error_iniciar)) echo "<p style='color:red;'>$error_iniciar</p>"; ?>
            <!-- Si los datos son correctos e iniciamos sesión -->
            <?php if (!empty($exito_iniciar)) {
                echo "<p style='color:green;'>$exito_iniciar</p>"; 
                header('Location: '.URL_Proyecto.'index.php');
            } 
            ?>
        </div>
    </main>
    <?php include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'pie.php'); ?>
</body>
</html>

