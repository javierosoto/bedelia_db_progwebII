<?php
	/*
	 * controlador de la aplicacion
	 */

	switch ($_SERVER[REQUEST_METHOD]) {
		
		case 'POST':
				
			$descrip_post = isset($_POST['desc_post']) ? $_POST['desc_post'] : null;
			echo $descrip_post."<br>";
			switch ($descrip_post){

				case 'alta_pers':
					echo dirname(__FILE__)."POST";
					require ("../model/funcion_sql/altas/alta_persona_sql.php");
					break;
			}
		case 'GET':
			$descr = isset($_GET['descr']) ? $_GET['descr'] : null;

			switch ($descr){

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

				case 'salir':
					//~ require dirname(__FILE__).('/../view/abm_menu.php');
					require dirname(__FILE__).('../view/abm_menu.php');
					break;
				 }

			break;
			
		default :
			require ('');
			break;
	}
