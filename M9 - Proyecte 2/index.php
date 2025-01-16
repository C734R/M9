<?php
    require_once 'global.php';
?>
<html lang="es">
<link rel="shortcut icon" href="img/logo.ico" />
<head>
    <meta charset="UTF-8">
    <title>Págna principal - Underground Workshop</title>
    <link rel="stylesheet" href="./estilos/estilos.css">
    <link rel="stylesheet" href="./estilos/productos.css">
</head>
<!-- Cabecera insertada -->
<?php include('cabecera.php'); ?>
<body>
    <main>
        <!-- Bloque de objetos en columna -->
        <div class="gridobjetos">
            <!-- Títulos de bienvenida -->
            <h2>BIENVENIDO AL MEJOR PROVEEDOR DE TUS SUEÑOS SOBRE RUEDAS</h2>
            <h1>UNDERGROUD WORKSHOP</h1>
            <img class="imgportada" src="img/portada.png" alt="portada">             
            <h3>
                <p>¿Cansado de alquilar el típico coche de ciudad para tus vacaciones?
                <br>
                <p>¿Nunca has podido conducir el coche que siempre has deseaste desde niño?
                <br>
                <p>¡¡Rompe tus cadenas y disfruta de los mejores coches preparados del mundo del tuning!!
                <br>
            </h3>
            <!-- Botón de acceso a los productos -->
            <a class="boton-productos" href="productos.php" >¡¡A quemar asfalto!!</a>
        </div>
    </main>
</body>
<!-- Pie de página insertado -->
<?php include('pie.php'); ?>
</html>