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
 * esta funcion me devuelve quienes son los profesores 
 */
	function sql_profesores($con){

		try {

			//armamos el sql
			$sql = "SELECT p.id, p.tipo_doc_id, p.nro_doc, p.ape_nom, pr.id as prof_id
					FROM persona AS p, profesor AS pr, comision AS co
					WHERE co.profesor_id = pr.id AND pr.persona_id = p.id GROUP BY p.nro_doc";

			
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
			$sql = "SELECT pr.id, td.descripcion AS tipo_doc, p.nro_doc, p.ape_nom, p.direccion, p.fecha_nac, s.descripcion_sexo AS sexo
					FROM persona AS p, tipo_doc AS td, sexo AS s, profesor AS pr, alumno AS a
					WHERE p.tipo_doc_id = td.id
					AND p.sexo_id = s.id
					AND a.id = p.id
					GROUP BY td.descripcion, p.nro_doc";

			
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
