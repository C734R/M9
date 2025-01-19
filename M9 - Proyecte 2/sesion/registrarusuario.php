<!-- Ficheros necesarios -->
<?php
    // Cargar ficheros necesarios
    require_once '../global.php';
?>

<!-- Comprobar sesión iniciada y tratar datos -->
<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Guardar mensajes de la sesión de forma local si tienen contenido, si no, la inicializa vacía
    $exito = isset($_SESSION['exito']) ? $_SESSION['exito'] : "";
    $error = isset($_SESSION['error']) ? $_SESSION['error'] : "";
    
    // Vaciar datos de la sesion ya guardados de forma local
    unset($_SESSION['exito']);
    unset($_SESSION['error']);
?>

<!-- Contenido a mostrar -->
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
        <h1>
            REGISTRAR NUEVO USUARIO
        </h1>
        <!-- Formulario de datos de usuario con método POST -->
        <div class="formulario">
            <div><h2>Registrar Usuario</h2></div>
            <form action="./funciones_sesion/registrar.php" method="POST">
                <div>
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" required <?php if (!empty($exito)) echo "disabled" ?>>
                </div>

                <div>
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required <?php if (!empty($exito)) echo "disabled" ?>>
                </div>

                <div>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required <?php if (!empty($exito)) echo "disabled" ?>>
                </div>

                <div>
                    <label for="apellido1">Primer Apellido:</label>
                    <input type="text" id="apellido1" name="apellido1" required <?php if (!empty($exito)) echo "disabled" ?>>
                </div>

                <div>
                    <label for="apellido2">Segundo Apellido:</label>
                    <input type="text" id="apellido2" name="apellido2" required <?php if (!empty($exito)) echo "disabled" ?>>
                </div>

                <br>
                <div>
                    <button type="submit" <?php if (!empty($exito)) echo "disabled" ?> >Registrar</button>
                </div>
            </form>
            <!-- Si registramos algún error en el registro, lo mostramos en rojo -->
            <?php if (!empty($error)) echo "<p style='color:red;padding:1%;'>$error</p>"; ?>
            <!-- Si se registra exitosamente, lo mostramos en verde -->
            <?php if (!empty($exito)) {
                echo "<p style='color:green;padding:1%;'>$exito</p>"; 
                header('Refresh: 5; url=iniciarsesion.php');
            }
            ?>
        </div>
    </main>
    <?php include('../pie.php'); ?>
</body>
</html>
