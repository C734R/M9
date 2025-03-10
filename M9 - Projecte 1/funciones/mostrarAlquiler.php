<div class="lista-alquileres">
    <!-- Si la lista tiene registros -->
    <?php if (!empty($_SESSION['alquileres'])): ?>
        <!-- Mostramos mediante bucle for y avanzamos índice -->
        <?php foreach ($_SESSION['alquileres'] as $index => $alquiler): ?>
            <!-- Bloque de los datos registrados a mostrar -->
            <div class="alquiler">
                <h2>Registro de alquiler nº <?php echo $index + 1; ?></h2>
                <p>Modelo: <?php echo htmlspecialchars($alquiler['modelo']); ?></p>
                <p>Días alquilado: <?php echo htmlspecialchars($alquiler['dias']); ?></p>
                <p>Piloto: <?php echo htmlspecialchars($alquiler['piloto']); ?></p>
            </div>
        <?php endforeach; ?>
    <!-- Si no hay registros aún -->
    <?php else: ?>
        <p class="sin-alquiler">No existen alquileres registrados.</p>
    <?php endif; ?>
</div>