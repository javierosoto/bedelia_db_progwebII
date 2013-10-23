<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	$aula = strtoupper($_POST['alta_aula']);
	
  


	try {

		

		//armamos el sql
		$sql = "INSERT INTO  bedelia_db.aula (id ,descripcion_aula)
				VALUES (NULL , :desc_aula)";

		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//~ //especificamos 
		//~ $stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':desc_aula', $aula);

		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	

	header('Location:../../abm_menu.php');
