<?php

	require_once dirname(__FILE__).'/../../../error.php';
	require_once dirname(__FILE__).'/../conexion.php';
	require_once dirname(__FILE__).'/../funciones_sql.php';

	$con = conectar();

	/*
	 * variables que pertenecen a una persona
	 */
	$tipo_doc = isset($_POST['id_tipo_doc_form']) ? $_POST['id_tipo_doc_form'] : null;
	$nro_doc = isset($_POST['nro_doc_form']) ? $_POST['nro_doc_form'] : null;
	$ape = isset($_POST['apellido_form']) ? $_POST['apellido_form'] : null;
	$nom = isset($_POST['nombre_form']) ? $_POST['nombre_form']: null;
	$ape_nom = strtoupper($ape).",".strtoupper($nom);
	$direccion = isset($_POST['direccion_form']) ? strtoupper($_POST['direccion_form']): null;
	$fecha_nac = isset($_POST['fecha_nac_form']) ? $_POST['fecha_nac_form'] : null;
	$sexo = isset($_POST['sexo_form']) ? $_POST['sexo_form'] : null;

	/*
	 * variables que pertenecen a un alumno
	 */
	$id_est_alu = isset($_POST['id_estado_alumno']) ? $_POST['id_estado_alumno'] : null;
	$id_carr_alu = isset($_POST['id_carrera_alumno']) ? $_POST['id_carrera_alumno'] : null;

	/*
	 * variables que pertenecen a un profesor
	 */
	$id_cargo_pr = isset($_POST['id_cargo']) ? $_POST['id_cargo'] : null;
	
	try {

		//armamos el sql
		$sql = "INSERT INTO persona (nro_doc, ape_nom, direccion, fecha_nac, sexo_id, tipo_doc_id)
				VALUES ('".$nro_doc."','".$ape_nom."','".$direccion."','".$fecha_nac."',".$sexo.",".$tipo_doc.");";
				
		//~ $sql ="INSERT INTO persona (nro_doc, ape_nom, direccion, fecha_nac, sexo_id, tipo_doc_id)
					//~ VALUES
						//~ (:doc,:nombre,:domicilio,:fecha,:sexo,:tp_doc);";
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//~ //especificamos 
		//~ $stmt->setFetchMode(PDO::FETCH_ASSOC);
//~ 
		//~ $stmt->bindParam(':doc', $nro_doc, PDO::PARAM_STR, 10);
		//~ $stmt->bindParam(':nombre', $ape_mon,  PDO::PARAM_STR, 100);
		//~ $stmt->bindParam(':domicilio', $direccion,  PDO::PARAM_STR, 100);
		//~ $stmt->bindParam(':fecha', $fecha_nac );
		//~ $stmt->bindParam(':sexo', $sexo, PDO::PARAM_INT);
		//~ $stmt->bindParam(':tp_doc', $tipo_doc, PDO::PARAM_INT);

		$stmt->execute();
		//~ $stmt = null;

		
	
	} catch (Exception $e) {
		echo 'Error de conexion a la DB:'.$e->getMassage();
		die();
		
	}

	/*
	 * para insertar un alumno
	 */

	if ($id_est_alu != null)
	{
		/*
		 * inserto registro en la tabla
		 * alumnos
		 */
		try{
			
			$result_pers = sql_persona_dni($con,"persona",$nro_doc, $tipo_doc);
			
			$id_pers_ins = $result_pers['id'];

			$sql_ins_alum = "INSERT INTO alumno (persona_id, estado_alumno_id) VALUES (:per,:estado);";

			//preparamos un statement con el sql anterior
			$stmt_alum = $con->prepare($sql_ins_alum);

			$stmt_alum->bindParam(':per', $id_pers_ins);
			$stmt_alum->bindParam(':estado', $id_est_alu);


			$stmt_alum->execute();


			
			}catch (Exception $e){
				echo 'Error de conexion a la DB:'.$e->getMassage();
				die();
		}


		/*
		 * inserto registro en la tabla
		 * carrera_has_alumno
		 */

		try{
			
			$id_alumno = sql_alumno_id($con,$id_pers_ins);
			$id_est_alu = $id_alumno['id'];
			var_dump($id_alumno);
			$sql_carr_alum = "INSERT INTO carrera_has_alumno (carrera_id, alumno_id) VALUES (:carrera,:alumno);";

			//preparamos un statement con el sql anterior
			$stmt_alum = $con->prepare($sql_carr_alum);

			$stmt_alum->bindParam(':carrera', $id_carr_alu);
			$stmt_alum->bindParam(':alumno', $id_est_alu);


			$stmt_alum->execute();
			}catch (Exception $e){
				echo 'Error de conexion a la DB:'.$e->getMassage();
				die();
		}
		
		
	}

	/*
	 * para insertar un profesor
	 */

	if ($id_cargo_pr != null)
		{
			/*
			 * inserto registro en la tabla
			 * alumnos
			 */
			try{
				
				$result_prof = sql_persona_dni($con,"persona",$nro_doc, $tipo_doc);
				var_dump ($result_prof);
				
				$id_pers_ins = $result_prof['id'];

				$sql_ins_prof = "INSERT INTO profesor (cargo_id, persona_id) VALUES (:cargo,:pers);";

				//preparamos un statement con el sql anterior
				$stmt_prof = $con->prepare($sql_ins_prof);

				$stmt_prof->bindParam(':cargo', $id_cargo_pr);
				$stmt_prof->bindParam(':pers', $id_pers_ins);
				


				$stmt_prof->execute();


				
				}catch (Exception $e){
					echo 'Error de conexion a la DB:'.$e->getMassage();
					die();
			}

	}
	unset ($_GET['descr']);
	//~ header ("Location:".dirname(__FILE__)."controler.php?descr=salir");
	header ("Location:controler.php?descr=salir");
	exit;
