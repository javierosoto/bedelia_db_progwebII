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
	$id_estado = isset($_POST['mod_estado']) ? $_POST['mod_estado'] : null; //estado del alumno
	$id_carrera= isset($_POST['mod_carrera']) ? $_POST['mod_carrera'] :null; //carrera de alumno
	$id_cargo = isset($_POST['mod_cargo']) ? $_POST['mod_cargo'] :null; //cargo del profesor

	//~ echo $id_persona." id-persona<br>";
	//~ echo $tipo_doc." tipo documento<br>";
	//~ echo $nro_docu." nro documento<br>";
	//~ echo $ape_nom." <br>";
	//~ echo $direccion." direccion<br>";
	//~ echo $fecha_nac." fecha nacimiento<br>";
	//~ echo $sexo." sexo<br>";
	//~ echo $id_estado." estado alumno<br>";
	//~ echo $id_carrera." carrera alumno<br>";
	//~ echo $id_cargo." id cargo profesor<br>";

	
	try {


		//armamos el sql
		$sql = "UPDATE persona SET nro_doc ='".$nro_docu."', ape_nom ='".$ape_nom."', direccion = '".$direccion."', fecha_nac = '".$fecha_nac."', sexo_id = ".$sexo.", tipo_doc_id =".$tipo_doc." WHERE persona.id =".$id_persona;
		
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
/*
		$stmt->bindParam(':persona', $id_persona);
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

	if ($id_estado != null)
	{
		/*
		 * update los datos del alumno de la tabla alumno
		 */
		try{
	
			$sql_alum = "UPDATE alumno SET estado_alumno = :id WHERE persona_id = :id_pers";

			//preparamos un statement con el sql anterior
			$stmt = $con->prepare($sql_alum);

			$stmt->bindParam(':id', $id_estado);
			$stmt->bindParam(':id_pers', $id_persona);

			$stmt->execute();

			}catch (Exception $e){
				echo 'Error de conexion a la DB:'.$e->getMessage();
				die();
			}


		/*
		 * consulta para saber el id del alumno para modificar los datos
		 * de la tabla carrera_has_alumno
		 */
	
		try{
			
			$sql_id_al = "SELECT id AS id_al  FROM alumno WHERE persona_id = :id_pe;";

			$stmt = $con->prepare($sql_id_al);

			//especificamos 
			$stmt->setFetchMode(PDO::FETCH_ASSOC);

			$stmt->bindParam(':id_pe', $id_persona);
			
			$stmt->execute();
			
			$result = $stmt->fetch();

			$stmt->execute();


			}catch (Exception $e){
				echo 'Error de conexion a la DB:'.$e->getMessage();
				die();
			}


		var_dump($result);
		
		$id_alumno = $result['id_al'];

		//consulta para update datos del alumno
		try{
			
			$sql_alum_cha = "UPDATE carrera_has_alumno SET carrera_id = :id_ca WHERE alumno_id = :id_al;";

			$stmt = $con->prepare($sql_alum_cha);


			$stmt->bindParam(':id_ca', $id_carrera);
			$stmt->bindParam(':id_al', $id_alumno);

			$stmt->execute();


			}catch (Exception $e){
				echo 'Error de conexion a la DB:'.$e->getMessage();
				die();
			}
	}

	/*
	 * modifica cargo del profesor
	 */
	if ($id_cargo != null)
	{

		try{
			
			$sql_prof = "UPDATE profesor SET cargo_id = :id_ca WHERE persona_id = :id_per;";

			$stmt = $con->prepare($sql_prof);

			$stmt->bindParam(':id_ca', $id_cargo);
			$stmt->bindParam(':id_per', $id_persona);

			$stmt->execute();


			}catch (Exception $e){
				echo 'Error de conexion a la DB:'.$e->getMessage();
				die();
			}
	}	


	header('Location:../../abm_menu.php');
