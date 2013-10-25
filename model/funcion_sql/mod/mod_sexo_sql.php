<?php

	require_once dirname(__FILE__).'/../../../error.php';
	require_once dirname(__FILE__).'/../conexion.php';
	require_once dirname(__FILE__).'/../funciones_sql.php';
	
	$con = conectar();
	
	$id_sexo = $_POST['mod_sexo'];
	$sexo = strtoupper($_POST['desc_sexo']);

	echo $id_sexo." ";
	echo $sexo;
	
	try {


		//armamos el sql
		$sql = "UPDATE bedelia_db.sexo SET descripcion_sexo = :sexo WHERE sexo.id = :id";
		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);

		$stmt->bindParam(':id', $id_sexo);
		$stmt->bindParam(':sexo', $sexo);


		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}
	

	header('Location:../../abm_menu.php');
