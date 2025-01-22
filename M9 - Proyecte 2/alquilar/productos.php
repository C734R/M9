<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Proyecte 2/global.php';

    // Iniciar sesión y eliminar modelo si existe
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    // Resetear variable modelo
    if (isset($_SESSION['modelo'])) {
        unset($_SESSION['modelo']);
    }

    // Reset variables
    $error = "";
    $deshabilitar = false;
    $inventario = isset($_GET['inventario']) ? $_GET['inventario'] : false;
    $no_sesion = isset($_SESSION['usuario']['usuario']) ? false : true;
    $usuario = !$nosesion ? $_SESSION['usuario']['usuario'] : '';
    

    // Si se accede en modo inventario sin ser admin, rechazamos acceso
    if($inventario && $usuario <> 'admin') {
        $_SESSION['error_cabecera'] = "Debes iniciar sesión de como administrador para poder gestionar los inventarios.";
        header("Location: ".URL_Proyecto.'index.php');
        exit();
    }


    // Obtener datos coches registrados
    include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto."alquilar/funciones/obtenercoches.php");

    // Si mensaje error guardar local y refrescar 5s
    if (isset($_SESSION['mensaje_producto_error']) || isset($_SESSION['mensaje_coches_error'])) {
        $error .= !empty($_SESSION['mensaje_producto_error']).!empty($_SESSION['mensaje_coches_error']);
        if (isset($_SESSION['mensaje_producto_error'])) unset($_SESSION['mensaje_producto_error']);
        if (isset($_SESSION['mensaje_coches_error'])) unset($_SESSION['mensaje_coches_error']);
        header("Refresh: 5; url=".URL_Proyecto."alquilar/productos.php");
    }
    
    // Registrar localmente cantidades coches
    $cantidad_honda = isset($_SESSION['coches']['HONDAS2000']['cantidad']) ? $_SESSION['coches']['HONDAS2000']['cantidad'] : "0";
    $cantidad_bmw = isset($_SESSION['coches']['BMWM3E30']['cantidad']) ? $_SESSION['coches']['BMWM3E30']['cantidad'] : "0";
    $cantidad_mb = isset($_SESSION['coches']['MBW201AMG190EDCM']['cantidad']) ? $_SESSION['coches']['MBW201AMG190EDCM']['cantidad'] : "0";
    $cantidad_evo = isset($_SESSION['coches']['EVO9']['cantidad']) ? $_SESSION['coches']['EVO9']['cantidad'] : "0";
    $cantidad_ibiza = isset($_SESSION['coches']['CUPRA6L']['cantidad']) ? $_SESSION['coches']['CUPRA6L']['cantidad'] : "0";
    
    // Si hay error o no hay sesión, deshabilitar botones
    if($no_sesion || !empty($error) || $inventario) $deshabilitar = true;
?>

<html lang="es">
<link rel="shortcut icon" href="<?=URL_Proyecto?>img/logo.ico" />
<head>
    <meta charset="UTF-8">
    <title>Productos - Underground Workshop</title>
    <link rel="stylesheet" href="<?=URL_Proyecto?>estilos/estilos.css">
    <link rel="stylesheet" href="<?=URL_Proyecto?>estilos/productos.css">
