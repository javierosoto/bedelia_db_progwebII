<?php

	
	require dirname(__FILE__).'/../../error.php';
	require dirname(__FILE__).'/../../model/funcion_sql/funciones_sql.php';
	require dirname(__FILE__).'/../../model/funcion_sql/conexion.php';


	if('POST' == $_SERVER['REQUEST_METHOD']):
		
	$id_tpca = isset($_POST['mod_id_carrera']) ? $_POST['mod_id_carrera'] : null;
	
	$con = conectar();
	$result = sql_tipo_carrera_mod ($con, $id_tpca);

?>	
<html>
	<head>
	<title>Modificar carrera</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
<!-- <link href="../bootstrap/css/style.css" rel="stylesheet"> -->
	<link href="../bootstrap/css/personal.css" rel="stylesheet">

	</head>
	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<form name="modificar_cargo" method="post" action="../funcion_sql/mod/mod_carrera_sql.php">
						<fieldset>
							<legend>Modificar carrera</legend>
							<input type="hidden" name="mod_carrera" value="<?php echo $result['id']; ?>">
							<label>Carrera</label>
							<input type="text" name="nombre_carrera" value="<?php echo $result['nombre_carrera']; ?>" >
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
	</body>
</html>
	
<?php
	else:
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
	<title>Modificar carrera</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

	
	<?php require dirname(__FILE__).'/../../error.php';?>
	<?php require dirname(__FILE__).'/../../model/funcion_sql/funciones_sql.php';?>
	<?php require dirname(__FILE__).'/../../model/funcion_sql/conexion.php';?>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="../bootstrap/css/personal.css" rel="stylesheet">

</head>

<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">

				<form  name="mod_carrera_form" action="mod_tipo_carrera_form.php" method="post" >
					<fieldset>
						<legend>Modificar carrera</legend>
						<?php $con = conectar();?>

						<!-- seleccionar el aula a dar de baja -->
						<label >Seleccione carrera</label>
						
						<?php $result = sql_tabla_todo($con,"carrera");?>
						<select name="mod_id_carrera">
							<?php foreach ($result as $valor):?>
								<option value="<?php echo $valor['id'];?>">
									<?php echo $valor['nombre_carrera'] ;?>
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
