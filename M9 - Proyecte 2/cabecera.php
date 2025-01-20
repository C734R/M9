<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Proyecte 2/global.php';
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
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Sección vacía para mantener simetría -->
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
                    <div><a href="<?=URL_Proyecto?>sesion/funciones_sesion/cerrarsesion.php">Cerrar sesión</a></div>
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