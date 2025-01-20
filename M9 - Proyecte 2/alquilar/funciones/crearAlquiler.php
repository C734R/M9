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
    $dias = $_POST['dias'] ?? 0;
    $piloto = $_SESSION['usuario'] ?? '';
    $_SESSION['alquileres'] = []; 


    // Validar los datos
    if ($dias < 1) {
        // Vuelve al formulario con un mensaje de error
        $_SESSION['error_alquiler'] = "Por favor, introduzca un número de días válido y un nombre.";
        header("Location: ".$_SERVER['DOCUMENT_ROOT'].URL_Proyecto."alquilar/formAlquiler.php");
        exit();
    }


    // Si los datos son válidos, registramos en array de alquileres
    insert($conexion, 'coches', "'modelo','dias','piloto'","'$modelo','$dias','$piloto'");
    if($conexion->affected_rows > 0) {
        $resultado = select_innerjoin($conexion, 'alquileres','*','usuarios ON alquileres.piloto = usuarios.usuario',"usuario = '$piloto' ");
        if ($resultado->num_rows > 0) {
            while ($datos = $resultado->fetch_assoc()) {
                $_SESSION['alquileres'][] = 
                [
                    'modelo' => $datos['modelo'],
                    'dias' => $datos['dias'],
                    'piloto' => $datos['piloto'],
                ];
            }
        }
        else $_SESSION['error_alquiler'] = "Error. No se han obtenido resultados.";
    }
    else $_SESSION['error_alquiler'] = "Error. No se ha podido registrar el alquiler.";

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

?>