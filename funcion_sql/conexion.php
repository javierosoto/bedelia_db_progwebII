<?php
	/*
	 * esta funcion realiza la conexion a la BBDD  
	 */
	function conectar(){
		
		try {
			$pdo = new PDO ('mysql:host=localhost;dbname=bedelia_db', 'root', 'root');
			//$pdo = new PDO( HOST, USER, PASS);
		} catch (Exception $e) {
				die("Error en la conexion a la BBDD ").$e->getMessage();
		}

		return $pdo;
	}
