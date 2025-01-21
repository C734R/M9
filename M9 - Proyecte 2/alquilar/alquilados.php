<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Proyecte 2/global.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$mensaje_error = isset($_SESSION['mensaje_error']) ?  $_SESSION['mensaje_error'] : "";
$mensaje_exito = isset($_SESSION['mensaje_exito']) ?  $_SESSION['mensaje_exito'] : "";

unset($_SESSION['mensaje_error']);
unset($_SESSION['mensaje_exito']);

if(!empty($mensaje_error) || !empty($mensaje_exito)) echo "<meta http-equiv='refresh' content='5;url=alquilados.php#'>";

?>
<html lang="es">
<link rel="shortcut icon" href="<?=URL_Proyecto?>img/logo.ico" />
<head>
    <meta charset="UTF-8">
    <title>Alquileres registrados - Underground Workshop</title>
    <link rel="stylesheet" href="<?=URL_Proyecto?>estilos/estilos.css">
    <link rel="stylesheet" href="<?=URL_Proyecto?>estilos/mostrar.css">
</head>
<!-- Cabecera insertada -->
<?php include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'cabecera.php'); ?>
<body>
    <main>
        <h1>ALQUILERES REGISTRADOS</h1>
        <!-- Contenedor de los diferentes elementos a mostrar -->
        <div class="contenedor">
            <!-- Lista para mostrar registros mediante función for -->
            <?php include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'alquilar/funciones/mostrarAlquiler.php'); ?>
            <!-- Si registramos algún error en el registro, lo mostramos en rojo -->
            <?php if (!empty($mensaje_error)) echo "<p style='color:red;padding:1%;'>$mensaje_error</p>"; ?>
            <!-- Si se registra exitosamente, lo mostramos en verde -->
            <?php if (!empty($mensaje_exito)) echo "<p style='color:green;padding:1%;'>$mensaje_exito</p>"; ?>

            <!-- Bloque de botones -->
            <div>
                <br><br>
                <!-- Formulario de la función de borrar para el boton de eliminar registros -->
                <form action="<?=URL_Proyecto?>alquilar/funciones/borrarAlquiler.php" method="post">
                    <input type="hidden" name="accion" value="eliminar_todo">
                    <!-- Botón asociado a función de borrado de registros -->
                    <button class="botones" type="submit" style="color: red;" <?php if(!isset($_SESSION['alquileres'])) echo "disabled" ?>>Eliminar Registros</button>
                    <br>
                    <!-- Botón para volver al menú de productos -->
                    <a class="botones" href="<?=URL_Proyecto?>alquilar/productos.php">Volver a Productos</a>
                    </form>
            </div>
        </div>
    </main>
</body>
<!-- Pie de página insertado -->
<?php include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'pie.php'); ?>
</html>