<?php

	require dirname(__FILE__).'/../../error.php';
	require dirname(__FILE__).'/../../model/funcion_sql/funciones_sql.php';
	require dirname(__FILE__).'/../../model/funcion_sql/conexion.php';

	if('POST' == $_SERVER['REQUEST_METHOD']):

	$id_est_alu = isset($_POST['mod_id_estado_alumno']) ? $_POST['mod_id_estado_alumno'] : null;
	$con = conectar();

	$result = sql_estado_alumno_mod ($con, $id_est_alu)

?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Modifica condicion alumno</title>
			<meta http-equiv="content-type" content="text/html;charset=utf-8" />
			<link href="../view/bootstrap/css/bootstrap.min.css" rel="stylesheet">
			<link href="../view/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
			<link href="../view/bootstrap/css/personal.css" rel="stylesheet">
		</head>
		<body>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<form name="modificar_estado_alumno" method="post" action="../funcion_sql/mod/mod_estado_alumno_sql.php">
							<fieldset>
								<legend>Modifica condicion alumno</legend>
								<input type="hidden" name="mod_estado_alumno" value="<?php echo $result['id']; ?>">
								<label>Estado alumno</label>
								<input type="text" name="desc_estado_alumno" value="<?php echo $result['descripcion'];?>" pattern="[\w]+" tittle="Solo texto" >
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
	else:
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title>Modificar estado alumno</title>
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
				<div class="espan12">
					<form name="mod_estado_alumno_form" action="mod_estado_alumno_form.php" method="post" >
						<fieldset>
							<legend>Modifica condicion alumno</legend>
							<?php $con = conectar();?>

							<!-- seleccionar el estado del alumno a dar de modificar -->
							<label>Seleccione estado</label>
							
							<?php $result = sql_tabla_todo($con,"estado_alumno");?>
							<select name="mod_id_estado_alumno">
								<?php foreach ($result as $valor):?>
									<option value="<?php echo $valor['id'];?>">
										<?php echo $valor['descripcion'] ;?>
									</option>
								<?php endforeach;?>
							</select>
							<br>


							<input type="button" value="Cancelar" onclick="location.href='../index.php';"/>
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
	endif;
?>
