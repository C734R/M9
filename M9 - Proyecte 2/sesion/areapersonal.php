<?php
// Cargar ficheros necesarios
require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Proyecte 2/global.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Guardar mensajes de la sesión de forma local si tienen contenido, si no, la inicializa vacía
$exitousuario = isset($_SESSION['exitousuario']) ? $_SESSION['exitousuario'] : "";
$errorusuario = isset($_SESSION['errorusuario']) ? $_SESSION['errorusuario'] : "";
$exitocontraseña = isset($_SESSION['exitocontraseña']) ? $_SESSION['exitocontraseña'] : "";
$errorcontraseña = isset($_SESSION['errorcontraseña']) ? $_SESSION['errorcontraseña'] : "";
$exitonombre = isset($_SESSION['exitonombre']) ? $_SESSION['exitonombre'] : "";
$errornombre = isset($_SESSION['errornombre']) ? $_SESSION['errornombre'] : "";
$erroreliminar = isset($_SESSION['erroreliminar']) ? $_SESSION['erroreliminar'] : "";
$usuario = isset($_SESSION['usuario']['usuario']) ? $_SESSION['usuario']['usuario'] : "";
$deshabilitar = false;

// Vaciar datos de la sesion ya guardados de forma local
unset($_SESSION['exitousuario']);
unset($_SESSION['errorusuario']);
unset($_SESSION['exitocontraseña']);
unset($_SESSION['errorcontraseña']);
unset($_SESSION['exitonombre']);
unset($_SESSION['errornombre']);
unset($_SESSION['erroreliminar']);

if (!empty($exitousuario)  || !empty($errorusuario) || !empty($exitocontraseña) || !empty($errorcontraseña) || !empty($exitonombre) || !empty($errornombre)) {
if(!empty($exitousuario)  || !empty($errorusuario)) echo "<meta http-equiv='refresh' content='5;url=areapersonal.php#botonusuario'>";
if(!empty($exitocontraseña) || !empty($errorcontraseña)) echo "<meta http-equiv='refresh' content='5;url=areapersonal.php#botoncontraseña'>";
if(!empty($exitonombre) || !empty($errornombre)) echo "<meta http-equiv='refresh' content='5;url=areapersonal.php#botonnombre'>";
if(!empty($exitoeliminar)) echo "<meta http-equiv='refresh' content='5;url=inicio.php'>";
if(!empty($erroreliminar)) echo "<meta http-equiv='refresh' content='5;url=areapersonal.php#botoneliminar'>";
$deshabilitar = true;
}?>

<html lang="es">
<link rel="shortcut icon" href="<?=URL_Proyecto?>img/logo.ico" />
<head>
    <meta charset="UTF-8">
    <title>Área personal - Underground Workshop</title>
    <link rel="stylesheet" href="<?=URL_Proyecto?>estilos/estilos.css">
    <link rel="stylesheet" href="<?=URL_Proyecto?>estilos/formulario.css">
