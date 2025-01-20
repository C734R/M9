<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Proyecte 2/global.php';
    require_once $_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'/BBDD/funcionesSQL.php';

// Iniciar sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$resultado = select($conexion, 'coches', '*', '');

if ($resultado->num_rows > 0) {
    $_SESSION['coches'] = [];
    while ($datos = $resultado->fetch_assoc()) {
        // Asignar claves específicas según el modelo del coche
        switch ($datos['modelo']) {
            case 'HONDAS2000':
                $_SESSION['coches']['honda'] = [
                    'cantidad' => $datos['cantidad'],
                    'precio' => $datos['precio']
                ];
                break;
            case 'BMWM3E30':
                $_SESSION['coches']['bmw'] = [
                    'cantidad' => $datos['cantidad'],
                    'precio' => $datos['precio']
                ];
                break;
            case 'MBW201AMG190EDCM':
                $_SESSION['coches']['mb'] = [
                    'cantidad' => $datos['cantidad'],
                    'precio' => $datos['precio']
                ];
                break;
            case 'EVO9':
                $_SESSION['coches']['evo'] = [
                    'cantidad' => $datos['cantidad'],
                    'precio' => $datos['precio']
                ];
                break;
            case 'CUPRA6L':
                $_SESSION['coches']['ibiza'] = [
                    'cantidad' => $datos['cantidad'],
                    'precio' => $datos['precio']
                ];
                break;
        }
    }
}
else $_SESSION['mensaje_coches'] = "Error. No se han podido obtener los coches disponibles."

?>