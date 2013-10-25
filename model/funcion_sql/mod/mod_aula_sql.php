<?php

	require_once dirname(__FILE__).'/../../../error.php';
	require_once dirname(__FILE__).'/../conexion.php';
	require_once dirname(__FILE__).'/../funciones_sql.php';
	
	$con = conectar();
	
	$id_aula = $_POST['mod_sexo'];

	$id_texto = strtoupper($_POST['desc_aula']);


	try {


		//armamos el sql
		$sql = "UPDATE bedelia_db.aula SET descripcion_aula = :texto WHERE aula.id = :id";
		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//~ //especificamos 
		//~ $stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':id', $id_aula);
		$stmt->bindParam(':texto', $id_texto);


		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}



	header('Location:../../abm_menu.php');
