<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Proyecte 2/global.php';

    // Iniciar sesión si no está iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Si no se ha registrado modelo, volver a la página de vehículos.
    if (!isset($_POST['modelo'])) {
        header("Refresh: 5; url=productos.php");
        echo "<h1>Error: No se ha seleccionado ningún producto</h1>";
        echo "<p>Será redirigido a la página de productos en 5 segundos...</p>";
        exit();
    }
    $_SESSION['precio_total'] = 0;
?>

<html lang="es">
<link rel="shortcut icon" href="<?=URL_Proyecto?>img/logo.ico" />
<head>
    <meta charset="UTF-8">
    <title>Cesta de compra - Underground Workshop</title>
    <link rel="stylesheet" href="<?=URL_Proyecto?>estilos/estilos.css">
    <link rel="stylesheet" href="<?=URL_Proyecto?>estilos/formulario.css">
</head>
<!-- Cabecera insertada -->
<?php include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'cabecera.php'); ?>
<body>
    <main>
        <h1>
            FORMULARIO DE ALQUILER
        </h1>
        <!-- Creamos formulario para pasar a la función de creación de alquiler -->
        <form class="formulario" action="funciones/crearAlquiler.php" method="post">
            <!-- Se muestra modelo seleccionado -->
            <p>Modelo seleccionado: <strong style="color: #0056b3"><?= $_POST['modelo'] ; ?></strong></p>
            <!-- Días de alquiler mínimo 1 máximo 31 -->
            <label for="dias">Número de días alquilado:</label>
            <input type="number" id="dias" name="dias" min="1" max = "31" required><br><br>
            <!-- Nombre del piloto -->
            <label for="piloto">Nombre del piloto:</label>
            <input type="text" id="piloto" name="piloto" placeholder="<?= $_SESSION['usuario']['usuario'] ?>" disabled><br><br>
            <!-- Precio total -->
            <label for="precio_total">Precio total:</label>
            <input type="text" id="precio_total" name="precio_total" placeholder="<?= $_SESSION['precio_total'] ?>" disabled><br><br>
            <!-- Botón de registro -->
            <div>
                <button type="submit" >¡¡A jugarse los papeles!!</button>
            </div>
        </form>  
    </main>
</body>
<!-- Pie insertado -->
<?php include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'pie.php'); ?>
</html>