<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();


	$id_persona = isset($_POST['mod_id_pers']) ? $_POST['mod_id_pers'] : null;
	$tipo_doc = isset($_POST['mod_tipo_doc']) ? $_POST['mod_tipo_doc'] : null;
	$nro_docu = isset($_POST['nro_doc']) ? $_POST['nro_doc'] : null;
	$ape = isset ($_POST['apellido']) ? strtoupper($_POST['apellido']) : null;
	$nom = isset($_POST['nombre']) ? strtoupper($_POST['nombre']) : null;
	$ape_nom = $ape.",".$nom;
	$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
	$fecha_nac = isset($_POST['fecha_nac']) ? $_POST['fecha_nac'] : null;
	$sexo = isset($_POST['mod_sexo']) ? $_POST['mod_sexo'] : null;
	$cargo = isset($_POST['opt_cargo']) ? $_POST['opt_cargo'] : null;


	/*
	 * modifica los datos del profesor
	 */
	try {


		//armamos el sql
		$sql = "UPDATE bedelia_db.persona SET nro_doc ='".$nro_docu."', ape_nom ='".$ape_nom."', direccion = '".$direccion."', fecha_nac = '".$fecha_nac."', sexo_id = ".$sexo.", tipo_doc_id =".$tipo_doc." WHERE persona.id =".$id_persona;
		
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		

		$stmt->execute();

	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	/*
	 * modificamos el cargo del profesor
	 */
	try {


		//armamos el sql
		$sql_cargo = "UPDATE profesor SET cargo_id = ".$cargo." WHERE persona_id = ".$id_persona;

		echo $sql_cargo;
		
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql_cargo);
		

		$stmt->execute();

	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	header('Location:../../abm_menu.php');
