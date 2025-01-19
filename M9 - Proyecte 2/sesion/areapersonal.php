<!-- Ficheros necesarios -->
<?php
    // Cargar ficheros necesarios
    require_once '../global.php';
?>

<!-- Comprobar sesión iniciada y tratar datos -->
<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Guardar mensajes de la sesión de forma local si tienen contenido, si no, la inicializa vacía
    $exitousuario = isset($_SESSION['exitousuario']) ? $_SESSION['exitousuario'] : "";
    $errorusuario = isset($_SESSION['errorusuario']) ? $_SESSION['errorusuario'] : "";
    $exitousuario = isset($_SESSION['exitocontraseña']) ? $_SESSION['exitocontraseña'] : "";
    $errorusuario = isset($_SESSION['errorcontraseña']) ? $_SESSION['errorcontraseña'] : "";
    $exitousuario = isset($_SESSION['exitonombre']) ? $_SESSION['exitonombre'] : "";
    $errorusuario = isset($_SESSION['errornombre']) ? $_SESSION['errornombre'] : "";
    $usuario = isset($_SESSION['usuario']['usuario']) ? $_SESSION['usuario']['usuario'] : "";
    
    // Vaciar datos de la sesion ya guardados de forma local
    unset($_SESSION['exitousuario']);
    unset($_SESSION['errorusuario']);
    unset($_SESSION['exitocontraseña']);
    unset($_SESSION['errorcontraseña']);
    unset($_SESSION['exitonombre']);
    unset($_SESSION['errornombre']);
?>

<!-- Página Área Personal -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Área personal - Underground Workshop</title>
    <link rel="stylesheet" href="<?=URL_Proyecto?>estilos/estilos.css">
    <link rel="stylesheet" href="<?=URL_Proyecto?>estilos/formulario.css">
</head>
<body>
    <?php include('../cabecera.php'); ?>
    <main>
        <h1>
            ÁREA PERSONAL
        </h1>
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
                    <input type="text" id="usuarionuevo" name="usuarionuevo" required>
                </div>

                <br>
                <div>
                    <button type="submit" <?php if (!empty($exitousuario)) echo "disabled" ?> >Modificar nombre de usuario</button>
                </div>
            </form>
            <!-- Si registramos algún error en el registro, lo mostramos en rojo -->
            <?php if (!empty($errorusuario)) echo "<p style='color:red;padding:1%;'>$errorusuario</p>"; ?>
            <!-- Si se registra exitosamente, lo mostramos en verde -->
            <?php if (!empty($exitousuario)) {
                echo "<p style='color:green;padding:1%;'>$exito</p>"; 
                header('Refresh: 5;');
            }
            ?>
        </div>
        <br>
        <!-- Formulario para modificar contraseña -->
        <div class="formulario">
            <div><h2>Modificar contraseña</h2></div>
            <form action="./funciones_sesion/modificar.php" method="POST">
                <div><h3>Introduce la contraseña actual y nueva del usuario</h3></div>

                <div>
                    <label for="password">Contraseña actual:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div>
                    <label for="password">Nueva contraseña:</label>
                    <input type="password" id="password1" name="password1" required>
                </div>

                <div>
                    <label for="password">Repite nueva contraseña:</label>
                    <input type="password" id="password2" name="password2" required>
                </div>
                
                <br>
                <div>
                    <button type="submit" <?php if (!empty($exitocontraseña)) echo "disabled" ?> >Modificar contraseña</button>
                </div>
            </form>
            <!-- Si registramos algún error en el registro, lo mostramos en rojo -->
            <?php if (!empty($errorcontraseña)) echo "<p style='color:red;padding:1%;'>$errorcontraseña</p>"; ?>
            <!-- Si se registra exitosamente, lo mostramos en verde -->
            <?php if (!empty($exitocontraseña)) {
                echo "<p style='color:green;padding:1%;'>$exitocontraseña</p>"; 
                header('Refresh: 5;');
            }
            ?>
        </div>
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
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div>
                    <label for="apellido1">Primer Apellido:</label>
                    <input type="text" id="apellido1" name="apellido1" required>
                </div>

                <div>
                    <label for="apellido2">Segundo Apellido:</label>
                    <input type="text" id="apellido2" name="apellido2" required>
                </div>

                <br>
                <div>
                    <button type="submit" <?php if (!empty($exitonombre)) echo "disabled" ?> >Modificar nombre y apellidos</button>
                </div>
            </form>

            <!-- Si registramos algún error en el registro, lo mostramos en rojo -->
            <?php if (!empty($errornombre)) echo "<p style='color:red;padding:1%;'>$errornombre</p>"; ?>
            <!-- Si se registra exitosamente, lo mostramos en verde -->
            <?php if (!empty($exitonombre)) {
                echo "<p style='color:green;padding:1%;'>$exitonombre</p>"; 
                header('Refresh: 5;');
            }
            ?>
        </div>
    </main>
    <?php include('../pie.php'); ?>
</body>
</html>
