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
    <link href="../view/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

</head>

<body>
	<nav class="navbar navbar-default" role="navigation">
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Persona <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="../controler/controler.php?descr=alta_persona">Alta</a></li>
					<li><a href="../controler/controler.php?descr=baja_persona">Baja</a></li>
					<li><a href="../controler/controler.php?descr=mod_persona">Modifica</a></li>
					<li><a href="../controler/controler.php?descr=listado_persona">Listado personas</a></li>
					<li><a href="../controler/controler.php?descr=listado_profesor">Listado profesor</a></li>
					<li><a href="../controler/controler.php?descr=listado_alumnos">Listado alumnos</a></li>
				</ul>
			</li>
		</ul>
	
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Tipo Documento <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="../controler/controler.php?descr=alta_tipo_doc">Alta</a></li>
					<li><a href="../controler/controler.php?descr=baja_tipo_doc">Baja</a></li>
					<li><a href="../controler/controler.php?descr=mod_tipo_doc">Modifica</a></li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sexo <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="../controler/controler.php?descr=alta_sexo">Alta</a></li>
					<li><a href="../controler/controler.php?descr=baja_sexo">Baja</a></li>
					<li><a href="../controler/controler.php?descr=mod_sexo">Modifica</a></li>
				</ul>
			</li>
		</ul>
		
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Cargo <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="../controler/controler.php?descr=alta_cargo">Alta</a></li>
					<li><a href="../controler/controler.php?descr=baja_cargo">Baja</a></li>
					<li><a href="../controler/controler.php?descr=mod_cargo">Modifica</a></li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Carrera <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="../controler/controler.php?descr=alta_tipo_carrera">Alta</a></li>
					<li><a href="../controler/controler.php?descr=baja_tipo_carrera">Baja</a></li>
					<li><a href="../controler/controler.php?descr=mod_tipo_carrera">Modifica</a></li>
				</ul>
			</li>
		</ul>
		
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Estado Alumno <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="../controler/controler.php?descr=alta_estado_alumno">Alta</a></li>
					<li><a href="../controler/controler.php?descr=baja_estado_alumno">Baja</a></li>
					<li><a href="../controler/controler.php?descr=mod_estado_alumno">Modifica</a></li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Aula <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="../controler/controler.php?descr=alta_aula">Alta</a></li>
					<li><a href="../controler/controler.php?descr=baja_aula">Baja</a></li>
					<li><a href="../controler/controler.php?descr=mod_aula">Modifica</a></li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Materia <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="../controler/controler.php?descr=alta_materia">Alta</a></li>
					<li><a href="../controler/controler.php?descr=baja_materia">Baja</a></li>
					<li><a href="../controler/controler.php?descr=mod_materia">Modifica</a></li>
					<li><a href="../controler/controler.php?descr=list_materia">Listado</a></li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Comision<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="../controler/controler.php?descr=alta_comision">Alta</a></li>
					<li><a href="../controler/controler.php?descr=baja_comision">Baja</a></li>
					<li><a href="../controler/controler.php?descr=mod_comision">Modifica</a></li>
					<li><a href="../controler/controler.php?descr=list_comision">Listado</a></li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Elementos<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="../controler/controler.php?descr=alta_elemento">Alta</a></li>
					<li><a href="../controler/controler.php?descr=baja_elemento">Baja</a></li>
					<li><a href="../controler/controler.php?descr=mod_elemento">Modifica</a></li>
					<li><a href="../controler/controler.php?descr=list_elemento">Listado</a></li>
				</ul>
			</li>
		</ul>



	  
	</nav>




	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../view/bootstrap/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../view/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
