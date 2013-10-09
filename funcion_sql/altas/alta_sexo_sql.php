<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	$sexo = strtoupper($_POST['alta_tipo_sexo']);
	
  


	try {

		

		//armamos el sql
		$sql = "INSERT INTO  bedelia_db.sexo (id ,descripcion_sexo)
				VALUES (NULL , :desc_sexo)";

		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//~ //especificamos 
		//~ $stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':desc_sexo', $sexo);

		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	echo "registro ingresado corectamente :)";

	header('Location:../../abm/abm_sexo.php');
