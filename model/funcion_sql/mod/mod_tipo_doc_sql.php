<?php

	require_once dirname(__FILE__).'/../../../error.php';
	require_once dirname(__FILE__).'/../conexion.php';
	require_once dirname(__FILE__).'/../funciones_sql.php';
	
	$con = conectar();
	
	$id_tipo_doc = $_POST['mod_tipo_doc_id'];

	$id_texto = strtoupper($_POST['mod_tipo_doc']);


	try {


		//armamos el sql
		$sql = "UPDATE bedelia_db.tipo_doc SET descripcion = :texto WHERE tipo_doc.id = :id";
		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
	

		$stmt->bindParam(':id', $id_tipo_doc);
		$stmt->bindParam(':texto', $id_texto);


		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	

	header('Location:../../abm_menu.php');
