<?php
	echo "<h1>Repaso BBDD</h1>";

	echo "<h3>¿Cómo creo una tabla?</h3>";
	echo "<p>La sintaxis es: CREATE TABLE {nombre tabla} (
	{columna1} {tipo} {opciones}
	). Un ejemplo de creación de tabla con una foreign key sería la siguiente:</p>";
	echo "CREATE TABLE zoo (
		id_jaula int(10) NOT NULL PRIMARY KEY,
		numero int(10) NOT NULL,
		animal varchar(100) NOT NULL,
    	CONSTRAINT nombre_animal FOREIGN KEY (animal) REFERENCES animales_favoritos(Nombre)
		);";	

	echo "<br><br><h3>¿Cómo añado elementos a la tabla?</h3>";
	echo "<p>Para añadir elementos a una tabla usamos el INSERT.
	En el insert debemos especificar las columnas a rellenar 
	y sus valores. Podemos insertar más de una fila a la vez 
	separando con comas. Ejemplo:</p>";
	echo "INSERT into zoo (id_jaula, numero, animal)
		values (1, 4, 'gato'), (2, 1, 'Leopardo')";

	echo "<br><br><h3>¿Cómo saco la información de una tabla?</h3>";
	echo "<p>Para obtener información de una tabla usamos 
	el SELECT. En el select podemos específicar qué 
	columnas queremos mostrar o * para ver todas. También 
	podemos poner condiciones para que solo nos salgan algunas 
	filas con el WHERE.</p>";
	echo "SELECT numero, animal 
		FROM zoo
		WHERE id_jaula = 1";
		
	echo "<br><br><h3>¿Cómo modifico elementos de la tabla?</h3>";
	echo "<p>Para modificar elementos usamos el UPDATE. 
	La sintaxis es la siguiente: <br>UPDATE {nombre tabla} 
	<br>SET {columna} = {valor}
	<br>WHERE {condición}
	<br>Es importante especificar qué fila queremos modificar
	usando el WHERE porque si no se cambiarán todas nuestras 
	filas. Ejemplo:</p>";
	echo "UPDATE zoo 
		SET id_jaula=4,
		numero=2,
		animal='Leopardo'
		WHERE id_jaula=2";
		
	echo "<br><br><h3>¿Cómo elimino elementos de la tabla?</h3>";
	echo "<p>Para eliminar elementos usamos el DELETE. 
	La sintaxis es la siguiente: DELETE FROM {nombre tabla} 
	WHERE {condición}
	<br>Es importante especificar qué fila queremos modificar
	usando el WHERE porque si no se eliminarán todas nuestras 
	filas. Ejemplo:</p>";
	echo "DELETE FROM zoo WHERE id_jaula=4";