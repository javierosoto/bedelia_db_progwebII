<?php

	require_once dirname(__FILE__).'/../../error.php';

/*
 * funcion que devuelve los datos del tipo de carrera a modificar
 */
function sql_tipo_carrera_mod($con, $id_tpca)
{	

	try{
	$sql = "SELECT id, nombre_carrera FROM carrera WHERE id = :id_carrera";
			
			$stmt = $con->prepare($sql);
			
			$stmt->bindParam(':id_carrera', $_POST['mod_id_carrera']);
			
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			$stmt->execute();
			
			$result = $stmt->fetch();
	}catch (Exception $e){
		echo "error".$e->getMessage();	
		die();
	}

	return $result;
}


/*
 * funcion que devuelve los datos a modificar el sexo
 */
function sql_sexo_modifica($con, $id_sexo)
{
	try{
		$sql = "SELECT id, descripcion_sexo FROM sexo WHERE id = :id_sexo";
		
		$stmt = $con->prepare($sql);
		
		$stmt->bindParam(':id_sexo', $_POST['mod_id_sexo']);
		
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		$stmt->execute();
		
		$result = $stmt->fetch();
	}catch (Exception $e){
		echo "error".$e->getMessage();
	}

}



/*
 * funcion que devuelve los datos de la materia a modificar
 */
 function sql_materia_modificar($con, $id_materia)
 {
	 try{
		 
	
			$sql = "SELECT
						ma.id AS id_ma, nombre_materia, fecha_inicio_cursada,
						fecha_fin_cursada, carrera_id , ca.nombre_carrera
					FROM
						materia AS ma , carrera AS ca
					WHERE
						ma.id = :carrera and
						carrera_id = ca.id";
			
			$stmt = $con->prepare($sql);
			
			$stmt->setFetchMode(PDO::FETCH_ASSOC);

			$stmt->bindParam(':carrera', $id_materia);

			$stmt->execute();
			
			$result = $stmt->fetch();
		}catch (Exception $e){
			echo "error".$e->getMessage();
			die();
		}
	return $result;
}



/*
 * funcion que devuelve es estado_alumno a modificar
 */
function sql_estado_alumno_mod ($con, $id_est_alu)
{	

	try
	{
		
		$sql = "SELECT id, descripcion FROM estado_alumno WHERE id = :id_est_alumno";
				
		$stmt = $con->prepare($sql);
		
		$stmt->bindParam(':id_est_alumno', $_POST['mod_id_estado_alumno']);
		
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		$stmt->execute();
		
		$result = $stmt->fetch();
	}catch (Exception $e){
		echo "error".$e->getMessage();
	}

	return $result;

}




/*
 * sql para traer los datos de la comision
 */

function sql_comision_mod ($con,$id_co){

		try
		{
			
			$sql = "SELECT
						co.id AS id_co, co.descripcion_comision, co.materia_id, co.aula_id, co.profesor_id,
						au.id AS id_au, au.descripcion_aula,
						ma.id AS id_ma, ma.nombre_materia, ma.fecha_inicio_cursada, ma.fecha_fin_cursada, ma.carrera_id,
						ca.id AS id_ca, ca.nombre_carrera,
						pr.id AS id_pr,
						pe.id AS id_pe, pe.ape_nom
					FROM
						persona AS pe,
						carrera AS ca,
						materia AS ma,
						aula AS au,
						comision AS co,
						profesor AS pr
					WHERE
						pe.id = pr.persona_id and
						pr.id = co.profesor_id and
						co.materia_id = ma.id and
						ma.carrera_id = ca.id and
						co.aula_id = au.id and
						co.id = :id_co";

								
					$stmt = $con->prepare($sql);
					
					$stmt->bindParam(':id_co', $id_co);
					
					$stmt->setFetchMode(PDO::FETCH_ASSOC);
					
					$stmt->execute();
					
					$result = $stmt->fetch();
					
			} catch (Exception $e){
				echo "Error".$e->expMessage();
				die ();
				}
				
		return $result;
}

/*
 * funcion que devuelve el cargo a modificar
 */
function sql_cargo_modificar($con, $id_cargo)
{
	try{

		$sql = "SELECT id, descripcion_cargo FROM cargo WHERE id = :id_cargo";
		
		$stmt = $con->prepare($sql);
		
		$stmt->bindParam(':id_cargo', $_POST['mod_id_cargo']);
		
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		$stmt->execute();
		
		$result = $stmt->fetch();

	}catch (Exception $e){
		echo "Error ".$e->getMessage();
		die();

	}

	return $result;
}



