<?php
// Iniciar sesión
session_start();

// Comprobar acceso mediante método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si se solicita eliminar todos los registros
    if (isset($_POST['accion']) && $_POST['accion'] === 'eliminar_todo') {
        unset($_SESSION['alquileres']); // Eliminar todos los registros
        echo "<h1>Todos los registros de alquiler han sido eliminados con éxito.</h1>";
    } 
    // En cualquier otro caso
    else {
        echo "<h1>Error: Acción no válida.</h1>";
    }
} 
// Si no se accede mediante post
else {
    echo "Acceso no autorizado.";
    header("Refresh: 5; url=../alquilados.php");
    exit();
}
// Volver finalmente a la lista de alquileres
echo "Volviendo a la lista de alquileres.";
header("Refresh: 5; url=../alquilados.php");
?>