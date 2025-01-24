<?php
    
    require_once "funcionesSQL.php";
    require_once "conexion.php";
    
    $c = new Conectar();
    global $conexion;
    $conexion = $c->conexion();

    $resultado = select($conexion, );
    while ($datos = $resultado->fetch_assoc()){
        echo "Nom: ", $datos["Nombre"];
        echo "Valoració: ", $datos["Valoracio"];
        echo "<br>";

    }
?>