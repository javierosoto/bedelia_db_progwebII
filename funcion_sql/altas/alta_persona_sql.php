<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	$tipo_doc = $_POST['id_tipo_doc_form'];
	$nro_doc = $_POST['nro_doc_form'];
	$ape_nom = strtoupper($_POST['apellido_form']).",".strtoupper($_POST['nombre_form']);
	$direccion = strtoupper($_POST['direccion_form']);
	$fecha_nac = $_POST['fecha_nac_form'];
	$sexo = $_POST['sexo_form'];

	try {

		//armamos el sql
		$sql = "INSERT INTO bedelia_db.persona (nro_doc, ape_nom, direccion, fecha_nac, sexo_id, tipo_doc_id)
				VALUES ('".$nro_doc."','".$ape_nom."','".$direccion."','".$fecha_nac."',".$sexo.",".$tipo_doc.");";
				//VALUES (NULL, :doc, :ape_nombre, :domicilio, :fecha_nacimiento, :sexo, :tp_doc)";
		


//VALUES ('".$nro_doc."','".$ape_nom."','".$direccion."','".$fecha_nac."',".$sexo.",".$tipo_doc.");";

		echo $sql;


		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//~ //especificamos 
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':doc', $nro_doc);
		$stmt->bindParam(':ape_nombre', $ape_mon);
		$stmt->bindParam(':domicilio', $direccion);
		$stmt->bindParam(':fecha_nacimiento', $fecha_nac);
		$stmt->bindParam(':sexo', $sexo);
		$stmt->bindParam(':tp_doc', $tipo_doc);

		$stmt->execute();
		
		
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	
	header('Location:../../abm/abm_persona.php');
