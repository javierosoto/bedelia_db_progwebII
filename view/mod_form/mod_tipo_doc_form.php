<?php

	require dirname(__FILE__).'/../../error.php';
	require dirname(__FILE__).'/../../model/funcion_sql/funciones_sql.php';
	require dirname(__FILE__).'/../../model/funcion_sql/conexion.php';


	if('POST' == $_SERVER['REQUEST_METHOD']):
		
	$con = conectar();
	$tipo_documento = sql_tipo_doc($con);
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

	<head>
		<title>Modificar tipo DNI</title>
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<!--
		<link href="../bootstrap/css/style.css" rel="stylesheet">
	-->
		<link href="../bootstrap/css/personal.css" rel="stylesheet">

	</head>

	<header>
		
	</header>
	<body>
		<article>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<form name="modificar_tipo_doc" method="post" action="../funcion_sql/mod/mod_tipo_doc_sql.php">
							<fieldset>
								<legend>Modifica tipo de documento</legend>
								<input type="hidden" name="mod_tipo_doc_id" value="<?php echo $tipo_documento['id']; ?>">
								<label>Tipo documento</label>
								<input type="text" name='mod_tipo_doc' value="<?php echo $tipo_documento['descripcion']; ?>" >
								<br>
								<br>
								<input type="button" value="Cancelar" onclick="location.href='../abm_menu.php';"/>
								<input type="submit" value="Modificar"/>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<script src="../bootstrap/js/jquery.js"></script>
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="../bootstrap/js/bootstrap.min.js"></script>
		</article>
	</body>
</html>
	
<?php
	else:
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
	<title>Modificar tipo DNI</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	

	<?php require dirname(__FILE__).'/../../error.php';?>
	<?php require dirname(__FILE__).'/../../model/funcion_sql/funciones_sql.php';?>
	<?php require dirname(__FILE__).'/../../model/funcion_sql/conexion.php';?>
	<link href="../view/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../view/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="../view/bootstrap/css/personal.css" rel="stylesheet">
	
</head>

<body>

	<header>

	</header>
	<article>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<form  name="mod_tipo_dni_form" action="mod_tipo_doc_form.php" method="post" >
						<fieldset>
							<legend>Modifica tipo de documento</legend>
							<?php $con = conectar();?>

							<!-- seleccionar el tipo de documento a modificar -->
							<label >Seleccione tipo documento</label>
							
							<?php $result = sql_tabla_todo($con,"tipo_doc");?>
							<select name="mod_id_tipo_dni">
								<?php foreach ($result as $valor):?>
									<option value="<?php echo $valor['id'];?>">
										<?php echo $valor['descripcion'] ;?>
									</option>
								<?php endforeach;?>
								
							</select>
							
							<br>

							<input type="button" value="Cancelar" onclick="location.href='../abm_menu.php';"/>
							<input type="submit" value="Modificar" />
						
						</fieldset>
					</form>
				</div>
			</div>
		</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="../view/bootstrap/js/jquery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../view/bootstrap/js/bootstrap.min.js"></script>

		</article>
	
</body>

</html>
<?php
	endif;
?>
