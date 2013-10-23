<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	
	$carrera = isset($_POST['alta_tipo_carrera']) ? strtoupper($_POST['alta_tipo_carrera']): null;

	try {

		

		//armamos el sql
		$sql = "INSERT INTO  carrera (id ,nombre_carrera)
				VALUES (NULL , :nom_carrera)";

		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//~ //especificamos 
		//~ $stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':nom_carrera', $carrera);

		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	echo $_GET['ventana'];

	//~ if ($_GET['ventana'] != 'true')
		//~ header('Location:../../abm_menu.php');
	//~ else
		//~ echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
