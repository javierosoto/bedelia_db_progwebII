<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	$estado_alumno = $_POST['baja_estado_alumno'];



	try {

		//armamos el sql
		$sql = "DELETE FROM bedelia_db.estado_alumno WHERE estado_alumno.id = :id";

		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//~ //especificamos 
		//~ $stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':id', $estado_alumno);

		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	echo "registro borrado corectamente :)";

	header('Location:../../abm/abm_estado_alumno.php');
