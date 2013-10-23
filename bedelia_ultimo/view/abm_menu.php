<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>ABM menu</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">
    <link href="../controler/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

</head>

<body>
	<nav class="navbar navbar-default" role="navigation">
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Persona <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="altas_form/alta_persona_form.php?descr=alta_persona">Alta</a></li>
					<li><a href="bajas_form/baja_persona_form.php?descr=baja_persona">Baja</a></li>
					<li><a href="mod_form/mod_persona_form.php?descr=mod_persona">Modifica</a></li>
					<li><a href="list_form/list_personas.php?descr=listado_persona">Listado personas</a></li>
					<li><a href="list_form/list_profesor.php?descr=listado_profesor">Listado profesor</a></li>
					<li><a href="list_form/list_alumnos.php?descr=listado_alumnos">Listado alumnos</a></li>
				</ul>
			</li>
		</ul>
		
	<!--
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Profesor <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="altas_form/alta_profesor_form.php">Alta</a></li>
					<li><a href="bajas_form/baja_profesor_form.php">Baja</a></li>
					<li><a href="mod_form/mod_profesor_form.php">Modifica</a></li>
					<li><a href="list_form/list_profesor.php">Listado</a></li>
				</ul>
			</li>
		</ul>


		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Alumno <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="altas_form/alta_alumno_form.php">Alta</a></li>
					<li><a href="bajas_form/baja_alumno_form.php">Baja</a></li>
					<li><a href="mod_form/mod_alumno_form.php">Modifica</a></li>
				</ul>
			</li>
		</ul>
	-->
		
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Tipo Documento <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="altas_form/alta_tipo_doc_form.php">Alta</a></li>
					<li><a href="bajas_form/baja_tipo_doc_form.php">Baja</a></li>
					<li><a href="mod_form/mod_tipo_doc_form.php">Modifica</a></li>
				</ul>
			</li>
		</ul>


		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sexo <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="altas_form/alta_sexo_form.php">Alta</a></li>
					<li><a href="bajas_form/baja_sexo_form.php">Baja</a></li>
					<li><a href="mod_form/mod_sexo_form.php">Modifica</a></li>
				</ul>
			</li>
		</ul>
		
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Cargo <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="altas_form/alta_cargo_form.php">Alta</a></li>
					<li><a href="bajas_form/baja_cargo_form.php">Baja</a></li>
					<li><a href="mod_form/mod_cargo_form.php">Modifica</a></li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Carrera <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="altas_form/alta_tipo_carrera_form.php">Alta</a></li>
					<li><a href="bajas_form/baja_tipo_carrera_form.php">Baja</a></li>
					<li><a href="mod_form/mod_tipo_carrera_form.php">Modifica</a></li>
				</ul>
			</li>
		</ul>
		
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Estado Alumno <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="altas_form/alta_estado_alumno_form.php">Alta</a></li>
					<li><a href="bajas_form/baja_estado_alumno_form.php">Baja</a></li>
					<li><a href="mod_form/mod_estado_alumno_form.php">Modifica</a></li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Aula <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="altas_form/alta_aula_form.php">Alta</a></li>
					<li><a href="bajas_form/baja_aula_form.php">Baja</a></li>
					<li><a href="mod_form/mod_aula_form.php">Modifica</a></li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Materia <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="altas_form/alta_materia_form.php">Alta</a></li>
					<li><a href="bajas_form/baja_materia_form.php">Baja</a></li>
					<li><a href="mod_form/mod_materia_form.php">Modifica</a></li>
					<li><a href="list_form/list_materia.php">Listado</a></li>
				</ul>
			</li>
		</ul>


		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Comision<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="altas_form/alta_comision_form.php">Alta</a></li>
					<li><a href="bajas_form/baja_comision_form.php">Baja</a></li>
					<li><a href="mod_form/mod_comision_form.php">Modifica</a></li>
					<li><a href="list_form/list_comision.php">Listado</a></li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Elementos<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="altas_form/alta_elemento_form.php">Alta</a></li>
					<li><a href="bajas_form/baja_elemento_form.php">Baja</a></li>
					<li><a href="mod_form/mod_elemento_form.php">Modifica</a></li>
					<li><a href="list_form/list_elemento.php">Listado</a></li>
				</ul>
			</li>
		</ul>



	  
	</nav>




	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../controler/bootstrap/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../controler/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
