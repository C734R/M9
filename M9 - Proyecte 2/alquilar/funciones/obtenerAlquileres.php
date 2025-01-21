<?php
// Obtener páginas necesarias
require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Proyecte 2/global.php';
require_once $_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'/BBDD/funcionesSQL.php';

$piloto = $_SESSION['usuario']['usuario'];

$resultado = select_innerjoin($conexion, 'alquileres','*','usuarios ON alquileres.piloto = usuarios.usuario',"usuario = '$piloto' ");
if ($resultado->num_rows > 0) {
    while ($datos = $resultado->fetch_assoc()) {
        $_SESSION['alquileres'][] = 
        [
            'modelo' => $datos['modelo'],
            'dias' => $datos['dias'],
            'piloto' => $datos['piloto'],
            'precio_total' => $datos['precio_total']
        ];
    }
}
?>