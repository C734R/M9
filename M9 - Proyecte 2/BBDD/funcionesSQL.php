<?php
    require_once "conexion.php";
    $c = new Conectar();
    global $conexion;
    $conexion = $c->conexion();

    // Consulta tipo SELECT
    function select($conexion, $tabla, $campos, $condicion){
        $sql = "SELECT $campos FROM $tabla";
        if(!empty($condicion)) $sql.=" WHERE $condicion";
        return $conexion->query($sql);
    }
    
    // Consulta tipo INSERT
    function insert($conexion, $tabla, $campos, $valores){
        $sql = "INSERT INTO $tabla ($campos) VALUES ($valores)";
        return $conexion->query($sql);
    }

    // Consulta tipo UPDATE
    function update($conexion, $tabla, $campoydato, $condicion){
        $sql = "UPDATE $tabla SET $campoydato WHERE $condicion";
        return $conexion->query($sql);
    }

    // Consulta tipo DELETE
    function delete($conexion, $tabla, $condicion){
        $sql = "DELETE FROM $tabla WHERE $condicion";
        return $conexion->query($sql);
    }
?>