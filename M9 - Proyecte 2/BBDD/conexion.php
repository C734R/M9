<?php 
	// Clase con diferentes funciones para conexión BBDD
	class Conectar{
		private $servidor="127.0.0.1:3306";
		private $usuario="root";
		private $password="1234";
		private $bd="m9uf1";

		//MYSQLI con funciones
		public function /*conexion*/ conexionMysqlIFunciones(){
			$conexion=mysqli_connect($this->servidor, $this->usuario, $this->password, $this->bd);
			// Verificar conexión
			if (mysqli_connect_errno()) {
				die("Conexión fallida: " . mysqli_connect_error());
			}
			return $conexion;
		}

		//MYSQLI orientado a objetos
		public function /*conexionMysqliObjetos*/ conexion(){
			$conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->bd);
			if ($conexion->connect_error) {
				die("Conexión fallida: " . $conexion->connect_error);
			}
			return $conexion;
		}

		public function /*conexion*/ conexionPDO(){
			try {
				$conexion = new PDO("mysql:host={$this->servidor};dbname={$this->bd}", $this->usuario, $this->password);
				$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conexion;
			} catch(PDOException $e) {
				die("Conexión fallida: " . $e->getMessage());
			}
		}

	}

 ?>