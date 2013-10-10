<?php

	require_once '../../error.php';
	require_once '../conexion.php';
	
	$con = conectar();
	$tipo_doc = $_POST['tipo_doc_form'];
	$nro_doc = $_POST['nro_doc_form'];
	$ape_nom = strtoupper($_POST['apellido_form']).",".strtoupper($_POST['nombre_form']);
	$direccion = strtoupper($_POST['direccion_form']);
	$fecha_nac = $_POST['fecha_nac_form'];
	$sexo = $_POST['sexo_form'];
	$est_alumno = $_POST['est_alum_form'];
	$opt_carrera = isset($_POST['opt_carrera_form']) ? $_POST['opt_carrera_form'] : null; 


	/*
	 * damos de alta a la persona
	 */
	try {

		//armamos el sql
		$sql = "INSERT INTO
					persona (id, nro_doc, ape_nom, direccion, fecha_nac, sexo_id, tipo_doc_id)
				VALUES
							(NULL, :doc, :ape_nombre, :domicilio, :fecha_nacimiento, :sexo, :tp_doc);";




		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//especificamos 
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':doc', $nro_doc);
		$stmt->bindParam(':ape_nombre', $ape_nom);
		$stmt->bindParam(':domicilio', $direccion);
		$stmt->bindParam(':fecha_nacimiento', $fecha_nac);
		$stmt->bindParam(':sexo', $sexo);
		$stmt->bindParam(':tp_doc', $tipo_doc);


		$stmt->execute();
		
		
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	/*
	 * seleccionar a la persona y dar de alta al alumno
	 */
	 try
	 {
		$sql_pers ="SELECT
						id
					FROM
						persona
					WHERE
						tipo_doc_id = :tipo and
						nro_doc = :doc;";

		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql_pers);
		
		//especificamos 
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':tipo',$tipo_doc);
		$stmt->bindParam(':doc',$nro_doc);


		$stmt->execute();

		$results = $stmt->fetch();

		$id_pers = $results['id'];


	}catch (Exception $e){
		echo 'Error de conexion a la DB : '.$e->getMassage();
		die();

		}

	try
	{
		$sql_alum="INSERT INTO alumno (id, persona_id, estado_id)
					VALUES (NULL, :pers, :estado);";

		$stmt = $con->prepare($sql_alum);

		//especificamos 
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':pers', $id_pers);
		$stmt->bindParam(':estado',$opt_carrera);

		$stmt->execute();
	
		echo $sql_alum;
		echo $id_pers."<br>";
		echo $opt_carrera;

	}catch (Exception $e){
		echo 'Error de conexion a la DB : '.$e->getMassage();
		die();

		}
	
	header('Location:../../abm/abm_alumno.php');
