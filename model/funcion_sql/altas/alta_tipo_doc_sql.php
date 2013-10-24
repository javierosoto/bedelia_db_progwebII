<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	$tipo_doc = strtoupper($_POST['alta_tipo_doc']);
	
  


	try {

		//armamos el sql
		$sql = "INSERT INTO  bedelia_db.tipo_doc (id ,descripcion)
				VALUES (NULL , :desc_tipo)";

		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//~ //especificamos 
		//~ $stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':desc_tipo', $tipo_doc);

		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	

	header('Location:../../abm_menu.php');
