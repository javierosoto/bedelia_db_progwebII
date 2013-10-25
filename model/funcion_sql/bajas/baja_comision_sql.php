<?php

	require_once dirname(__FILE__).'/../../../error.php';
	require_once dirname(__FILE__).'/../conexion.php';
	require_once dirname(__FILE__).'/../funciones_sql.php';
	
	$con = conectar();
	$id_co = isset($_POST['baja_id_comision']) ? $_POST['baja_id_comision'] : null;



	try {

		//armamos el sql
		$sql = "DELETE FROM comision WHERE id = :id_co";

		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//especificamos 
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':id_co', $id_co);

		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

unset ($_GET['descr']);
	//~ header ("Location:".dirname(__FILE__)."controler.php?descr=salir");
	header ("Location:controler.php?descr=salir");
	exit;
