<!DOCTYPE html>

<head>
	<title>Alta Estado Alumno</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.22" />
	<link href="../view/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../view/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="../view/bootstrap/css/personal.css" rel="stylesheet">
</head>

<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<form name="alta_tipo_estado_alumno_form" action="../controler/controler.php" method="post" >
					<fieldset>
						<legend>Alta condicion de alumno</legend>
					<label>Condicion de alumno </label>

					<input type="hidden" name="desc_post" value="alta_estado_alumno" />
					<input type="text" name="alta_tipo_estado_form" placeholder="Ingrese tipo de estador alumno" pattern="\w+" title="Solo letras" />
					<br>

					<input type="button" value="Cancelar" onclick="location.href='../index.php';"/>
					
					<input type="submit" value="Guardar" />
					

					</fieldset>
				</form>
			</div>
		</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../view/bootstrap/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../view/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
