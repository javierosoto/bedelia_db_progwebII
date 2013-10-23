<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	$id_prof = isset($_POST['baja_id_profesor']) ? $_POST['baja_id_profesor'] : null;

	echo $id_prof." id_profesor <br>";

	/*
	 * damos de baja primero al profesor
	 * luego lo damos de baja a la persona
	 */
	try {

		//armamos el sql
		$sql ="DELETE FROM profesor WHERE persona_id = :id";

		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//especificamos 
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':id', $id_prof);

		$stmt->execute();

		//~ para debug del prepare stament

		$stmt->debugDumpParams();
		echo "<br>primer stament<br>";
		//~ sirve para testear una consulta sql
		print $stmt->errorCode();
		if (!$stmt) {
			echo "<br>PDO::errorInfo():<br>";
			print_r($dbh->errorInfo());
		}
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}


	/*
	 * damos de baja a la persona
	 */


	try {

		//armamos el sql
		$sql_pers = "DELETE FROM persona WHERE id = :id";

		
			
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql_pers);
		
		//especificamos 
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':id', $id_persona);

		$stmt->execute();
		
		$stmt->debugDumpParams();
		echo "<br>segundo stament<br>";
		//sirve para testear una consulta sql
		print $stmt->errorCode();
		if (!$stmt) {
			echo "<br>PDO::errorInfo():<br>";
			print_r($dbh->errorInfo());
		}
		
				
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}



	//header('Location:../../abm_menu.php');
