<?php
    require_once 'global.php';
?>
<?php
    // Iniciar sesión
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Si no se ha registrado modelo, volver a la página de vehículos.
    if (!isset($_GET['modelo'])) {
        header("Refresh: 5; url=productos.php");
        echo "<h1>Error: No se ha seleccionado ningún producto</h1>";
        echo "<p>Será redirigido a la página de productos en 5 segundos...</p>";
        exit();
    }
    // Si lo está, se registra
    $_SESSION['modelo'] = $_GET['modelo'];
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
<?php include('cabecera.php'); ?>
<body>
    <main>
        <h1>
            FORMULARIO DE ALQUILER
        </h1>
        <!-- Creamos formulario para pasar a la función de creación de alquiler -->
        <form class="formulario" action="funciones/crearAlquiler.php" method="post">
            <!-- Se muestra modelo seleccionado -->
            <p>Modelo seleccionado: <strong style="color: #0056b3"><?php echo htmlspecialchars($_SESSION['modelo']); ?></strong></p>
            <!-- Días de alquiler mínimo 1 máximo 31 -->
            <label for="dias_alquiler">Número de días alquilado:</label>
            <input type="number" id="dias_alquiler" name="dias_alquiler" min="1" max = "31" required><br><br>
            <!-- Nombre del piloto -->
            <label for="nombre_piloto">Nombre del piloto:</label>
            <input type="text" id="nombre_piloto" name="nombre_piloto" required><br><br>
            <!-- Botón de registro -->
            <div>
                <button type="submit" >¡¡A jugarse los papeles!!</button>
            </div>
        </form>  
    </main>
</body>
<!-- Pie insertado -->
<?php include('pie.php'); ?>
</html>