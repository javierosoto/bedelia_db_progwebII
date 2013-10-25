<?php

	require_once dirname(__FILE__).'/../../../error.php';
	require_once dirname(__FILE__).'/../conexion.php';
	require_once dirname(__FILE__).'/../funciones_sql.php';
	
	$con = conectar();
	$id_carrera = $_POST['baja_id_carrera'];



	try {

		//armamos el sql
		$sql = "DELETE FROM bedelia_db.carrera WHERE carrera.id = :id";

		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//~ //especificamos 
		//~ $stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':id', $id_carrera);

		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

unset ($_GET['descr']);
	//~ header ("Location:".dirname(__FILE__)."controler.php?descr=salir");
	header ("Location:controler.php?descr=salir");
	exit;
