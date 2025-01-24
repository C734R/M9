<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		require_once "conexion.php";

		$c = new Conectar();
		$conexion = $c->conexion();

		echo "<h1>¿Cómo se hace una petición a la base de datos?</h1>";
		echo "<p>Para hacer una petición, necesitamos tener una conexión 
		a la base de datos (\$conexion) y enviar una 'query'. La query 
		es nuestra petición, y le tendremos que pasar lo que queremos
		que se ejecute en la base de datos (select, insert, update...). 
		La sintaxis es la siguiente: \$conexion->query({sentenciaSQL}).
		Esta línea nos devolverá el resultado de nuestra petición en un 
		objeto con el que es difícil trabajar. Por eso transformaremos 
		los datos usando fetch_row, fetch_assoc o fetch_all.";
 
	$result = $conexion->query("SELECT * from animales_favoritos");	
	echo "<h3><br>Resultados sin fetch</h3>";
	print_r($result);

	//fetch_row devuelve la primera línea de nuestra consulta
	//como un array normal 
		$result = $conexion->query("SELECT * from animales_favoritos");	
		echo "<h3><br>Resultados con fetch_row</h3>";
		print_r($result->fetch_row());
		echo "<br>";
		//Si volvemos a hacer fetch_row, pasaríamos a la siguiente línia de la tabla
		print_r($result->fetch_row());
		echo "<br>";

	//fetch_row devuelve la primera línea de nuestra consulta
	//como un array asociativo 
		$result1 = $conexion->query("SELECT * from animales_favoritos");	
		echo "<h3><br>Resultados con fetch_assoc</h3>";
		print_r($result1->fetch_assoc());
		echo "<br>";
		print_r($result1->fetch_assoc());
		echo "<br>";
		
	//fetch_row devuelve todas las líneas de nuestra consulta
	//como un array de arrays (2 dimensiones) 		
		$result2 = $conexion->query("SELECT * from animales_favoritos");	
		echo "<h3><br>Resultados con fetch_all</h3>";
		print_r($result2->fetch_all());

	//Si te fijas, en nuestros ejemplos estamos repitiendo todo
	//el rato la misma línea para devolver cada fila de nuestra
	//tabla. ¿No podríamos usar un bucle para ahorrarnos la 
	//repetición de código? Vamos a verlo:
		$result3 = $conexion->query("SELECT * from animales_favoritos");	
		echo "<h2><br><br>¿Podemos usar un bucle?</h2>";
		//mientras fetch_assoc() nos devuelva algo, se hará el bucle
		echo "Animales:";
		while($animal = $result3->fetch_assoc()){
			echo " " . $animal["Nombre"];
		}

		echo "<h3><br>¿Qué devuelve fetch_assoc cuando ya no 
		hay más filas?</h3>";
		echo "Devuelve: '" . $result3->fetch_assoc() . "' (nada)";
		echo "<h3><br>¿Nada es igual a 0?</h3>";
		echo "'' == 0? " . ($result3->fetch_assoc()==0);
	?>


</body>
</html>