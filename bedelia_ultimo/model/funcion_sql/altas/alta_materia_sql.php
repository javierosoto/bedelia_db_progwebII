<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	$materia = isset($_POST['alta_nombre_materia']) ? strtoupper($_POST['alta_nombre_materia']) : null;
	$fecha_inicio = isset($_POST['alta_fecha_inicio_cursada']) ? $_POST['alta_fecha_inicio_cursada'] : null;
	$fecha_final = isset($_POST['alta_fecha_fin_cursada']) ? $_POST['alta_fecha_fin_cursada'] : null; 
	$carrera = isset($_POST['opt_carrera']) ? $_POST['opt_carrera'] : null;


	try {

		

		//armamos el sql
		$sql = "INSERT INTO  materia (id ,nombre_materia, fecha_inicio_cursada, fecha_fin_cursada, carrera_id)
				VALUES (NULL , :nom, :fi, :ff, :ca)";

		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//especificamos 
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':nom', $materia);
		$stmt->bindParam(':fi', $fecha_inicio);
		$stmt->bindParam(':ff', $fecha_final);
		$stmt->bindParam(':ca', $carrera);

		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	

	header('Location:../../abm_menu.php');
