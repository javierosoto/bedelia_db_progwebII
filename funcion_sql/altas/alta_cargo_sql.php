<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	$aula = strtoupper($_POST['alta_cargo']);
	
  


	try {

		

		//armamos el sql
		$sql = "INSERT INTO  bedelia_db.cargo (id ,descripcion_cargo)
				VALUES (NULL , :desc_cargo)";

		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//~ //especificamos 
		//~ $stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':desc_cargo', $aula);

		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	echo "registro ingresado corectamente :)";

	header('Location:../../abm/abm_cargo.php');