</head>
<!-- Insertar cabecera -->
<?php include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'cabecera.php'); ?>
<body>
    <main>
        <?php if(!$inventario) echo "<h1>VEHÍCULOS DISPONIBLES</h1>" ?>
        <?php if($inventario && $usuario = 'admin') echo "<h1>GESTIÓN DEL INVENTARIO</h1>" ?>
        <br>
        <?php if (!empty($error)) echo "<p style='color:red;padding:1%;'>$error</p>"; ?>
        <!-- Información del Honda S2000 -->
        <div class="titulocoche">HONDA S2000</div>
        <div class="coche">
            <img class="coche-img" src="<?=URL_Proyecto?>img/honda-S2000.avif" alt="HONDAS2000">
            <div class="coche-info">
                <p>Modificado con Stage 3, este S2000 redefine el concepto de conducción extrema en la ciudad, alcanzando altas revoluciones con máxima estabilidad.</p>
                <ul class="caracteristicas">
                    <li>Potencia: 600 CV</li>
                    <li>Velocidad máxima: 320 km/h</li>
                    <li>Color: Gris Perlado</li>
                    <li>Transmisión: Secuencial de 7 velocidades</li>
                    <li>Características destacadas: Turbo híbrido de alto rendimiento y suspensión ajustable para derrapes</li>
                    <li>Stock disponible: <?=$cantidad_honda?></li>
                </ul>
            </div>
            <div>
                <form action="<?=URL_Proyecto?>alquilar/formAlquiler.php" method="POST">
                    <div>
                        <input type="hidden" name="modelo" value="HONDAS2000" required>
                        <?php if($no_sesion) echo "<button class='boton-alquiler' disabled>Inicia sesión primero.</button>"?> 
                        <?php if(!$inventario) 
                            echo "<button class='boton-alquiler' type='submit'"; 
                            if($deshabilitar || $cantidad_honda <= 0) echo "disabled";
                            echo ">¡¡ME LO QUEDO!!</button>";
                        ?>
                        

                    </div>
                </form>
                <?php if($inventario)
                    echo "<form action='".URL_Proyecto."alquilar/productos.php' method='POST'>";
                        echo "<div>";
                        echo "<label for='cantidad'>Cantidad a establecer:</label>";
                        echo "<input type='number' id='_dias' name='_dias' value='".$dias."' min='1' max = '31' required onchange='this.form.submit()'><br><br>";
                        echo "</div>";
                    echo "</form>";  
                ?>
            </div>
            <br>  
        </div>

        <!-- Información del BMW M3 E30 -->
        <div class="titulocoche">BMW M3 E30</div>
        <div class="coche">
            <img class="coche-img" src="<?=URL_Proyecto?>img/bmw-m3-e30.jpg" alt="M3 E30">
            <div class="coche-info">
                <p>Con un Stage 3 completamente implementado, este M3 E30 es un referente en carreras callejeras gracias a su fiabilidad y estilo inigualables.</p>
                <ul class="caracteristicas">
                    <li>Potencia: 550 CV</li>
                    <li>Velocidad máxima: 310 km/h</li>
                    <li>Color: Negro Piano</li>
                    <li>Transmisión: Secuencial de 6 velocidades</li>
                    <li>Características destacadas: Kit aerodinámico completo y frenos cerámicos deportivos</li>
                    <li>Stock disponible: <?=$cantidad_bmw?></li>
                </ul>
            </div>
            <div>
                <form action="<?=URL_Proyecto?>alquilar/formAlquiler.php" method="POST">
                    <div>
                        <input type="hidden" name="modelo" value="BMWM3E30" required>
                        <?php if($no_sesion) echo "<button class='boton-alquiler' disabled>Inicia sesión primero.</button>"?> 
                        <button class="boton-alquiler" type="submit" <?php if($deshabilitar || $cantidad_bmw <= 0) echo "disabled"?>>¡¡ME LO QUEDO!!</button>
                    </div>
                </form>  
            </div>
            <br>  
        </div>

        <!-- Información del Mercedes Benz W201 AMG 190E DCM -->
        <div class="titulocoche">Mercedes Benz W201 AMG 190E DCM</div>
        <div class="coche">
            <img class="coche-img" src="<?=URL_Proyecto?>img/mb-w201-amg-190e-dmc.webp" alt="AMG W201 E190">
            <div class="coche-info">
                <p>Preparado con un Stage 3 profesional, este W201 AMG combina un diseño icónico con un rendimiento brutal, ideal para quienes buscan lujo y adrenalina.</p>
                <ul class="caracteristicas">
                    <li>Potencia: 520 CV</li>
                    <li>Velocidad máxima: 300 km/h</li>
                    <li>Color: Negro obsidiana</li>
                    <li>Transmisión: Secuencial de 5 velocidades</li>
                    <li>Características destacadas: Escape deportivo AMG y sistema de tracción reforzada</li>
                    <li>Stock disponible: <?=$cantidad_mb?></li>
                </ul>
            </div>
            <div>
                <form action="<?=URL_Proyecto?>alquilar/formAlquiler.php" method="POST">
                    <div class='centrar'>
                        <input type="hidden" name="modelo" value="MBW201AMG190EDCM" required>
                        <?php if($no_sesion) echo "<button class='boton-alquiler' disabled>Inicia sesión primero.</button>"?> 
                        <button class="boton-alquiler" type="submit" <?php if($deshabilitar || $cantidad_mb <= 0) echo "disabled"?>>¡¡ME LO QUEDO!!</button>
                    </div>
                </form>  
            </div>
            <br>  
        </div>

        <!-- Información del Mitsubishi Lancer EVO 9 -->
        <div class="titulocoche">Mitsubishi Lancer EVO 9</div>
        <div class="coche">
            <img class="coche-img" src="<?=URL_Proyecto?>img/mitsubishi-lancer-evo-9-3646.jpg" alt="EVO 9">
            <div class="coche-info">
                <p>Rediseñado para carreras urbanas, este EVO 9 cuenta con preparación Stage 3, ideal para dominar las calles con aceleraciones explosivas y tracción perfecta.</p>
                <ul class="caracteristicas">
                    <li>Potencia: 650 CV</li>
                    <li>Velocidad máxima: 330 km/h</li>
                    <li>Color: Naranja Ocaso Japonés</li>
                    <li>Transmisión: Secuencial de 6 velocidades con doble embrague</li>
                    <li>Características destacadas: Sistema anti-lag, kit de frenos Brembo y suspensión de altura ajustable</li>
                    <li>Stock disponible: <?=$cantidad_evo?></li>
                </ul>
            </div>
            <div>
                <form action="<?=URL_Proyecto?>alquilar/formAlquiler.php" method="POST">
                    <div>
                        <input type="hidden" name="modelo" value="EVO9" required>
                        <?php if($no_sesion) echo "<button class='boton-alquiler' disabled>Inicia sesión primero.</button>"?> 
                        <button class="boton-alquiler" type="submit" <?php if($deshabilitar || $cantidad_evo <= 0) echo "disabled"?>>¡¡ME LO QUEDO!!</button>
                    </div>
                </form>  
            </div>
            <br>  
        </div>

        <!-- Información del SEAT Ibiza Cupra 6L -->
        <div class="titulocoche">SEAT Ibiza Cupra 6L</div>
        <div class="coche">
            <img class="coche-img" src="<?=URL_Proyecto?>img/ibiza-amarillo.jpg" alt="Ibiza Cupra">
            <div class="coche-info">
                <p>Transformado con un Stage 3 completo, este Ibiza Cupra es una bala urbana que combina ligereza, potencia y control absoluto.</p>
                <ul class="caracteristicas">
                    <li>Potencia: 400 CV</li>
                    <li>Velocidad máxima: 280 km/h</li>
                    <li>Color: Amarillo brillante</li>
                    <li>Transmisión: Manual reforzado de 6 velocidades</li>
                    <li>Características destacadas: Turbo de gran capacidad y neumáticos semi-slick</li>
                    <li>Stock disponible: <?=$cantidad_ibiza?></li>
                </ul>
            </div>
            <div>
                <form action="<?=URL_Proyecto?>alquilar/formAlquiler.php" method="POST">
                    <div>
                        <input type="hidden" name="modelo" value="CUPRA6L" required>
                        <?php if($no_sesion) echo "<button class='boton-alquiler' disabled>Inicia sesión primero.</button>"?> 
                        <button class="boton-alquiler" type="submit" <?php if($deshabilitar || $cantidad_ibiza <= 0) echo "disabled"?>>¡¡ME LO QUEDO!!</button>
                    </div>
                </form>  
            </div>
            <br>  
        </div>
    </main>
</body>
<!-- Insertar pie de página -->
<?php include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'pie.php'); ?>
</html>