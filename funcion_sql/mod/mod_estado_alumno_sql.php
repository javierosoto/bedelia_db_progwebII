<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	
	$id_estado_alumno= $_POST['mod_estado_alumno'];

	$estado_alumno = strtoupper($_POST['desc_estado_alumno']);

echo "id - ".$id_estado_alumno." nombre:".$estado_alumno;
	
	try {


		//armamos el sql
		$sql = "UPDATE bedelia_db.estado_alumno SET descripcion = :texto WHERE estado_alumno.id = :id";
		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
	

		$stmt->bindParam(':id', $id_estado_alumno);
		$stmt->bindParam(':texto', $estado_alumno);



		$stmt->execute();
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	echo "<h1>registro modificado corectamente :)</h1>";
	
	
	//header('Location:../../abm/abm_estado_alumno.php');
