<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	$estado = strtoupper($_POST['alta_tipo_estado_form']);
	
  


	try {

		

		//armamos el sql
		$sql = "INSERT INTO  bedelia_db.estado_alumno (id ,descripcion)
				VALUES (NULL , :desc)";

		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//~ //especificamos 
		//~ $stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':desc', $estado);

		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	

	header('Location:../../abm_menu.php');
