<?php


	require dirname(__FILE__).'/../../error.php';
	require dirname(__FILE__).'/../../model/funcion_sql/funciones_sql.php';
	require dirname(__FILE__).'/../../model/funcion_sql/conexion.php';

	if('POST' == $_SERVER['REQUEST_METHOD']):
		
	$con = conectar();

	$id_co = isset($_POST['id_comision']) ? $_POST['id_comision'] : null;

	$result = sql_comision_mod ($con, $id_co);
	
?>	
<html>
	<header>
		<!-- Bootstrap --> 
		<link href="../view/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../view/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="../view/bootstrap/css/style.css" rel="stylesheet">
	</header>
	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<form name="modificar_persona" method="post" action="../funcion_sql/mod/mod_comision_sql.php">
						<fieldset>
							<legend>Modificar comision</legend>
							<input type="hidden" name="id_comision" value="<?php echo $result['id_co']; ?>">
							<label><strong>Comision</strong></label>

							<input type="text" name="desc_com" value="<?php echo $result['descripcion_comision']; ?>">

							<!-- ********************************* -->
							
							
							<!-- modifica el tipo de documento -->
							<label><strong>Materia</strong></label>
							<?php $result_materias = sql_tabla_materias_carrera($con); ?>
							<select name="id_materia">
							<?php foreach ($result_materias as $valor):?>
								<?php if ($valor['nombre_materia'] == $result['nombre_materia']):?>
									<option value="<?php echo $valor['id_ma'];?>" selected>
								<?php else: ?>
									<option value="<?php echo $valor['id_ma'];?>">
								<?php endif;?>
								
								<?php echo $valor['nombre_materia']." - ".$valor['nombre_carrera'];?>
									</option>
								
								<?php endforeach;?>
							</select>
							<br>

							<!-- ********************* -->
							<label><strong>Profesor</strong></label>
							<?php $result_prof = sql_profesores($con); ?>
							
							<select name="id_profesor">
								<?php foreach ($result_prof as $valor):?>
									<?php if ($valor['descripcion_aula'] == $result['descripcion_aula']):?>
										<option value="<?php echo $valor['prof_id'];?>" selected>
									<?php else:?>
										<option value="<?php echo $valor['prof_id'];?>">
									<?php endif;?>
										<?php echo $valor['ape_nom'];?>
									</option>
								<?php endforeach;?>
						
						</select>

						<!-- ********************* -->
						<label><strong>Aula</strong></label>
						<?php $result_aula = sql_tabla_todo($con,"aula"); ?>
						<select name="id_aula">
							<?php foreach ($result_aula as $valor):?>
								<?php if ($valor['descripcion_aula'] == $result['descripcion_aula']):?>
									<option value="<?php echo $valor['id'];?>" selected>
								<?php else:?>
									<option value="<?php echo $valor['id'];?>">
								<?php endif;?>
									<?php echo $valor['descripcion_aula'];?>
								</option>
							<?php endforeach;?>
						
						</select>
						<br>

						<input type="button" value="Cancelar" onclick="location.href='../index.php';"/>
						<input type="submit" value="Modificar" />
						
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
		<title>Modificar comision</title>
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
					<form  name="mod_persona_form" action="mod_comision_form.php" method="post" >
						<fieldset>
							<legend>Modificar comision</legend>
							<?php $con = conectar();?>

							<!-- seleccionar el tipo de documento -->
							<label>Seleccione comision</label>
							
							<?php $result = sql_comision($con);?>

							<select name="id_comision">
								<?php foreach ($result as $valor):?>
									<option value="<?php echo $valor['id_co'];?>">
										
										<?php echo $valor['descripcion_comision']." - ".$valor['nombre_carrera'];?>
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
