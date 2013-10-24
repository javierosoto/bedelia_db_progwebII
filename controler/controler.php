<?php
	/*
	 * controlador de la aplicacion
	 */
	switch ($_SERVER['REQUEST_METHOD']) {
		
		case 'POST':
				
			$descrip_post = isset($_POST['desc_post']) ? $_POST['desc_post'] : null;
			echo $descrip_post." valor de desc_post <br>";
			switch ($descrip_post){

				case 'alta_pers':
					echo dirname(__FILE__)."alta personas POST";
					require ("../model/funcion_sql/altas/alta_persona_sql.php");
					break;

				case 'baja_pers':
					echo dirname(__FILE__)." baja personas POST";
					require ("../model/funcion_sql/bajas/baja_persona_sql.php");
					break;
			}
		/*
		 * caso para cuando viene por GET
		 */
		case 'GET':
			$descr = isset($_GET['descr']) ? $_GET['descr'] : null;
			
			switch ($descr){


/*
 * la parte de la persona
 */
				case 'alta_persona':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/altas_form/alta_persona_form.php");
					break;

				case 'baja_persona':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/bajas_form/baja_persona_form.php");
					break;

				case 'mod_persona':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/mod_form/mod_persona_form.php");
					break;

				case 'listado_persona':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/list_form/list_personas.php");
					break;


				case 'listado_profesor':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/list_form/list_profesor.php");
					break;

				case 'listado_alumnos':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/list_form/list_alumnos.php");
					break;

/*
 * la parte tipo documento
 */
				case 'alta_tipo_doc':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/altas_form/alta_tipo_doc_form.php");
					break;

				case 'baja_tipo_doc':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/bajas_form/baja_tipo_doc_form.php");
					break;

				case 'mod_tipo_doc':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/mod_form/mod_tipo_doc_form.php");
					break;

/*
 * la parte del sexo
 */
				case 'alta_sexo':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/altas_form/alta_sexo_form.php");
					break;

				case 'baja_sexo':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/bajas_form/baja_sexo_form.php");
					break;

				case 'mod_sexo':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/mod_form/mod_sexo_form.php");
					break;

/*
 * la parte del cargo
 */
				case 'alta_cargo':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/altas_form/alta_cargo_form.php");
					break;

				case 'baja_cargo':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/bajas_form/baja_cargo_form.php");
					break;

				case 'mod_cargo':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/mod_form/mod_cargo_form.php");
					break;

/*
 * la parte del tipo de carrera
 */
				case 'alta_tipo_carrera':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/altas_form/alta_tipo_carrera_form.php");
					break;

				case 'baja_tipo_carrera':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/bajas_form/baja_tipo_carrera_form.php");
					break;

				case 'mod_tipo_carrera':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/mod_form/mod_tipo_carrera_form.php");
					break;

/*
 * la parte de estado de alumno 
 */
				case 'alta_estado_alumno':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/altas_form/alta_estado_alumno_form.php");
					break;

				case 'baja_estado_alumno':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/bajas_form/baja_estado_alumno_form.php");
					break;

				case 'mod_estado_alumno':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/mod_form/mod_estado_alumno_form.php");
					break;

/*
 * la parte del aula
 */
				case 'alta_aula':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/altas_form/alta_aula_form.php");
					break;


				case 'baja_aula':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/bajas_form/baja_aula_form.php");
					break;

				case 'mod_aula':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/mod_form/mod_aula_form.php");
					break;

/*
 * la parte de las materias
 */
				case 'alta_materia':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/altas_form/alta_materia_form.php");
					break;

				case 'baja_materia':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/bajas_form/baja_materia_form.php");
					break;

				case 'mod_materia':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/mod_form/mod_materia_form.php");
					break;
					
				case 'list_materia':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/list_form/list_materia_form.php");
					break;

/*
 * la parte de las comisiones
 */
				case 'alta_comision':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/altas_form/alta_comision_form.php");
					break;


				case 'baja_comision':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/bajas_form/baja_comision_form.php");
					break;

				case 'mod_comision':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/mod_form/mod_comision_form.php");
					break;
					
				case 'list_comision':
					echo dirname(__FILE__)."<br>";
					require dirname(__FILE__).("/../view/list_form/list_comision_form.php");
					break;

				case 'salir':
					//~ echo dirname(__FILE__)." salir <br>";
					header ('Location:../index.php');
					break;
				 }

			break;
			
		default :
			require ('');
			break;
	}
