<?php
// Cargar ficheros requeridos
require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Projecte 2/global.php';
include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'alquilar/funciones/obtenerAlquileres.php');
?>

<div class="lista-alquileres">
    <!-- Si la lista tiene registros -->
    <?php if (!empty($_SESSION['alquileres'])): ?>
        <!-- Mostramos mediante bucle for y avanzamos índice -->
        <?php foreach ($_SESSION['alquileres'] as $index => $alquiler): ?>
            <!-- Bloque de los datos registrados a mostrar -->
            <div class="alquiler">
                <h2>Registro de alquiler nº <?php echo $index + 1; ?></h2>
                <p>Modelo: <?php echo $alquiler["modelo"] ?></p>
                <p>Días alquilado: <?php echo $alquiler['dias'] ?></p>
                <p>Piloto: <?php echo $alquiler['piloto'] ?></p>
                <p>Precio total: <?php echo $alquiler['precio_total'].'€'; ?></p>
            </div>
        <?php endforeach; ?>
    <!-- Si no hay registros aún -->
    <?php else: ?>
        <p class="sin-alquiler">No existen alquileres registrados.</p>
    <?php endif; ?>
</div>