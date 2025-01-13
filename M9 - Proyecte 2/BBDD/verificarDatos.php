<!-- Variable entrada desde otro doc -->
<!-- <input name="usuario"> -->
<?php 
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];

    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";

    // Traemos las clases definidas en conexion.php
    require_once "conexion.php";
    // Creamos objeto
    $c = new Conectar();
    // Guardamos su método "conexion()" para lanzar las querys
    $conexion = $c -> conexion();
    // Lanzamos query preparada
    $resultset = $conexion -> query($sql);
    // Convertir datos recogidos en formato array
    $resultset = $resultset -> fetch_assoc(); 
    // Si tenemos datos, comparamos contraseñas cifradas y
    if($resultset) {
        $passBBDD = $datos["password"];
        $pass = hash("sha256", $pass);
        if ($pass == $passBB) header("location: main.php");
        echo "Contraseña incorrecta.";
        header("location: main.php");
    }
    echo "Usuario inexistente.";
    header("location: main.php");
?>