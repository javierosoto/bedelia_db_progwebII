<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	$carrera = strtoupper($_POST['alta_tipo_carrera']);

	try {

		

		//armamos el sql
		$sql = "INSERT INTO  bedelia_db.carrera (id ,nombre_carrera)
				VALUES (NULL , :nom_carrera)";

		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//~ //especificamos 
		//~ $stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':nom_carrera', $carrera);

		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	echo "registro ingresado corectamente :)";

	header('Location:../../abm/abm_carrera.php');
