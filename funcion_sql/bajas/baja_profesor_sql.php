<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	$id_persona = $_POST['baja_id_profesor'];

	echo $id_persona;

	/*
	 * damos de baja primero al profesor
	 * luego lo damos de baja a la persona
	 */
	try {

		//armamos el sql
		$sql ="DELETE FROM profesor WHERE persona_id = :id";

		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//especificamos 
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':id', $id_persona);

		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}


	/*
	 * damos de baja a la persona
	 */


	try {

		//armamos el sql
		$sql_pers = "DELETE FROM persona WHERE id = :id";

		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql_pers);
		
		//especificamos 
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':id', $id_persona);

		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}



	header('Location:../../abm_menu.php');
