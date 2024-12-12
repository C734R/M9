<?php
    require_once "conexion.php";
    $c = new Conectar();
    global $conexion;
    $conexion = $c->conexion();

    function select($conexion){
        $sql = "SELECT * FROM animales_favoritos";
        return $conexion->query($sql);
    }
    
    function insert($conexion){
        $sql = "INSERT INTO  ";
        return $conexion->query($sql);
    }

    function delete($conexion, $id){
        $sql = "DELETE FROM users WHERE name = $id";
        return $conexion->query($sql);
    }