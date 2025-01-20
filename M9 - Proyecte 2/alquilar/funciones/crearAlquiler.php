<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Proyecte 2/global.php';
    require_once $_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'/BBDD/funcionesSQL.php';

// Iniciar sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si se reciben los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Comprobamos validez
    $modelo = $_SESSION['modelo'] ?? 'Modelo no definido';
    $dias_alquiler = $_POST['dias_alquiler'] ?? 0;
    $nombre_piloto = $_POST['nombre_piloto'] ?? '';

    // Validar los datos
    if ($dias_alquiler < 1) {
        // Vuelve al formulario con un mensaje de error
        $_SESSION['mensaje_error'] = "Por favor, introduzca un número de días válido y un nombre.";
        header("Location: ".$_SERVER['DOCUMENT_ROOT'].URL_Proyecto."alquilar/formAlquiler.php");
        exit();
    }


    // Si los datos son válidos, registramos en array de alquileres
    if (!isset($_SESSION['alquileres'])) {
        insert($conexion, 'coches', "'modelo','dias','piloto'","'$modelo','$dias','$nombre_piloto'");
        if($conexion->affected_rows > 0) {
            
            $_SESSION['alquileres'][] = 
            [
                'modelo' => $modelo,
                'dias' => $dias_alquiler,
                'piloto' => $nombre_piloto,
            ];
        }
    }

    // Redirige a la página de alquileres registrados
    header("Location: ".$_SERVER['DOCUMENT_ROOT'].URL_Proyecto."alquilar/alquilados.php");
    exit();
} 
// Si no se accede mediante POST vamos a lista alquileres
else {
    echo "Acceso no autorizado.";
    header("Refresh: 5; url=".$_SERVER['DOCUMENT_ROOT'].URL_Proyecto."alquilar/alquilados.php");
    exit();
}