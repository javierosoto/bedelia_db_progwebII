<!DOCTYPE html>

<head>
	<title>sin título</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.22" />

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
				<div class="span6">
					<form name="alta_tipo_doc_form" action="../funcion_sql/altas/alta_tipo_doc_sql.php" method="post" >
						<fieldset>
							<legend>Alta</legend>
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


		<footer>

		</footer>

	</article>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../controler/bootstrap/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../controler/bootstrap/js/bootstrap.min.js"></script>
	
</body>

</html>
