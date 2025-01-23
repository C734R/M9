<!-- Código para iniciar sesión -->
<?php
// Cargar ficheros necesarios
require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Proyecte 2/global.php';
require_once $_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'BBDD/funcionesSQL.php';

// Si la solicitud HTTP es tipo 'POST'
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Checkear si hay sesion abierta
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Definimos variables globales en la sesión
    $_SESSION['exito_iniciar'] = "";
    $_SESSION['error_iniciar'] = "";

    // Guardamos los datos recibidos del formulario de origen mediante POST
    $usuario = $_POST['usuario'];
    $password = hash("sha256",$_POST['password']);

    // Buscar datos de usuario introducido
    $resultado = select($conexion, 'usuarios', '*', "usuario = '$usuario'");

    // Si devuelve resultado (una fila)
    if ($resultado->num_rows === 1) {
        // Formateamos datos en array asociativo
        $datos = $resultado->fetch_assoc();

        // Si el dato contraseña coincide con la introducida
        if ($password === $datos['password']) {
            // Registramos los datos de la BBDD en la sesión del navegador
            $_SESSION['usuario'] = [
                'usuario' => $datos['usuario'],
                'nombre' => $datos['nombre'],
                'apellido1' => $datos['apellido1'],
                'apellido2' => $datos['apellido2']
            ];
            // Volvemos a index.php
            $_SESSION['exito_iniciar'] = "Sesión iniciada con éxito.";
        } 
        // Si la contraseña no coincide
        else {
            $_SESSION['error_iniciar'] = "Contraseña incorrecta.";
        }
    }
    // Si no devuelve resultado
    else {
        $_SESSION['error_iniciar'] = "Usuario no encontrado. Vuelve a intentarlo...";
    }
}

// Si accedemos desde otra página, volvemos a esa, si no, volvemos a inicio
if (isset($_SERVER['HTTP_REFERER'])) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
} 
else {
    header("Location: index.php"); 
    exit;
}

?>