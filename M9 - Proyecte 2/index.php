<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Proyecte 2/global.php';
    // Iniciar la sesión si no está ya iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    $mensaje = isset($_SESSION['mensajesesion']) ? $_SESSION['mensajesesion'] : "";
    unset($_SESSION['mensajesesion']);
?>
<html lang="es">
<link rel="shortcut icon" href="img/logo.ico" />
<head>
    <meta charset="UTF-8">
    <title>Págna principal - Underground Workshop</title>
    <link rel="stylesheet" href="<?=URL_Proyecto?>estilos/estilos.css">
    <link rel="stylesheet" href="<?=URL_Proyecto?>estilos/productos.css">
</head>
<!-- Cabecera insertada -->
<?php include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'cabecera.php'); ?>
<body>
    <main>
        <!-- Bloque de objetos en columna -->
        <div class="gridobjetos">
            <!-- Títulos de bienvenida -->
            <h2>BIENVENIDO AL MEJOR PROVEEDOR DE TUS SUEÑOS SOBRE RUEDAS</h2>
            <h1>UNDERGROUD WORKSHOP</h1>
            <img class="imgportada" src="img/portada.png" alt="portada">
            <!-- Si registramos algún error en el registro, lo mostramos en rojo -->
            <?php if (!empty($mensaje)) echo "<p style='color:green;padding:1%;'>$mensaje</p>"; ?>       
            <h3>
                <p>¿Cansado de alquilar el típico coche de ciudad para tus vacaciones?
                <br>
                <p>¿Nunca has podido conducir el coche que siempre has deseaste desde niño?
                <br>
                <p>¡¡Rompe tus cadenas y disfruta de los mejores coches preparados del mundo del tuning!!
                <br>
            </h3>
            <!-- Botón de acceso a los productos -->
            <a class="boton-productos" href="<?=URL_Proyecto?>alquilar/productos.php" >¡¡A quemar asfalto!!</a>
        </div>
    </main>
</body>
<!-- Pie de página insertado -->
<?php include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'pie.php'); ?>
</html>