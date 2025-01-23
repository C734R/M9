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
    $deshabilitar = false;
    $inventario = isset($_GET['inventario']) ? $_GET['inventario'] : false;
    $no_sesion = isset($_SESSION['usuario']['usuario']) ? false : true;
    $usuario = !$no_sesion ? $_SESSION['usuario']['usuario'] : '';

    // Registrar localmente mensajes recibidos sesión
    $exito_honda = isset($_SESSION['exito_honda']) ? $_SESSION['exito_honda'] : '';
    $error_honda = isset($_SESSION['error_honda']) ? $_SESSION['error_honda'] : '';
    $exito_bmw = isset($_SESSION['exito_bmw']) ? $_SESSION['exito_bmw'] : '';
    $error_bmw = isset($_SESSION['error_bmw']) ? $_SESSION['error_bmw'] : '';
    $exito_mb = isset($_SESSION['exito_mb']) ? $_SESSION['exito_mb'] : '';
    $error_mb = isset($_SESSION['error_mb']) ? $_SESSION['error_mb'] : '';
    $exito_evo = isset($_SESSION['exito_evo']) ? $_SESSION['exito_evo'] : '';
    $error_evo = isset($_SESSION['error_evo']) ? $_SESSION['error_evo'] : '';
    $exito_ibiza = isset($_SESSION['exito_ibiza']) ? $_SESSION['exito_ibiza'] : '';
    $error_ibiza = isset($_SESSION['error_ibiza']) ? $_SESSION['error_ibiza'] : '';


    // Borrar mensajes de sesión
    unset($_SESSION['exito_honda']); unset($_SESSION['error_honda']);
    unset($_SESSION['exito_bmw']); unset($_SESSION['error_bmw']);
    unset($_SESSION['exito_mb']); unset($_SESSION['error_mb']);
    unset($_SESSION['exito_evo']); unset($_SESSION['error_evo']);
    unset($_SESSION['exito_ibiza']); unset($_SESSION['error_ibiza']);

    // Si hay algún mensaje de error, deshabilitamos elementos
    if (!empty($exito_honda) || !empty($error_honda) ||
        !empty($exito_bmw) || !empty($error_bmw) ||
        !empty($exito_mb) || !empty($error_mb) ||
        !empty($exito_evo) || !empty($error_evo) ||
        !empty($exito_ibiza) || !empty($error_ibiza))
        $deshabilitar = true
    ;

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
    if($no_sesion || !empty($error)) $deshabilitar = true;
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
        <!-- Información del Honda S2000 -->
        <div class="titulocoche" id='HONDAS2000'>HONDA S2000</div>
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
                    <!-- Si registramos algún error en el registro, lo mostramos en rojo -->
                    <?php if (!empty($error_honda)): ?>
                        <li style='color:red;padding:1%;'><?=$error_honda?></li>
                        <meta http-equiv='refresh' content='5;url=<?=URL_Proyecto?>alquilar/productos.php?inventario=true#HONDAS2000'>
                    <?php endif; ?>
                    <!-- Si se registra exitosamente, lo mostramos en verde -->
                    <?php if (!empty($exito_honda)): ?>
                        <li style='color:green;padding:1%;'><?=$exito_honda?></li>
                        <meta http-equiv='refresh' content='5;url=<?=URL_Proyecto?>alquilar/productos.php?inventario=true#HONDAS2000'>
                    <?php endif; ?>
                </ul>
            </div>
            <!-- Formulario alquilar coche -->
            <div>
                <form action="<?=URL_Proyecto?>alquilar/formAlquiler.php" method="POST">
                    <div>
                        <input type="hidden" name="modelo" value="HONDAS2000" required >
                        <?php if($no_sesion): ?>
                             <button class='boton-alquiler' disabled >Inicia sesión primero.</button>
                        <?php endif; ?>
                        <?php if(!$inventario): ?>
                            <button class='boton-alquiler' type='submit' <?php if($deshabilitar || $cantidad_honda <= 0) echo 'disabled'?>>¡¡ME LO QUEDO!!</button>                    
                        <?php endif; ?>

                    </div>
                <!-- Formulario actualizar inventario -->
                </form>
                <?php if($inventario): ?>
                    <form action="<?=URL_Proyecto?>alquilar/funciones/actualizarCoches.php" method='POST'>
                        <input type="hidden" name="modelo" value="HONDAS2000" required >
                        <div>
                            <label class='cantidad' for='cantidad'>Nueva cantidad</label><br><br>
                        </div>
                        <div>
                            <input class='cantidad' type='number' id='cantidad' name='cantidad' placeholder='<?=$cantidad_honda?>' min='0' max = '100' required <?php if($deshabilitar) echo 'disabled'?>><br><br>
                        </div>
                        <div>
                            <button class='cantidad-boton' type='submit' <?php if($deshabilitar) echo 'disabled'?>>GUARDAR</button>                    
                        </div>
                    </form>    
                <?php endif; ?>
            </div>
            <br>  
        </div>

        <!-- Información del BMW M3 E30 -->
        <div class="titulocoche" id='BMWM3E30'>BMW M3 E30</div>
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
                    <!-- Si registramos algún error en el registro, lo mostramos en rojo -->
                    <?php if (!empty($error_bmw)): ?>
                        <li style='color:red;padding:1%;'><?=$error_bmw?></li>
                        <meta http-equiv='refresh' content='5;url=<?=URL_Proyecto?>alquilar/productos.php?inventario=true#BMWM3E30'>
                    <?php endif; ?>
                    <!-- Si se registra exitosamente, lo mostramos en verde -->
                    <?php if (!empty($exito_bmw)): ?>
                        <li style='color:green;padding:1%;'><?=$exito_bmw?></li>
                        <meta http-equiv='refresh' content='5;url=<?=URL_Proyecto?>alquilar/productos.php?inventario=true#BMWM3E30'>
                    <?php endif; ?>
                </ul>
            </div>
            <div>
                <!-- Formulario alquilar coche -->
                <form action="<?=URL_Proyecto?>alquilar/formAlquiler.php" method="POST">
                    <div>
                        <input type="hidden" name="modelo" value="BMWM3E30" required>
                        <?php if($no_sesion): ?>
                             <button class='boton-alquiler' disabled >Inicia sesión primero.</button>
                        <?php endif; ?>
                        <?php if(!$inventario): ?>
                            <button class='boton-alquiler' type='submit' <?php if($deshabilitar || $cantidad_bmw <= 0) echo 'disabled'?>>¡¡ME LO QUEDO!!</button>                    
                        <?php endif; ?>

                    </div>
                <!-- Formulario actualizar inventario -->
                </form>
                <?php if($inventario): ?>
                    <form action="<?=URL_Proyecto?>alquilar/funciones/actualizarCoches.php" method='POST'>
                        <input type="hidden" name="modelo" value="BMWM3E30" required >
                        <div>
                            <label class='cantidad' for='cantidad'>Nueva cantidad</label><br><br>
                        </div>
                        <div>
                            <input class='cantidad' type='number' id='cantidad' name='cantidad' placeholder='<?=$cantidad_bmw?>' min='0' max = '100' required <?php if($deshabilitar) echo 'disabled'?>><br><br>
                        </div>
                        <div>
                            <button class='cantidad-boton' type='submit' <?php if($deshabilitar) echo 'disabled'?>>GUARDAR</button>                    
                        </div>
                    </form>    
                <?php endif; ?>
            </div>
            <br>  
        </div>

        <!-- Información del Mercedes Benz W201 AMG 190E DCM -->
        <div class="titulocoche" id='MBW201AMG190EDCM'>Mercedes Benz W201 AMG 190E DCM</div>
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
                    <!-- Si registramos algún error en el registro, lo mostramos en rojo -->
                    <?php if (!empty($error_mb)): ?>
                        <li style='color:red;padding:1%;'><?=$error_mb?></li>
                        <meta http-equiv='refresh' content='5;url=<?=URL_Proyecto?>alquilar/productos.php?inventario=true#MBW201AMG190EDCM'>
                    <?php endif; ?>
                    <!-- Si se registra exitosamente, lo mostramos en verde -->
                    <?php if (!empty($exito_mb)): ?>
                        <li style='color:green;padding:1%;'><?=$exito_mb?></li>
                        <meta http-equiv='refresh' content='5;url=<?=URL_Proyecto?>alquilar/productos.php?inventario=true#MBW201AMG190EDCM'>
                    <?php endif; ?>
                </ul>
            </div>
            <div>
                <!-- Formulario alquilar coche -->
                <form action="<?=URL_Proyecto?>alquilar/formAlquiler.php" method="POST">
                    <div>
                        <input type="hidden" name="modelo" value="MBW201AMG190EDCM" required>
                        <?php if($no_sesion): ?>
                             <button class='boton-alquiler' disabled >Inicia sesión primero.</button>
                        <?php endif; ?>
                        <?php if(!$inventario): ?>
                            <button class='boton-alquiler' type='submit' <?php if($deshabilitar || $cantidad_mb <= 0) echo 'disabled'?>>¡¡ME LO QUEDO!!</button>                    
                        <?php endif; ?>

                    </div>
                <!-- Formulario actualizar inventario -->
                </form>
                <?php if($inventario): ?>
                    <form action="<?=URL_Proyecto?>alquilar/funciones/actualizarCoches.php" method='POST'>
                        <input type="hidden" name="modelo" value="MBW201AMG190EDCM" required >
                        <div>
                            <label class='cantidad' for='cantidad'>Nueva cantidad</label><br><br>
                        </div>
                        <div>
                            <input class='cantidad' type='number' id='cantidad' name='cantidad' placeholder='<?=$cantidad_mb?>' min='0' max = '100' required <?php if($deshabilitar) echo 'disabled'?>><br><br>
                        </div>
                        <div>
                            <button class='cantidad-boton' type='submit' <?php if($deshabilitar) echo 'disabled'?>>GUARDAR</button>                    
                        </div>
                    </form>    
                <?php endif; ?>
            </div>
            <br>  
        </div>

        <!-- Información del Mitsubishi Lancer EVO 9 -->
        <div class="titulocoche" id='EVO9'>Mitsubishi Lancer EVO 9</div>
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
                    <!-- Si registramos algún error en el registro, lo mostramos en rojo -->
                    <?php if (!empty($error_evo)): ?>
                        <li style='color:red;padding:1%;'><?=$error_evo?></li>
                        <meta http-equiv='refresh' content='5;url=<?=URL_Proyecto?>alquilar/productos.php?inventario=true#EVO9'>
                    <?php endif; ?>
                    <!-- Si se registra exitosamente, lo mostramos en verde -->
                    <?php if (!empty($exito_evo)): ?>
                        <li style='color:green;padding:1%;'><?=$exito_evo?></li>
                        <meta http-equiv='refresh' content='5;url=<?=URL_Proyecto?>alquilar/productos.php?inventario=true#EVO9'>
                    <?php endif; ?>
                </ul>
            </div>
            <div>
                <!-- Formulario alquilar coche -->
                <form action="<?=URL_Proyecto?>alquilar/formAlquiler.php" method="POST">
                    <div>
                        <input type="hidden" name="modelo" value="EVO9" required>
                        <?php if($no_sesion): ?>
                             <button class='boton-alquiler' disabled >Inicia sesión primero.</button>
                        <?php endif; ?>
                        <?php if(!$inventario): ?>
                            <button class='boton-alquiler' type='submit' <?php if($deshabilitar || $cantidad_evo <= 0) echo 'disabled'?>>¡¡ME LO QUEDO!!</button>                    
                        <?php endif; ?>

                    </div>
                </form>
                <!-- Formulario actualizar inventario -->
                <?php if($inventario): ?>
                    <form action="<?=URL_Proyecto?>alquilar/funciones/actualizarCoches.php" method='POST'>
                        <input type="hidden" name="modelo" value="EVO9" required >
                        <div>
                            <label class='cantidad' for='cantidad'>Nueva cantidad</label><br><br>
                        </div>
                        <div>
                            <input class='cantidad' type='number' id='cantidad' name='cantidad' placeholder='<?=$cantidad_evo?>' min='0' max = '100' required <?php if($deshabilitar) echo 'disabled'?>><br><br>
                        </div>
                        <div>
                            <button class='cantidad-boton' type='submit' <?php if($deshabilitar) echo 'disabled'?>>GUARDAR</button>                    
                        </div>
                    </form>    
                <?php endif; ?>
            </div>
            <br>  
        </div>

        <!-- Información del SEAT Ibiza Cupra 6L -->
        <div class="titulocoche" id='CUPRA6L'>SEAT Ibiza Cupra 6L</div>
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
                    <!-- Si registramos algún error en el registro, lo mostramos en rojo -->
                    <?php if (!empty($error_ibiza)): ?>
                        <li style='color:red;padding:1%;'><?=$error_ibiza?></li>
                        <meta http-equiv='refresh' content='5;url=<?=URL_Proyecto?>alquilar/productos.php?inventario=true#CUPRA6L'>
                    <?php endif; ?>
                    <!-- Si se registra exitosamente, lo mostramos en verde -->
                    <?php if (!empty($exito_ibiza)): ?>
                        <li style='color:green;padding:1%;'><?=$exito_ibiza?></li>
                        <meta http-equiv='refresh' content='5;url=<?=URL_Proyecto?>alquilar/productos.php?inventario=true#CUPRA6L'>
                    <?php endif; ?>
                </ul>
            </div>
            <div>
                <!-- Formulario alquilar coche -->
                <form action="<?=URL_Proyecto?>alquilar/formAlquiler.php" method="POST">
                    <div>
                        <input type="hidden" name="modelo" value="CUPRA6L" required>
                        <?php if($no_sesion): ?>
                             <button class='boton-alquiler' disabled >Inicia sesión primero.</button>
                        <?php endif; ?>
                        <?php if(!$inventario): ?>
                            <button class='boton-alquiler' type='submit' <?php if($deshabilitar || $cantidad_ibiza <= 0) echo 'disabled'?>>¡¡ME LO QUEDO!!</button>                    
                        <?php endif; ?>

                    </div>
                <!-- Formulario actualizar inventario -->
                </form>
                <?php if($inventario): ?>
                    <form action="<?=URL_Proyecto?>alquilar/funciones/actualizarCoches.php" method='POST'>
                        <input type="hidden" name="modelo" value="CUPRA6L" required >
                        <div>
                            <label class='cantidad' for='cantidad'>Nueva cantidad</label><br><br>
                        </div>
                        <div>
                            <input class='cantidad' type='number' id='cantidad' name='cantidad' placeholder='<?=$cantidad_ibiza?>' min='0' max = '100' required <?php if($deshabilitar) echo 'disabled'?>><br><br>
                        </div>
                        <div>
                            <button class='cantidad-boton' type='submit' <?php if($deshabilitar) echo 'disabled'?>>GUARDAR</button>                    
                        </div>
                    </form>    
                <?php endif; ?>
            </div>
            <br>  
        </div>
    </main>
</body>
<!-- Insertar pie de página -->
<?php include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'pie.php'); ?>
</html>