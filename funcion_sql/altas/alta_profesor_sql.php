<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	$tipo_doc = $_POST['opt_tipo_doc'];
	$nro_doc = $_POST['nro_doc_form'];
	$ape_nom = strtoupper($_POST['apellido_form']).",".strtoupper($_POST['nombre_form']);
	$direccion = strtoupper($_POST['direccion_form']);
	$fecha_nac = $_POST['fecha_nac_form'];
	$sexo = $_POST['opt_sexo'];
	$cargo = $_POST['opt_cargo'];


	/*
	 * inserto los datos en la tabla persona
	 */
	 
	try {

		//armamos el sql para dar de alta el profesor
		$sql = "INSERT INTO
						persona
						(id, nro_doc, ape_nom, direccion, fecha_nac, sexo_id, tipo_doc_id)
				VALUES
						(NULL, :doc, :ape_nombre, :domicilio, :fecha_nacimiento, :sexo, :tp_doc)";
				//VALUES ('".$nro_doc."','".$ape_nom."','".$direccion."','".$fecha_nac."',".$sexo.",".$tipo_doc.");";



		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//especificamos 
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

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


	echo $nro_doc;


	


	$sql_id ="SELECT * FROM persona WHERE nro_doc = :doc AND tipo_doc_id = :tp_doc";

	//preparamos un statement con el sql anterior
	$stmt = $con->prepare($sql_id);

	echo $sql_id;
	
	//especificamos 
	$stmt->setFetchMode(PDO::FETCH_ASSOC);

	$stmt = $con->prepare($sql_id);

	$stmt->bindParam(':doc', $nro_doc);
	$stmt->bindParam(':tp_doc', $tipo_doc);
	
	$stmt->execute();

			
	$results = $stmt->fetch();
	var_dump($results);

	$id_persona = $results['id'];
	


	/*
	 * inserto los datos en la tabla de profesores
	 */


	try {

		//armamos el sql para dar de alta el profesor
		$sql_prof = "INSERT INTO bedelia_db.profesor (cargo_id, persona_id) VALUES (".$cargo.",".$id_persona.")";

		

		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql_prof);
		
		//especificamos 
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->execute();		

		echo $sql_prof;
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	
	header('Location:../../abm/abm_profesor.php');
