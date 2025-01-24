<?php
// Cargar ficheros requeridos
require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Proyecte 2/global.php';
require_once $_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'/BBDD/funcionesSQL.php';

// Iniciar sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Consulta coches
$resultado = select($conexion, 'coches', '*', '');

// Si obtenemos resultados
if ($resultado->num_rows > 0) {
    // Definimos array de coches en la sesión
    $_SESSION['coches'] = [];

    // Mientras haya datos, registramos los coches en array coches sesión
    while ($datos = $resultado->fetch_assoc()) {
        $_SESSION['coches'][''.$datos['modelo'].''] = [
            'cantidad' => $datos['cantidad'],
            'precio' => $datos['precio']
        ];
    }

}
else $_SESSION['mensaje_coches_error'] = "Error. No se han podido obtener los coches disponibles."

?>