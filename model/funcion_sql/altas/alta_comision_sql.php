<?php

	require_once dirname(__FILE__).'/../../../error.php';
	require_once dirname(__FILE__).'/../conexion.php';
	require_once dirname(__FILE__).'/../funciones_sql.php';
	
	$con = conectar();
	$comision = isset($_POST['alta_comision_materia']) ? $_POST['alta_comision_materia'] : null ;
	$comision = strtoupper($comision);
	$id_materia = isset($_POST['opt_materia']) ? $_POST['opt_materia'] : null;
	$id_aula = isset($_POST['opt_aula'])  ? $_POST['opt_aula'] : 1;
	$id_profesor = isset($_POST['opt_profesor']) ? $_POST['opt_profesor'] : null;

	echo "<br>".$comision." comision<br>".$id_materia."id materia<br>".$id_aula."id aula<br>".$id_profesor." id profesor <br>";

	try {

		//armamos el sql
		$sql = "INSERT INTO comision (descripcion_comision, materia_id, aula_id, profesor_id)
				VALUES (:mat, :id_mat, :id_aula, :id_prof)";
				//VALUES ('".$nro_doc."','".$ape_nom."','".$direccion."','".$fecha_nac."',".$sexo.",".$tipo_doc.");";

		echo $sql;

		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//~ //especificamos 
		//~ $stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':mat', $comision);
		$stmt->bindParam(':id_mat', $id_materia);
		$stmt->bindParam(':id_aula', $id_aula);
		$stmt->bindParam(':id_prof', $id_profesor);
		

		$stmt->execute();
		
		
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	//~ unset ($_GET['descr']);
	//~ header ("Location:".dirname(__FILE__)."controler.php?descr=salir");
	//~ header ("Location:controler.php?descr=salir");
	//~ exit;
