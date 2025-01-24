<?php
// Cargar ficheros requeridos
require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Projecte 2/global.php';
require_once $_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'/BBDD/funcionesSQL.php';

// Definir piloto según si hay o no usuario
$piloto = isset($_SESSION['usuario']['usuario']) ? $_SESSION['usuario']['usuario'] : '' ;

// Resetear array alquileres
unset($_SESSION['alquileres']);

// Obtener resultados trazando datos 3 tablas
$resultado =  !empty($piloto) ? select_innerjoin($conexion, 'alquileres','*','usuarios ON alquileres.piloto = usuarios.usuario INNER JOIN coches ON alquileres.coche = coches.id_coche',"usuario = '$piloto' ") : '';

// Si hemos realizado consulta, registramos datos en sesión
if (!empty($resultado) ?? $resultado->num_rows > 0) {
    while ($datos = $resultado->fetch_assoc()) {
        $_SESSION['alquileres'][] = 
        [
            'id_alquiler' => $datos['id_alquiler'],
            'modelo' => $datos['modelo'],
            'dias' => $datos['dias'],
            'piloto' => $datos['nombre']." ".$datos['apellido1']." ".$datos['apellido2'],
            'precio_total' => $datos['precio_total']
        ];
    }
}
?>