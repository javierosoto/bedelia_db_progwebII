<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	
	$id_materia = isset($_POST['id_materia']) ? $_POST['id_materia'] : null;
	$materia = isset($_POST['nombre_materia']) ? strtoupper($_POST['nombre_materia']) : null;
	$inicial = isset($_POST['fecha_ini']) ? $_POST['fecha_ini'] : null;
	$final = isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : null;
	$id_carrera = isset($_POST['mod_carrera']) ? $_POST['mod_carrera'] : null;
	
	try {
		//armamos el sql
		$sql = "UPDATE materia SET nombre_materia ='".$materia."', fecha_inicio_cursada ='".$inicial."',fecha_fin_cursada ='".$final."',carrera_id =".$id_carrera." WHERE id =".$id_materia;


		echo $sql;
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);

		//especificamos 
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
/*
		$stmt->bindParam(':nombre', );
		$stmt->bindParam(':inicio', $inicial);
		$stmt->bindParam(':final', $final);
		$stmt->bindParam(':carrera', $id_carrera);
		$stmt->bindParam(':id', $id_materia);
*/
		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}


	

	header('Location:../../abm_menu.php');
