<?php
    // Iniciar sesión y eliminar modelo si existe
    session_start();
    if (isset($_SESSION['modelo'])) {
        unset($_SESSION['modelo']);
    }
?>
<html lang="es">
<link rel="shortcut icon" href="img/logo.ico" />
<head>
    <meta charset="UTF-8">
    <title>Productos - Underground Workshop</title>
    <link rel="stylesheet" href="./estilos/estilos.css">
    <link rel="stylesheet" href="./estilos/productos.css">
</head>
<!-- Insertar cabecera -->
<?php include('cabecera.php'); ?>
<body>
    <main>
        <h1>VEHÍCULOS DISPONIBLES</h1>
        <br>
        
        <!-- Información del Honda S2000 -->
        <div class="titulocoche">HONDA S2000</div>
        <div class="coche">
            <img class="coche-img" src="img/honda-S2000.avif" alt="S2000">
            <div class="coche-info">
                <p>Modificado con Stage 3, este S2000 redefine el concepto de conducción extrema en la ciudad, alcanzando altas revoluciones con máxima estabilidad.</p>
                <ul class="caracteristicas">
                    <li>Potencia: 600 CV</li>
                    <li>Velocidad máxima: 320 km/h</li>
                    <li>Color: Gris Perlado</li>
                    <li>Transmisión: Secuencial de 7 velocidades</li>
                    <li>Características destacadas: Turbo híbrido de alto rendimiento y suspensión ajustable para derrapes</li>
                </ul>
            </div>
            <div>
                <a href="formAlquiler.php?modelo=Honda S2000" class="boton-alquiler">¡¡ME LO QUEDO!!</a>
            </div>
        </div>

        <!-- Información del BMW M3 E30 -->
        <div class="titulocoche">BMW M3 E30</div>
        <div class="coche">
            <img class="coche-img" src="img/bmw-m3-e30.jpg" alt="M3 E30">
            <div class="coche-info">
                <p>Con un Stage 3 completamente implementado, este M3 E30 es un referente en carreras callejeras gracias a su fiabilidad y estilo inigualables.</p>
                <ul class="caracteristicas">
                    <li>Potencia: 550 CV</li>
                    <li>Velocidad máxima: 310 km/h</li>
                    <li>Color: Negro Piano</li>
                    <li>Transmisión: Secuencial de 6 velocidades</li>
                    <li>Características destacadas: Kit aerodinámico completo y frenos cerámicos deportivos</li>
                </ul>
            </div>
            <div>
                <a href="formAlquiler.php?modelo=BMW M3 E30" class="boton-alquiler">¡¡ME LO QUEDO!!</a>
            </div>
        </div>

        <!-- Información del Mercedes Benz W201 AMG 190E DCM -->
        <div class="titulocoche">Mercedes Benz W201 AMG 190E DCM</div>
        <div class="coche">
            <img class="coche-img" src="img/mb-w201-amg-190e-dmc.webp" alt="AMG W201 E190">
            <div class="coche-info">
                <p>Preparado con un Stage 3 profesional, este W201 AMG combina un diseño icónico con un rendimiento brutal, ideal para quienes buscan lujo y adrenalina.</p>
                <ul class="caracteristicas">
                    <li>Potencia: 520 CV</li>
                    <li>Velocidad máxima: 300 km/h</li>
                    <li>Color: Negro obsidiana</li>
                    <li>Transmisión: Secuencial de 5 velocidades</li>
                    <li>Características destacadas: Escape deportivo AMG y sistema de tracción reforzada</li>
                </ul>
            </div>
            <div>
                <a href="formAlquiler.php?modelo=Mercedes Benz W201 AMG 190E DCM" class="boton-alquiler">¡¡ME LO QUEDO!!</a>
            </div>
        </div>

        <!-- Información del Mitsubishi Lancer EVO 9 -->
        <div class="titulocoche">Mitsubishi Lancer EVO 9</div>
        <div class="coche">
            <img class="coche-img" src="img/mitsubishi-lancer-evo-9-3646.jpg" alt="EVO 9">
            <div class="coche-info">
                <p>Rediseñado para carreras urbanas, este EVO 9 cuenta con preparación Stage 3, ideal para dominar las calles con aceleraciones explosivas y tracción perfecta.</p>
                <ul class="caracteristicas">
                    <li>Potencia: 650 CV</li>
                    <li>Velocidad máxima: 330 km/h</li>
                    <li>Color: Naranja Ocaso Japonés</li>
                    <li>Transmisión: Secuencial de 6 velocidades con doble embrague</li>
                    <li>Características destacadas: Sistema anti-lag, kit de frenos Brembo y suspensión de altura ajustable</li>
                </ul>
            </div>
            <div>
                <a href="formAlquiler.php?modelo=Mitsubishi Lancer EVO 9" class="boton-alquiler">¡¡ME LO QUEDO!!</a>
            </div>
        </div>

        <!-- Información del SEAT Ibiza Cupra 6L -->
        <div class="titulocoche">SEAT Ibiza Cupra 6L</div>
        <div class="coche">
            <img class="coche-img" src="img/ibiza-amarillo.jpg" alt="Ibiza Cupra">
            <div class="coche-info">
                <p>Transformado con un Stage 3 completo, este Ibiza Cupra es una bala urbana que combina ligereza, potencia y control absoluto.</p>
                <ul class="caracteristicas">
                    <li>Potencia: 400 CV</li>
                    <li>Velocidad máxima: 280 km/h</li>
                    <li>Color: Amarillo brillante</li>
                    <li>Transmisión: Manual reforzado de 6 velocidades</li>
                    <li>Características destacadas: Turbo de gran capacidad y neumáticos semi-slick</li>
                </ul>
            </div>
            <div>
                <a href="formAlquiler.php?modelo=SEAT Ibiza Cupra 6L" class="boton-alquiler">¡¡ME LO QUEDO!!</a>
            </div>
        </div>
    </main>
</body>
<!-- Insertar pie de página -->
<?php include('pie.php'); ?>
</html>