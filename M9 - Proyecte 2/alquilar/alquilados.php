<?php
// Cargar ficheros requeridos
require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Proyecte 2/global.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$error_alquilados = isset($_SESSION['error_alquilados']) ?  $_SESSION['error_alquilados'] : "";
$exito_alquilados = isset($_SESSION['exito_alquilados']) ?  $_SESSION['exito_alquilados'] : "";

unset($_SESSION['error_alquilados']);
unset($_SESSION['exito_alquilados']);

if(!empty($error_alquilados) || !empty($exito_alquilados)) echo "<meta http-equiv='refresh' content='5;url=alquilados.php#'>";

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
            <?php if (!empty($error_alquilados)) echo "<p style='color:red;padding:1%;'>$error_alquilados</p>"; ?>
            <!-- Si se registra exitosamente, lo mostramos en verde -->
            <?php if (!empty($exito_alquilados)) echo "<p style='color:green;padding:1%;'>$exito_alquilados</p>"; ?>
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