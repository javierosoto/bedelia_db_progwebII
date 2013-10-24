<?php


	require dirname(__FILE__).'/../../error.php';
	require dirname(__FILE__).'/../../model/funcion_sql/funciones_sql.php';
	require dirname(__FILE__).'/../../model/funcion_sql/conexion.php';


	if('POST' == $_SERVER['REQUEST_METHOD']):

	$id_cargo = isset($_POST['mod_id_cargo']) ? isset($_POST['mod_id_cargo']) : null;
	$con = conectar();
	$result = sql_cargo_modificar($con, $id_cargo)



?>
<!DOCTYPE html>
<html>
	<head>
		<link href="../view/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../view/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="../view/bootstrap/css/personal.css" rel="stylesheet">

		
	</head>
	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<form name="modificar_cargo" method="post" action="../funcion_sql/mod/mod_cargo_sql.php">
						<fieldset>
							<legend>Modificar cargo</legend>
							<input type="hidden" name="mod_cargo" value="<?php echo $result['id']; ?>">
							<label>Cargo</label>
							<input type="text" name="desc_cargo" value="<?php echo $result['descripcion_cargo']; ?>" >
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

	</body>
</html>
	
<?php
	else:
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title>Modificar cargo</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		

		<?php require dirname(__FILE__).'/../../error.php';?>
		<?php require dirname(__FILE__).'/../../model/funcion_sql/funciones_sql.php';?>
		<?php require dirname(__FILE__).'/../../model/funcion_sql/conexion.php';?>
		<link href="../view/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../view/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="../view/bootstrap/css/personal.css" rel="stylesheet">
		
	</head>

	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<form  name="mod_cargo_form" action="mod_cargo_form.php" method="post" >
						<fieldset>
							<legend>Modificar cargo</legend>
							<?php $con = conectar();?>

							<!-- seleccionar el cargo a modificar -->
							<label>Seleccione cargo</label>
							
							<?php $result = sql_tabla_todo($con,"cargo");?>
							<select name="mod_id_cargo">
								<?php foreach ($result as $valor):?>
									<option value="<?php echo $valor['id'];?>">
										<?php echo $valor['descripcion_cargo'] ;?>
									</option>
								<?php endforeach;?>
								
							</select>

							<br>
				
							<input type="button" value="Cancelar" onclick="location.href='../abm_menu.php';"/>
							<input type="submit" value="Modificar"/>
							
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
<?php
	endif;
?>
