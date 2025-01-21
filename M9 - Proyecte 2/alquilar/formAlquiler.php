<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Proyecte 2/global.php';

    // Iniciar sesión si no está iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    //$_SESSION['modelo'] = isset($_POST['modelo']) ? $_POST['modelo']: $_SESSION['modelo'];

    // Si no se ha registrado modelo, volver a la página de vehículos.
    if (!isset($_POST['modelo']) && !isset($_SESSION['modelo'])) {
        $_SESSION['mensaje_producto_error'] = "Error. No se ha seleccionado ningún producto.";
        header("Location: ".URL_Proyecto."alquilar/productos.php");
        exit();
    }

    // Registrar modelo en sesion
    $_SESSION['modelo'] = isset($_POST['modelo']) ? $_POST['modelo']: $_SESSION['modelo'];

    // Registrar localmente precio modelo
    $precio = $_SESSION['coches'][$_SESSION['modelo']]['precio'];

    // Registrar localmente días post propio formulario
    $dias = isset($_POST['_dias']) ? $_POST['_dias'] : '';
    $piloto = isset($_SESSION['usuario']['usuario']) ? $_SESSION['usuario']['usuario'] : '';
    $nombre_completo = isset($_SESSION['usuario']['usuario']) ? $_SESSION['usuario']['nombre']." ".$_SESSION['usuario']['apellido1']." ". $_SESSION['usuario']['apellido2'] : '' ;
    // Calcular precio al modificar formulario
    $precio_total = isset($_POST['_dias']) ? ($_POST['_dias'] * $precio) : 0.0;

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
        <form class="formulario" action="<?=URL_Proyecto?>alquilar/formAlquiler.php" method="post">
            <!-- Se muestra modelo seleccionado -->
            <p>Modelo seleccionado: <strong style="color: #0056b3"><?= $_SESSION['modelo'] ; ?></strong></p>
            <!-- Días de alquiler mínimo 1 máximo 31 -->
            <label for="dias">Número de días alquilado:</label>
            <input type="number" id="_dias" name="_dias" value="<?=$dias?>" min="1" max = "31" required onchange="this.form.submit()"><br><br>
            <!-- Nombre del piloto -->
            <label for="piloto">Nombre del piloto:</label>
            <input type="text" id="_piloto" name="_piloto" placeholder="<?=$nombre_completo?>" disabled><br><br>
            <!-- Precio total -->
            <label for="precio_total">Precio total:</label>
            <input type="text" id="precio_total" name="precio_total" placeholder="<?=$precio_total?>" disabled><br><br>
        </form>  
        <form class="formulario" action="<?=URL_Proyecto?>alquilar/funciones/crearAlquiler.php" method="post">
            <input type="hidden" name="dias" value="<?=$dias?>">
            <input type="hidden" name="piloto" value="<?=$piloto?>">
            <input type="hidden" name="precio_total" value="<?=$precio_total?>">
            <!-- Botón de registro -->
            <div>
                <button type="submit" action="" method="post">¡¡A jugarse los papeles!!</button>
            </div>
        </form>  
    </main>
</body>
<!-- Pie insertado -->
<?php include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'pie.php'); ?>
</html>