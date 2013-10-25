<!DOCTYPE html>
<html>
	<head>
		<title>Alta Cargo</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<link href="../view/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../view/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="../view/bootstrap/css/personal.css" rel="stylesheet">
	</head>

	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<form  name="alta_cargo_form" action="../controler/controler.php" method="post" >
						<fieldset>
							<legend>Alta cargo</legend>
							<label>Tipo de cargo </label>
							<input type="hidden" name="desc_post" value="alta_cargo"/>
							<input type="text" name="alta_cargo" placeholder="Ingrese tipo cargo" />
							<br>
							
							<input type="button" value="Cancelar" onclick="location.href='../abm_menu.php';"/>
							<input type="submit" value="Guardar"/>
						</fieldset>
					</form>
				</div>
			</div>
		</div>


		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../view/bootstrap/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../view/bootstrap/js/bootstrap.min.js"></script>

</html>
