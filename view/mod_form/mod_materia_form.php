<?php

	require dirname(__FILE__).'/../../error.php';
	require dirname(__FILE__).'/../../model/funcion_sql/funciones_sql.php';
	require dirname(__FILE__).'/../../model/funcion_sql/conexion.php';

	if('POST' == $_SERVER['REQUEST_METHOD']):

	
	$con = conectar();

	$id_materia = isset($_POST['id_materia']) ? $_POST['id_materia'] : null;

	$result = sql_materia_modificar($con, $id_materia)


?>	
<html>
	<head>
		<title>Modifica materia</title>
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
					<form name="modificar_materia" method="post" action="../funcion_sql/mod/mod_materia_sql.php">
						<fieldset>
							<legend>Modificar materia</legend>
							<input type="hidden" name="id_materia" value="<?php echo $result['id_ma']; ?>">
							<label>Materia</label>
							<input type="text" name="nombre_materia" value="<?php echo $result['nombre_materia']; ?>" >
							<br>
							<label>Fecha inicial</label>
							<input type="date" name="fecha_ini" value="<?php echo $result['fecha_inicio_cursada']; ?>">
							<br>
							<label>Fecha final</label>
							<input type="date" name="fecha_fin" value="<?php echo $result['fecha_fin_cursada']; ?>">
							<br>

							<!-- consulta a la tabla tipo documento -->
							<?php $result_carrera = sql_tabla_todo($con,"carrera"); ?>
							
							<!-- modifica a la carrera que pertenece la materia -->
							<label>Carrera</label>
							<select name="mod_carrera">
								<?php foreach ($result_carrera as $valor):?>
									<?php if ($valor['nombre_carrera'] == $result['nombre_carrera']):?>
										<option value="<?php echo $valor['id'];?>" selected>
									<?php else: ?>
										<option value="<?php echo $valor['id'];?>">
									<?php endif;?>
									
									<?php echo $valor['nombre_carrera'];?>
								</option>
									
							<?php endforeach;?>
							</select>
							<br>
							<input type="button" value="Cancelar" onclick="location.href='../index.php';"/>
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
		<title>Modificar materia</title>
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
					<form name="mod_materia_form" action="mod_materia_form.php" method="post" >
					<fieldset>
							<legend>Modificar materia</legend>
							<?php $con = conectar();?>

							<!-- seleccionar el aula a dar de baja -->
							<label align="left">Seleccione carrera</label>
							
							<?php $result = sql_tabla_materias_carrera($con);?>
							<select name="id_materia">
								<?php foreach ($result as $valor):?>
									<option value="<?php echo $valor['id_ma'];?>">
										<?php echo $valor['nombre_materia']." - ".$valor['nombre_carrera'] ;?>
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
