<?php
	/*
	 * controlador de la aplicacion
	 */

	switch ($_SERVER[REQUEST_METHOD]) {
		case 'POST':
			echo "i es igual a 0";
			break;
		case 'GET':
			$descr = isset($_GET['descr']) ? $_GET['descr'] : null;

			switch ($descr){

				case 'alta_persona':
					require ('')
					break;

				case 'baja_persona':

					break;

				case 'mod_persona':

					break;

				case 'listado_persona':

					break;

				case 'listado_profesor':

					break;

				case 'listado_alumnos':

					break;
				 }

			break;
			
		default :
			require ('');
			break;
	}