/*
 * funcion que me devuelve el datos del aula a modificar
 */
function sql_aulas_mod ($con, $id_aula)
{
	try{

		$sql = "SELECT id, descripcion_aula FROM aula WHERE id = :id_au;";
				
		$stmt = $con->prepare($sql);
		
		$stmt->bindParam(':id_au', $id_aula);
		
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		$stmt->execute();
		
		$result = $stmt->fetch();


	}catch (Exception $e){
		echo "Error ".$e->getMessage();
		die();

	}

	return $result;
}

/*
 * sql a la tabla tipo_docuemento para ser usada en la modificacion
 * de tipo documento
 */
function sql_tipo_doc($con)
{

	try
	{
		$sql = "SELECT id, descripcion FROM tipo_doc WHERE id = :id_dni";
			
		$stmt = $con->prepare($sql);
		
		$stmt->bindParam(':id_dni', $_POST['mod_id_tipo_dni']);
		
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		$stmt->execute();
		
		$result = $stmt->fetch();
	}catch (Exception $e){
		echo 'Error de conexion a la base de datos'.$e->getMessage();
	}

	return $result;
}


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
			echo 'Error de conexion a la DB:'.$e->getMessage();
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
			echo 'Error de conexion a la DB:'.$e->getMessage();
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
			echo 'Error de conexion a la DB:'.$e->getMessage();
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
			$sql = "SELECT
						p.id, p.tipo_doc_id, p.nro_doc, p.ape_nom, p.sexo_id,
						pr.id as prof_id, pr.cargo_id,
						tp.descripcion,
						ca.id AS id_ca, ca.descripcion_cargo
					FROM
						persona AS p,
						profesor AS pr,
						tipo_doc AS tp,
						cargo AS ca
						
					WHERE
						pr.persona_id = p.id GROUP BY p.tipo_doc_id, p.nro_doc";

			
			//preparamos un statement con el sql anterior
			$stmt = $con->prepare($sql);
			
			//especificamos 
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			$stmt->execute();
			
			$results = $stmt->fetchAll();

		
		} catch (Exception $e) {
			echo 'Error de conexion a la DB:'.$e->getMessage();
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
			echo 'Error de conexion a la DB:'.$e->getMessage();
			die();
			
		}

		return $results;

	}


/*
 * esta funcion me devuelve las personas
 */
	function sql_personas_listado($con){

		try {

			//armamos el sql
			$sql = "SELECT
						p.id, td.descripcion, p.nro_doc, p.ape_nom, p.direccion, se.descripcion_sexo
					FROM
						persona AS p,
						tipo_doc AS td, 
						sexo AS se
					WHERE
						p.sexo_id = se.id and
						p.tipo_doc_id = td.id GROUP BY p.nro_doc, td.descripcion ORDER BY p.ape_nom";

			
			//preparamos un statement con el sql anterior
			$stmt = $con->prepare($sql);
			
			//especificamos 
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			$stmt->execute();
			
			$results = $stmt->fetchAll();

		
		} catch (Exception $e) {
			echo 'Error de conexion a la DB:'.$e->getMessage();
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
			echo 'Error de conexion a la DB:'.$e->getMessage();
			die();
			
		}

		return $results;

	}

/*
 * funcion que busca a la persona por el tipo y numero de documento
 */

function sql_persona_dni($con,$tabla,$el_nro_doc, $el_tipo_doc){

		try {

			//armamos el sql
			$sql = "SELECT * FROM ".$tabla." WHERE nro_doc = :nro_doc AND tipo_doc_id = :td";
			
			
			//preparamos un statement con el sql anterior
			$stmt = $con->prepare($sql);
			
			//especificamos 
			$stmt->setFetchMode(PDO::FETCH_ASSOC);

			$stmt->bindParam(':nro_doc', $el_nro_doc);
			$stmt->bindParam(':td', $el_tipo_doc);
			
			$stmt->execute();
			
			$results = $stmt->fetch();
		
		} catch (Exception $e) {
			echo 'Error de conexion a la DB:'.$e->getMessage();
			die();
			
		}

		return $results;

	}

/*
 * funcion que trae los datos de una persona por medio del id
 */
