<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	$id_sexo = $_POST['baja_id_sexo'];



	try {

		//armamos el sql
		$sql = "DELETE FROM bedelia_db.sexo WHERE sexo.id = :id";

		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//~ //especificamos 
		//~ $stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':id', $id_sexo);

		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	echo "registro borrado corectamente :)";


	header('Location:../../abm/abm_sexo.php');