</head>
<body>
    <?php include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'cabecera.php'); ?>
    <main>
        <h1>
            ÁREA PERSONAL
        </h1>
        <!-- #anchor para volver -->
        <div id="botonusuario"></div>
        <!-- Formulario para modificar el nombre de usuario -->
        <div class="formulario">
            <div><h2>Modificar nombre de usuario</h2></div>
            <form action="./funciones_sesion/modificar.php" method="POST">
                <div><h3>Introduce el nuevo nombre de usuario</h3></div>

                <div>
                    <label for="usuario">Nombre de usuario actual:</label> 
                    <input type="text" id="usuario" name="usuario" placeholder="<?php echo "$usuario" ?>" disabled>
                </div>

                <div>
                    <label for="usuarionuevo">Nuevo nombre de usuario:</label>
                    <input type="text" id="usuarionuevo" name="usuarionuevo" required <?php if ($deshabilitar) echo "disabled" ?>>
                </div>

                <br>
                <div>
                    <button type="submit" <?php if ($deshabilitar) echo "disabled" ?> >Modificar nombre de usuario</button>
                </div>
            </form>
            <!-- Si registramos algún error en el registro, lo mostramos en rojo -->
            <?php if (!empty($errorusuario)) echo "<p style='color:red;padding:1%;'>$errorusuario</p>"; ?>
            <!-- Si se registra exitosamente, lo mostramos en verde -->
            <?php if (!empty($exitousuario)) echo "<p style='color:green;padding:1%;'>$exitousuario</p>"; ?>
        </div>
        <!-- #anchor para volver -->
        <div id="botoncontraseña"></div>
        <br>
        <!-- Formulario para modificar contraseña -->
        <div class="formulario">
            <div><h2>Modificar contraseña</h2></div>
            <form action="./funciones_sesion/modificar.php" method="POST">
                <div><h3>Introduce la contraseña actual y nueva del usuario</h3></div>

                <div>
                    <label for="password">Contraseña actual:</label>
                    <input type="password" id="password" name="password" required <?php if ($deshabilitar) echo "disabled" ?>>
                </div>

                <div>
                    <label for="password">Nueva contraseña:</label>
                    <input type="password" id="password1" name="password1" required <?php if ($deshabilitar) echo "disabled" ?>>
                </div>

                <div>
                    <label for="password">Repite nueva contraseña:</label>
                    <input type="password" id="password2" name="password2" required <?php if ($deshabilitar) echo "disabled" ?>>
                </div>
                
                <br>
                <div>
                    <button type="submit"  <?php if (!empty($exitocontraseña)) echo "disabled" ?> >Modificar contraseña</button>
                </div>
            </form>
            <!-- Si registramos algún error en el registro, lo mostramos en rojo -->
            <?php if (!empty($errorcontraseña)) echo "<p style='color:red;padding:1%;'>$errorcontraseña</p>"; ?>
            <!-- Si se registra exitosamente, lo mostramos en verde -->
            <?php if (!empty($exitocontraseña)) echo "<p style='color:green;padding:1%;'>$exitocontraseña</p>"; ?>
        </div>
        <!-- #anchor para volver -->
        <div id="botonnombre"></div>
        <br>
        <!-- Formulario para modificar nombre y apellidos -->
        <div class="formulario">
            <div><h2>Modificar nombre y apellidos</h2></div>
            <form action="./funciones_sesion/modificar.php" method="POST">
                <div><h3>Introduce los nuevos datos del usuario</h3></div>

                <div>
                    <label for="nombrecomleto">Nombre completo actual:</label>
                    <input type="text" id="nombrecomleto" name="nombrecomleto" placeholder="<?php echo "$nombre,"." $apellido1"." $apellido2" ?>" disabled></div>
                <div>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required <?php if ($deshabilitar) echo "disabled" ?>>
                </div>

                <div>
                    <label for="apellido1">Primer Apellido:</label>
                    <input type="text" id="apellido1" name="apellido1" required <?php if ($deshabilitar) echo "disabled" ?>>
                </div>

                <div>
                    <label for="apellido2">Segundo Apellido:</label>
                    <input type="text" id="apellido2" name="apellido2" required <?php if ($deshabilitar) echo "disabled" ?>>
                </div>

                <br>
                <div>
                    <button type="submit" <?php if ($deshabilitar) echo "disabled" ?> >Modificar nombre y apellidos</button>
                </div>
            </form>

            <!-- Si registramos algún error en el registro, lo mostramos en rojo -->
            <?php if (!empty($errornombre)) echo "<p style='color:red;padding:1%;'>$errornombre</p>"; ?>
            <!-- Si se registra exitosamente, lo mostramos en verde -->
            <?php if (!empty($exitonombre)) echo "<p style='color:green;padding:1%;'>$exitonombre</p>"; ?>
        </div>
        <!-- #anchor para volver -->
        <div id="botoneliminar"></div>
        <br>
        <!-- Formulario para modificar nombre y apellidos -->
        <div class="formulario">
            <div><h2 style='color:red;'>ELIMINAR USUARIO</h2></div>
            <form action="./funciones_sesion/eliminar.php" method="POST">
                <div><h3 style='color:red;'>¿Estás seguro de que deseas eliminar el usuario actual?</h3></div>
                <br>
                <div>
                    <button style='color=red;' type="submit" <?php if ($deshabilitar) echo "disabled" ?> >Eliminar usuario</button>
                </div>
            </form>

            <!-- Si registramos algún error en el registro, lo mostramos en rojo -->
            <?php if (!empty($erroreliminar)) echo "<p style='color:red;padding:1%;'>$erroreliminar</p>"; ?>
        </div>
    </main>
    <?php include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'pie.php'); ?>
</body>
</html>