function sql_persona_completo ($con,$id_pers)
{
	try{

		$sql="SELECT
					p.id AS id_pe, p.nro_doc, p.ape_nom, p.direccion, p.fecha_nac, p.sexo_id, p.tipo_doc_id,
					td.id AS id_td, td.descripcion,
					se.id AS id_se, se.descripcion_sexo
				FROM
					persona AS p,
					tipo_doc AS td,
					sexo AS se
				WHERE
					p.id = :id AND
					p.tipo_doc_id = td.id AND
					p.sexo_id = se.id";
		
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//especificamos 
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':id', $id_pers);
				
		$stmt->execute();
		
		$results = $stmt->fetch();

		} catch (Exception $e) {
			echo 'Error de conexion a la DB:'.$e->getMessage();
			die();
			
		}

		return $results;








}



/*
 * funcion que busca si hay un profesor para cargar los datos
 * para modificarlo la busqueda se hace por el id de persona
 */
function sql_profesor_completo($con,$id_pers)
{
	try{

		$sql="SELECT
					pr.id AS id_pr, pr.cargo_id, pr.persona_id,
					ca.id AS id_ca, ca.descripcion_cargo
				FROM
					profesor AS pr,
					cargo AS ca
				WHERE
					pr.persona_id = :id AND
					ca.id = pr.cargo_id";
		
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//especificamos 
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':id', $id_pers);
				
		$stmt->execute();
		
		$results = $stmt->fetch();

		} catch (Exception $e) {
			echo 'Error de conexion a la DB:'.$e->getMessage();
			die();
			
		}

		return $results;
}


/*
 * funcion que busca si hay un alumno para cargar los datos
 * para modificarlo la busqueda se hace por el persona_id de la
 * tabla alumno cruzandola con el id de persona
 */
function sql_alumno_completo($con,$id_pers)
{
	try{

		$sql="SELECT
					al.id AS id_al, al.persona_id, al.estado_alumno_id,
					ea.id AS id_ea, ea.descripcion AS ea_descripcion,
					ca.id AS id_ca, ca.nombre_carrera
				FROM
					alumno AS al,
					estado_alumno AS ea,
					carrera AS ca,
					carrera_has_alumno AS cha
				WHERE
					al.persona_id = :id AND
					al.estado_alumno_id = ea.id AND
					al.id = cha.alumno_id AND
					ca.id = cha.carrera_id;";
		
		//preparamos un statement con el sql anterior
		$stmt = $con->prepare($sql);
		
		//especificamos 
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$stmt->bindParam(':id', $id_pers);
				
		$stmt->execute();
		
		$results = $stmt->fetch();

		} catch (Exception $e) {
			echo 'Error de conexion a la DB:'.$e->getMessage();
			die();
			
		}

		return $results;



}


/*
 * funcion que devuelve el id de alumno
 * para cargarlo en la tabla carrera_has_alumno
 */
function sql_alumno_id($con,$id_pers){

	try{
		$sql = "SELECT * FROM alumno WHERE persona_id = :id";

		$stmt = $con->prepare($sql);
		
		$stmt->bindParam(':id', $id_pers);

		$stmt->execute();

		$results = $stmt->fetch();

	}catch (Exception $e){
		echo 'Error de conexion a la DB:'.$e->getMessage();
		die();

	}

	return $results;


}

/*
 * esta funcion me devuelve quienes son los alumnos 
 */
	function sql_alumno_listado($con){

		try {

			//armamos el sql
			$sql = "SELECT
						p.id AS id_pe, p.nro_doc, p.ape_nom, p.direccion, p.sexo_id, p.tipo_doc_id,
						td.descripcion,
						se.descripcion_sexo, 
						ea.id AS id_ea, ea.descripcion AS descripcion_est_alum,
						ca.id AS id_ca, ca.nombre_carrera
					FROM 
						
						persona AS p,
						tipo_doc AS td,
						sexo AS se,
						alumno AS al,
						estado_alumno AS ea, 
						carrera_has_alumno AS cha, 
						carrera AS ca
					WHERE 
						p.id = al.persona_id AND
						p.tipo_doc_id = td.id AND
						p.sexo_id = se.id AND  
						al.estado_alumno_id = ea.id AND 
						al.id = cha.alumno_id AND 
						cha.carrera_id = ca.id";

			
			//preparamos un statement con el sql anterior
			$stmt = $con->prepare($sql);
			
			//especificamos 
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			$stmt->execute();
			
			$results = $stmt->fetchAll();
		
		} catch (Exception $e) {
			echo 'Error de conexion a la DB:'.$e->getMessage();
			die();
			
		}

		return $results;

	}




?>
