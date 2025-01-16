<?php
    require_once "conexion.php";
    $c = new Conectar();
    global $conexion;
    $conexion = $c->conexion();

    function select($conexion, $tabla, $campos, $condicion){
        $sql = "SELECT $campos FROM $tabla";
        if(!empty($condicion)) $sql.=" WHERE $condicion";
        return $conexion->query($sql);
    }
    
    function insert($conexion, $tabla, $campos, $valores){
        $sql = "INSERT INTO $tabla ($campos) VALUES ($valores)";
        return $conexion->query($sql);
    }

    function update($conexion, $tabla, $campo, $nuevoDato, $condicion){
        $sql = "UPDATE $tabla SET $campo = $nuevoDato WHERE $condicion";
        return $conexion->query($sql);
    }

    function delete($conexion, $tabla, $condicion){
        $sql = "DELETE FROM $tabla WHERE $condicion";
        return $conexion->query($sql);
    }
?>