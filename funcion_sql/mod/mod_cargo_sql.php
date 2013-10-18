<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	
	$id_cargo = $_POST['mod_cargo'];
	$cargo = strtoupper($_POST['desc_cargo']);

	echo $id_cargo." ";
	echo $cargo;
	
	try {


		//armamos el sql
		$sql = "UPDATE bedelia_db.cargo SET descripcion_cargo = :cargo WHERE cargo.id = :id";
		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);

		$stmt->bindParam(':id', $id_cargo);
		$stmt->bindParam(':cargo', $cargo);


		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	

	header('Location:../../abm_menu.php');
