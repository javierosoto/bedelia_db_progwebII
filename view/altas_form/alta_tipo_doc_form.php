<!DOCTYPE html>
<html>
	<head>
		<title>Alta tipo documento</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="generator" content="Geany 1.22" />

		<link href="../view/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../view/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="../view/bootstrap/css/personal.css" rel="stylesheet">

		
	</head>

	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span6">
					<form name="alta_tipo_doc_form" action="../controler/controler.php" method="post" >
						<fieldset>
							<legend>Alta</legend>
							<input type="hidden" name="desc_post" value="alta_tipo_doc"/>
							<label>Tipo documento</label>
							<input type="text" name="alta_tipo_doc" placeholder="Ingrese tipo documento" />
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
    <script src="../view/bootstrap/js/bootstrap.min.js"></script>
	
	</body>

</html>
