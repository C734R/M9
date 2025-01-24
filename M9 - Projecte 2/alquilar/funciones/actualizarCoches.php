<?php
// Cargar ficheros requeridos
require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Projecte 2/global.php';
require_once $_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'/BBDD/funcionesSQL.php';

// Iniciar sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Declarar variables sesion
$error = false;
$exito = false;

// Si llegamos a través de POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Volcamos localmente variables post y reseteamos
    $modelo = isset($_POST['modelo']) ? $_POST['modelo'] : '';
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;

    // Resetear datos POST
    unset($_POST['modelo']);
    unset($_POST['cantidad']);

    // Comprobar si la cantidad introducida es igual a la existente 
    $igual = $_SESSION['coches'][$modelo]['cantidad'] === $cantidad ? true : false;

    // Si tenemos modelo y cantidad, y la cantidad no es igual a la ya registrada
    if(!empty($modelo) && !empty($cantidad) && !$igual){

        // Actualizamos datos
        update($conexion,'coches',"cantidad = '$cantidad'", "modelo = '$modelo'");
        
        // Si hay filas afectadas éxito, si no, error
        if($conexion->affected_rows > 0)$exito = true;
        else $error = true;

    }
    // Registramos error
    else $error = true;

    // Devolvemos mensaje según modelo para ubicarlo correctamente
    if($error) {
        $mensaje = $igual ? "Error. La cantidad indicada es igual a la registrada. Introduce otra cantidad. Espera...": "Error. No se ha podido modificar la cantidad disponible. Espera...";
        switch ($modelo):
            case 'HONDAS2000':
                $_SESSION['error_honda'] = $mensaje;
                break;
            case 'BMWM3E30':
                $_SESSION['error_bmw'] = $mensaje;
                break;
            case 'MBW201AMG190EDCM':
                $_SESSION['error_mb'] = $mensaje;
                break;
            case 'EVO9':
                $_SESSION['error_evo'] = $mensaje;
                break;
            case 'CUPRA6L':
                $_SESSION['error_ibiza'] = $mensaje;
                break;
        endswitch;
    }

    // Devolvemos mensaje según modelo para ubicarlo correctamente
    if($exito) {
        $mensaje = "Se ha actualizado la cantidad con éxito. Espera...";
        switch ($modelo):
            case 'HONDAS2000':
                $_SESSION['exito_honda'] = $mensaje;
                break;
            case 'BMWM3E30':
                $_SESSION['exito_bmw'] = $mensaje;
                break;
            case 'MBW201AMG190EDCM':
                $_SESSION['exito_mb'] = $mensaje;
                break;
            case 'EVO9':
                $_SESSION['exito_evo'] = $mensaje;
                break;
            case 'CUPRA6L':
                $_SESSION['exito_ibiza'] = $mensaje;
                break;
        endswitch;
    }
    
    //echo "<meta http-equiv='refresh' content='0;url='".URL_Proyecto."alquilar/productos.php?inventario=true#".$modelo."'>";
    header("Location: ".URL_Proyecto."alquilar/productos.php?inventario=true#".$modelo."");
    exit();
}
header("Location: ".URL_Proyecto."alquilar/productos.php?inventario=true#".$modelo."");

//else echo "<meta http-equiv='refresh' content='0;url='".URL_Proyecto."index.php'>";
?>