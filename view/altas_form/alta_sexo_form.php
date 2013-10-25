<!DOCTYPE html>
<html>
<head>
	<title>Alta Sexo</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link href="../view/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../view/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="../view/bootstrap/css/personal.css" rel="stylesheet">
</head>

<body>
	<article>
		<header>

		</header>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">

					<form name="alta_sexo_form" action="../controler/controler.php" method="post" >
						<fieldset>
							<legend>Alta sexo</legend>
							<label>Sexo </label>
							<input type="hidden" name="desc_post" value="alta_sexo"/>
							<input type="text" name="alta_tipo_sexo" placeholder="Ingrese tipo sexo" />
							<br>
							<input type="button" value="Cancelar" onclick="location.href='../index.php';"/>
							
							<input class="btn" type="submit" value="Guardar" />

						</fieldset>
					</form>
				</div>
			</div>
		</div>
		</header>
		<footer>

		</footer>

	</article>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../view/bootstrap/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../view/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
