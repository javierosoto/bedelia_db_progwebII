<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();

	
	$id_co = isset($_POST['id_comision']) ? $_POST['id_comision'] : null;
	$des_com = isset($_POST['desc_com']) ? strtoupper($_POST['desc_com']) : null;
	$id_ma = isset($_POST['id_materia']) ? $_POST['id_materia'] : null;
	$id_au = isset($_POST['id_aula']) ? $_POST['id_aula'] : null;
	$id_pr = isset($_POST['id_profesor']) ? $_POST['id_profesor'] : null;

	try {
		//armamos el sql
		

		$sql = "UPDATE
					comision
				SET
					descripcion_comision = :comi,
					materia_id = :id_ma,
					aula_id = :id_au,
					profesor_id = :id_pr
				WHERE
					id = :id_co;";

		

		
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//especificamos
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':comi',$des_com );	//descripcion comision
		$stmt->bindParam(':id_ma', $id_ma);		//id_materia
		$stmt->bindParam(':id_au', $id_au);		//id_aula
		$stmt->bindParam(':id_pr', $id_pr);		//id del profesor
		$stmt->bindParam(':id_co', $id_co);		//id de la comision

		echo $sql;
		$stmt->execute();

	
	} catch (Exception $e) {
		echo 'Error '.$e->getMassage();
		die();
		
	}


	

	header('Location:../../abm_menu.php');
