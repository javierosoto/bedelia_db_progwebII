<?php

	require_once dirname(__FILE__).'/../../../error.php';
	require_once dirname(__FILE__).'/../conexion.php';
	require_once dirname(__FILE__).'/../funciones_sql.php';
	
	$con = conectar();
	$id_tipo_doc = $_POST['baja_id_tipo_dni'];



	try {

		//armamos el sql
		$sql = "DELETE FROM bedelia_db.tipo_doc WHERE tipo_doc.id = :id";

		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//~ //especificamos 
		//~ $stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':id', $id_tipo_doc);

		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	
	//~ header ("Location:".dirname(__FILE__)."controler.php?descr=salir");
	header ("Location:controler.php?descr=salir");
	exit;
