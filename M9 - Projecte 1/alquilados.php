<!-- Iniciamos sesión para usar registro -->
<?php
    session_start();
?>
<html lang="es">
<link rel="shortcut icon" href="img/logo.ico" />
<head>
    <meta charset="UTF-8">
    <title>Alquileres registrados - Underground Workshop</title>
    <link rel="stylesheet" href="./estilos/estilos.css">
    <link rel="stylesheet" href="./estilos/mostrar.css">
</head>
<!-- Cabecera insertada -->
<?php include('cabecera.php'); ?>
<body>
    <main>
        <h1>ALQUILERES REGISTRADOS</h1>
        <!-- Contenedor de los diferentes elementos a mostrar -->
        <div class="contenedor">
            <!-- Lista para mostrar registros mediante función for -->
            <?php include('funciones/mostrarAlquiler.php'); ?>
            <!-- Bloque de botones -->
            <div>
                <br><br>
                <!-- Formulario de la función de borrar para el boton de eliminar registros -->
                <form action="funciones/borrarAlquiler.php" method="post">
                    <input type="hidden" name="accion" value="eliminar_todo">
                    <!-- Botón asociado a función de borrado de registros -->
                    <button class="botones" type="submit" style="color: red;">Eliminar Registros</button>
                    <br>
                    <!-- Botón para volver al menú de productos -->
                    <a class="botones" href="productos.php">Volver a Productos</a>
                    </form>
            </div>
        </div>
    </main>
</body>
<!-- Pie de página insertado -->
<?php include('pie.php'); ?>
</html>