<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	$id_cargo = $_POST['baja_id_cargo'];

	echo $id_cargo."<br>";

	
	
	try {

		//armamos el sql
		$sql = "DELETE FROM bedelia_db.cargo WHERE cargo.id = :id";


		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);

		$stmt->bindParam(':id', $id_cargo);

		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	
	header('Location:../../abm/abm_cargo.php');
