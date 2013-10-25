<!DOCTYPE html>
<html>
	<head>
		<title>Alta Tipo Carrera</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="../view/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../view/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="../view/bootstrap/css/personal.css" rel="stylesheet">
	</head>

	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<form  name="alta_tipo_carrera_form" action="../controler/controler.php" method="post" >
						<fieldset>
							<legend>Alta carrera</legend>
								<input type="hidden" name="desc_post" value="alta_carrera">
								<label>Carrera</label>
								
								<input type="text" name="alta_tipo_carrera" placeholder="Ingrese tipo carrera" />
								<br>

								<input type="button" value="Cancelar" onclick="location.href='../abm_menu.php';"/>
								
								<input type="submit" value="Guardar" />
						</fieldset>
					</form>
				</div>
			</div>
		</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="../view/bootstrap/js/jquery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../view/controler/bootstrap/js/bootstrap.min.js"></script>

		
	</body>

</html>
