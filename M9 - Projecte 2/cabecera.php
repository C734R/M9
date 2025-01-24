<?php
// Cargar archivos necesarios
require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Projecte 2/global.php';
require_once $_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'sesion/funciones_sesion/checkusuario.php';

// Volcar mensajes de sesión
$mensaje_cabecera = isset($_SESSION['mensaje_cabecera']) ? $_SESSION['mensaje_cabecera'] : "";
$error_cabecera = isset($_SESSION['error_cabecera']) ? $_SESSION['error_cabecera'] : "";

// Vaciar mensajes de sesión
unset($_SESSION['mensaje_cabecera']);    
unset($_SESSION['error_cabecera']);
?>

<!-- Estilos de la cabecera -->
<link rel="stylesheet" href="<?=URL_Proyecto?>estilos/cabecera.css">

<header>
    <!-- División en varias columnas -->
    <div class="columnas-20-60-20">
        <!-- División del logo -->
        <div class="columna-20-izq">
            <img src="<?=URL_Proyecto?>img/logo.png" alt="Logo de la empresa">
        </div>

        <!-- División del título y navegación -->
        <div class="columna-60">
            <!-- Título principal de la cabecera -->
            <div class="titulocabecera">
                <h1>Underground Workshop</h1>
                <h2>Alquiler de los coches más deseados del mundo automotor</h2>
            </div>

            <!-- Menú de navegación -->
            <div class="navegador">
                <nav>
                    <ul>
                        <li><a href="<?=URL_Proyecto?>index.php">Inicio</a></li>
                        <li><a href="<?=URL_Proyecto?>alquilar/productos.php">Coches</a></li>
                        <li><a href="<?=URL_Proyecto?>alquilar/alquilados.php">Alquileres registrados</a></li>
                        <li><a href="<?=URL_Proyecto?>contacto.php">Contacto</a></li>
                        <li><a href="<?=URL_Proyecto?>alquilar/productos.php?inventario=true">Inventario</a></li>
                    </ul>
                </nav>
            </div>

            <div>
                <?php if (!empty($mensaje_cabecera)) echo "<p style='color:green;padding:1%;'>$mensaje_cabecera</p>"; ?>       
                <?php if (!empty($error_cabecera)) echo "<p style='color:red;padding:1%;'>$error_cabecera</p>"; ?>    
            </div>
        </div>

        <!-- Sección sesión -->
        <div class="columna-20-der">

        <!-- Código sesión insertado -->
        <?php
            // Checkear si hay sesion abierta
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            // Si tenemos datos en usuario
            if (isset($_SESSION['usuario'])) {
                // Tomamos datos
                $nombre = $_SESSION['usuario']['nombre'];
                $apellido1 = $_SESSION['usuario']['apellido1'];
                $apellido2 = $_SESSION['usuario']['apellido2'];
                ?>
                <!-- Y mostramos junto a opciones -->
                <div class="botones-sesion">
                    <p>Hola,</p>
                    <p><?= "$nombre, $apellido1 $apellido2" ?></p>
                    <div><a href="<?=URL_Proyecto?>sesion/areapersonal.php">Área personal</a></div>
                    <div><a href="<?=URL_Proyecto?>sesion/funciones_sesion/cerrarsesion.php?ir=inicio">Cerrar sesión</a></div>
                </div>
                <?php
            } 
            // Si no, mostramos opciones inicio sesión o registro
            else {
                ?>
                <div class="botones-sesion">
                    <div><a href="<?=URL_Proyecto?>sesion/iniciarsesion.php">Iniciar sesión</a></div>
                    <div><a href="<?=URL_Proyecto?>sesion/registrarusuario.php">Registrar usuario</a></div>
                </div>
                <?php
            }
            ?>
        </div>

    </div>
</header>