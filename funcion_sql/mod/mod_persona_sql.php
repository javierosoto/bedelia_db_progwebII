<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();

	$id_persona = $_POST['mod_id_persona'];
	$tipo_doc = $_POST['mod_tipo_doc'];
	$nro_docu =$_POST['nro_doc'];
	$ape_nom = strtoupper($_POST['apellido'].','.$_POST['nombre']);
	$direccion = $_POST['direccion'];
	$fecha_nac = $_POST['fecha_nac'];
	$sexo = $_POST['mod_sexo'];
	//$ape_nom = strtoupper($ape_nom);

	try {


		//armamos el sql
		$sql = "UPDATE bedelia_db.persona SET nro_doc ='".$nro_docu."', ape_nom ='".$ape_nom."', direccion = '".$direccion."', fecha_nac = '".$fecha_nac."', sexo_id = ".$sexo.", tipo_doc_id =".$tipo_doc." WHERE persona.id =".$id_persona;
		
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		

		/*$stmt->bindParam(':persona', $id_persona);
		$stmt->bindParam(':numero', $nro_docu,PDO::PARAM_STR, 10);		
		$stmt->bindParam(':nombre', $ape_nom,PDO::PARAM_STR, 100);
		$stmt->bindParam(':dir', $direccion,PDO::PARAM_STR, 100);
		$stmt->bindParam(':fecha', $fecha_nac);
		$stmt->bindParam(':sexo', $sexo);
		$stmt->bindParam(':tipo', $id_tipo_doc);
*/

		$stmt->execute();

	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}


	header('Location:../../abm_menu.php');
