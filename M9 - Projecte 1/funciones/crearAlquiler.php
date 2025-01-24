<?php
// Iniciar sesión
session_start();

// Si se reciben los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Comprobamos validez
    $modelo = $_SESSION['modelo'] ?? 'Modelo no definido';
    $dias_alquiler = $_POST['dias_alquiler'] ?? 0;
    $nombre_piloto = trim($_POST['nombre_piloto'] ?? '');

    // Validar los datos
    if ($dias_alquiler < 1 || empty($nombre_piloto)) {
        // Vuelve al formulario con un mensaje de error
        $_SESSION['error'] = "Por favor, introduzca un número de días válido y un nombre.";
        header("Location: formAlquiler.php?modelo=" . urlencode($modelo));
        exit();
    }

    // Si los datos son válidos, registramos en array de alquileres
    if (!isset($_SESSION['alquileres'])) {
        $_SESSION['alquileres'] = [];
    }

    // Estructura de los datos a guardar
    $_SESSION['alquileres'][] = 
        [
            'modelo' => $modelo,
            'dias' => $dias_alquiler,
            'piloto' => $nombre_piloto,
        ];

    // Redirige a la página de alquileres registrados
    header("Location: ../alquilados.php");
    exit();
} 
// Si no se accede mediante POST vamos a lista alquileres
else {
    echo "Acceso no autorizado.";
    header("Refresh: 5; url=../alquilados.php");
    exit();
}