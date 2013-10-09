<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	
	$id_carrera = $_POST['mod_carrera'];

	$carrera = strtoupper($_POST['nombre_carrera']);

echo "id - ".$id_carrera." nombre:".$carrera;
	
	try {


		//armamos el sql
		$sql = "UPDATE bedelia_db.carrera SET nombre_carrera = :texto WHERE carrera.id = :id";
		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
	

		$stmt->bindParam(':id', $id_carrera);
		$stmt->bindParam(':texto', $carrera);



		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	echo "<h1>registro modificado corectamente :)</h1>";
	

	header('Location:../../abm/abm_carrera.php');
