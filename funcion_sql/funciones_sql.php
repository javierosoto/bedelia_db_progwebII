<?php

	require_once '../error.php';

	/*
	 * esta funcion le pasamos el nombre de una tabla
	 * y nos traera todos los datos de la tabla
	 * SELECT * FROM $tabla
	 */
	function sql_tabla_todo($con,$tabla){

		try {

			//armamos el sql
			$sql = "SELECT * FROM ".$tabla;
			
			//preparamos un statement con el sql anterior
			$stmt = $con->prepare($sql);
			
			//especificamos 
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			$stmt->execute();
			
			$results = $stmt->fetchAll();

			
			
		} catch (Exception $e) {
			echo 'Error de conexion a la DB:'.$e->getMassage();
			die();
			
		}

		return $results;

	}

	/*
	 * esta funcion le pasamos la tabla materias y carreras
	 * todas las materias que pertenecen a una carrera
	 *
	 * SELECT * FROM materia AS ma, carrera AS ca WHERE ca.carrera_id = ca.id
	 */
	function sql_tabla_materias_carrera($con){

		try {

			//armamos el sql
			$sql = "SELECT
						ma.id AS id_ma, ma.nombre_materia, ma.fecha_inicio_cursada, ma.fecha_fin_cursada,
						ma.carrera_id, ca.id AS id_ca, ca.nombre_carrera
					FROM
						materia AS ma, carrera AS ca
					WHERE
						ma.carrera_id = ca.id;";
			
			//preparamos un statement con el sql anterior
			$stmt = $con->prepare($sql);
			
			//especificamos 
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			$stmt->execute();
			
			$results = $stmt->fetchAll();

			
			
		} catch (Exception $e) {
			echo 'Error de conexion a la DB:'.$e->getMassage();
			die();
			
		}

		return $results;

	}


		//************ SQL COMISION ************
		/*
		 * esta funcion le pasamos la tabla materias y carreras
		 * todas las materias que pertenecen a una carrera
		 *
		 * 
		 */
	function sql_comision($con){

		try {

			//armamos el sql
			$sql = "SELECT
						pe.id AS id_pe, pe.ape_nom,
						pr.id AS id_pr,
						co.id AS id_co, co.descripcion_comision, co.materia_id, co.profesor_id,
						ma.id AS id_ma, ma.nombre_materia,
						ca.id AS id_ca, ca.nombre_carrera,
						au.id AS id_au, au.descripcion_aula
					FROM
						persona As pe, profesor AS pr, comision AS co, materia AS ma, carrera AS ca, aula AS au
					WHERE
						co.profesor_id = pr.id and
						pr.persona_id = pe.id and
						co.materia_id = ma.id and
						ma.carrera_id = ca.id and
						co.aula_id = au.id";
			
			//preparamos un statement con el sql anterior
			$stmt = $con->prepare($sql);
			
			//especificamos 
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			$stmt->execute();
			
			$results = $stmt->fetchAll();
			
			
		} catch (Exception $e) {
			echo 'Error de conexion a la DB:'.$e->getMassage();
			die();
			
		}

		return $results;

	}


/*
 * esta funcion me devuelve quienes son los profesores 
 */
	function sql_profesores($con){

		try {

			//armamos el sql
			$sql = "SELECT p.id, p.tipo_doc_id, p.nro_doc, p.ape_nom, pr.id as prof_id
					FROM persona AS p, profesor AS pr
					WHERE pr.persona_id = p.id GROUP BY p.tipo_doc_id, p.nro_doc";

			
			//preparamos un statement con el sql anterior
			$stmt = $con->prepare($sql);
			
			//especificamos 
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			$stmt->execute();
			
			$results = $stmt->fetchAll();

		
		} catch (Exception $e) {
			echo 'Error de conexion a la DB:'.$e->getMassage();
			die();
			
		}

		return $results;

	}

/*
 * esta funcion me devuelve los profesores 
 */
	function sql_profesores_listado($con){

		try {

			//armamos el sql
			$sql = "SELECT p.id, p.tipo_doc_id, p.nro_doc, p.ape_nom, pr.id as prof_id
					FROM persona AS p, profesor AS pr, comision AS co
					WHERE pr.persona_id = p.id GROUP BY p.nro_doc";

			
			//preparamos un statement con el sql anterior
			$stmt = $con->prepare($sql);
			
			//especificamos 
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			$stmt->execute();
			
			$results = $stmt->fetchAll();

		
		} catch (Exception $e) {
			echo 'Error de conexion a la DB:'.$e->getMassage();
			die();
			
		}

		return $results;

	}


/*
 * funcion que busca a la persona por el nombre
 */

function sql_persona_ape_nom($con,$tabla,$el_ape_nom){

		try {

			//armamos el sql
			$sql = "SELECT * FROM ".$tabla." WHERE id = :id";
			
			
			//preparamos un statement con el sql anterior
			$stmt = $con->prepare($sql);
			
			//especificamos 
			$stmt->setFetchMode(PDO::FETCH_ASSOC);

			$stmt->bindParam(':id', $el_ape_nom);
			
			$stmt->execute();
			
			$results = $stmt->fetchAll();
			

			
		
		} catch (Exception $e) {
			echo 'Error de conexion a la DB:'.$e->getMassage();
			die();
			
		}

		return $results;

	}

/*
 * funcion que busca a la persona por el nombre
 */

function sql_persona_dni($con,$tabla,$el_nro_doc){

		try {

			//armamos el sql
			$sql = "SELECT * FROM ".$tabla." WHERE nro_doc = :nro_doc";
			
			
			//preparamos un statement con el sql anterior
			$stmt = $con->prepare($sql);
			
			//especificamos 
			$stmt->setFetchMode(PDO::FETCH_ASSOC);

			$stmt->bindParam(':nro_doc', $el_nro_doc);
			
			$stmt->execute();
			
			$results = $stmt->fetchAll();
			

			
		
		} catch (Exception $e) {
			echo 'Error de conexion a la DB:'.$e->getMassage();
			die();
			
		}

		return $results;

	}

	/*
 * esta funcion me devuelve quienes son los profesores 
 */
	function sql_alumno($con){

		try {

			//armamos el sql
			$sql = "SELECT
						p.id, p.nro_doc, p.ape_nom, p.tipo_doc_id, al.persona_id
					FROM
						persona AS p, alumno AS al
					WHERE
						p.id = al.persona_id;";

			
			//preparamos un statement con el sql anterior
			$stmt = $con->prepare($sql);
			
			//especificamos 
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			$stmt->execute();
			
			$results = $stmt->fetchAll();
		
		} catch (Exception $e) {
			echo 'Error de conexion a la DB:'.$e->getMassage();
			die();
			
		}

		return $results;

	}




?>
