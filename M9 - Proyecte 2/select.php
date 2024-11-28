<?php

    require_once "funcionesSQL.php";
    $resultado = select();
    while ($datos = $resultado->fetch_assoc()){
        echo "Nom: ", $datos["Nombre"];
        echo "Valoració: ", $datos["Valoracio"];
        echo "<br>";

    }
