<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	$id_carrera = $_POST['baja_id_carrera'];



	try {

		//armamos el sql
		$sql = "DELETE FROM bedelia_db.carrera WHERE carrera.id = :id";

		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//~ //especificamos 
		//~ $stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':id', $id_carrera);

		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	echo "registro borrado corectamente :)";


	header('Location:../../abm_menu.php');
