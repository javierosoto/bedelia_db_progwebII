<?php

	require dirname(__FILE__).'/../../error.php';
	require dirname(__FILE__).'/../../model/funcion_sql/funciones_sql.php';
	require dirname(__FILE__).'/../../model/funcion_sql/conexion.php';


	if('POST' == $_SERVER['REQUEST_METHOD']):

	$id_sexo = isset ($_POST['']) ? $_POST[''] : null;
	
	$con = conectar();
	$result = sql_sexo_modifica($con, $id_sexo)


?>
<!DOCTYPE html>
<html>
	<header>
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<!--
		<link href="../bootstrap/css/style.css" rel="stylesheet">
	-->
		<link href="../bootstrap/css/personal.css" rel="stylesheet">

	</header>
	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<form name="modificar_sexo" method="post" action="../funcion_sql/mod/mod_sexo_sql.php">
						<fieldset>
							<legend>Modificar sexo</legend>
							<input type="hidden" name="mod_sexo" value="<?php echo $result['id']; ?>">
							<label>Sexo:</label>
							<input type="text" name="desc_sexo" value="<?php echo $result['descripcion_sexo']; ?>">
							<br>
							
							<button type="submit">Modificar</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</body>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="../bootstrap/js/jquery.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	
</html>
	
<?php
	else:
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Modificar sexo</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />


		<?php require dirname(__FILE__).'/../../error.php';?>
		<?php require dirname(__FILE__).'/../../model/funcion_sql/funciones_sql.php';?>
		<?php require dirname(__FILE__).'/../../model/funcion_sql/conexion.php';?>
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="../bootstrap/css/personal.css" rel="stylesheet">


	</head>

	<body>

	<header>

	</header>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<form name="baja_sexo_form" action="mod_sexo_form.php" method="post" >
						<fieldset>
							<legend>Modificar sexo</legend>
								<?php $con = conectar();?>

								<!-- seleccionar el sexo a dar de baja -->
								<label align="left">Seleccione sexo</label>
								
								<?php $result = sql_tabla_todo($con,"sexo");?>
								<select name="mod_id_sexo">
									<?php foreach ($result as $valor):?>
										<option value="<?php echo $valor['id'];?>">
											<?php echo $valor['descripcion_sexo'] ;?>
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
		<script src="../bootstrap/js/jquery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../bootstrap/js/bootstrap.min.js"></script>

	</body>

</html>

<?php	
	endif;
?>
