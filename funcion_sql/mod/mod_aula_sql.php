<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
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

	echo "registro borrado corectamente :)";

	header('Location:../../abm/abm_aula.php');
