<!DOCTYPE html>
<html>
<head>
	<title>Alta Sexo</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link href="../../controler/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../controler/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="../../controler/bootstrap/css/personal.css" rel="stylesheet">
</head>

<body>
	<article>
		<header>

		</header>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">

					<form name="alta_sexo_form" action="../funcion_sql/altas/alta_sexo_sql.php" method="post" >
						<fieldset>
							<legend>Alta sexo</legend>
							<label>Sexo </label>
							<input type="text" name="alta_tipo_sexo" placeholder="Ingrese tipo sexo" pattern="[A-Za-z]+$" />
							<br>
							<br>
							<br>
							<input class="btn" type="button" value="Cancelar" onclick="location.href='../abm_menu.php';"/>
							
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
    <script src="../../controler/bootstrap/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../controler/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
