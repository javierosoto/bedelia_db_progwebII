<?php

	require '../error.php';
	require_once '../funcion_sql/funciones_sql.php';
	require_once '../funcion_sql/conexion.php';

	//~ if('POST' == $_SERVER['REQUEST_METHOD']):

	$id = $_POST['mod_id_pers'];
	$con = conectar();
	$result_pers = sql_persona_completo($con,$id);
	$result_prof = sql_profesor_completo($con,$id);
	$result_alum = sql_alumno_completo($con,$id);
	//~ var_dump($result_pers);

	//~ var_dump($result_prof);

	//~ var_dump($result_alum);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title>Modificar persona</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />

		<?php require_once '../error.php';?>
		<?php require_once '../funcion_sql/funciones_sql.php';?>
		<?php require_once '../funcion_sql/conexion.php';?>

		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<!--
		<link href="../bootstrap/css/style.css" rel="stylesheet">
	-->
		<link href="../bootstrap/css/personal.css" rel="stylesheet">

	</head>
	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span8">
					<form name="modificar_persona" method="post" action="../funcion_sql/mod/mod_persona_sql.php">
						<fieldset>   
							<legend>Modificar datos</legend>
							<input type="hidden" name="mod_id_persona" value="<?php echo $result_pers['id_pe']; ?>">

							<!-- consulta a la tabla tipo documento -->
							<?php $result_sexo = sql_tabla_todo($con,"tipo_doc"); ?>

							<!-- modifica el tipo de documento -->
							<label>Tipo documento</label>
								<select name="mod_tipo_doc">
									<?php foreach ($result_sexo as $valor):?>

											<?php if ($valor['descripcion'] == $result_pers['descripcion']):?>
											<option value="<?php echo $valor['id'];?>" selected>
											<?php else: ?>
											<option value="<?php echo $valor['id'];?>">
											<?php endif;?>
											<?php echo $valor['descripcion'];?>
											</option>
									<?php endforeach;?>
								</select>
							<br>
							<label>Numero documento</label>
							<input type="text" name="nro_doc" value="<?php echo $result_pers['nro_doc']; ?>" >
							<br>

							<?php $apellido_nombre = explode (',', $result_pers['ape_nom']);?>
							<!-- modifica el apellido -->
							<label>Apellido</label>
							<input type="text" name="apellido" value="<?php echo $apellido_nombre[0]; ?>" >
							<br>

							<!-- modifica el nombre -->
							<label>Nombre</label>
							<input type="text" name="nombre" value="<?php echo $apellido_nombre[1]; ?>" >
							<br>

							<!-- modifica la direccion -->
							<label>Direccion</label>
							<input type="text" name="direccion" value="<?php echo $result_pers['direccion']; ?>" >
							<br>

							<!-- modifica la fecha de nacimiento -->
							<label>Fecha nacimiento</label>
							<input type="date" name="fecha_nac" value="<?php echo $result_pers['fecha_nac']; ?>" >
							<br>

							<!-- modifica el sexo -->
							<label>Sexo</label>
							<?php $result_sexo = sql_tabla_todo($con,"sexo"); ?>
							<select name="mod_sexo">
								<?php foreach ($result_sexo as $valor):?>
									<?php if ($valor['descripcion_sexo'] == $result_pers['descripcion_sexo']):?>
										<option value="<?php echo $valor['id'];?>" selected>
									<?php else:?>
										<option value="<?php echo $valor['id'];?>">
									<?php endif;?>
										<?php echo $valor['descripcion_sexo'];?>
									</option>
								<?php endforeach;?>
							</select>
							<br>
							<br>
							<input type="button" value="Cancelar" onclick="location.href='../abm_menu.php';"/>
							<input type="submit" value="Modificar"/>
							
				</div>   <!-- div span8 -->
				 
				<!-------------------------------------------->
				<?php if ($result_alum != false) :?>
					<div class="span4">
						<fieldset>
							<legend>Alumno</legend>
							<!-- selecciona el estado del alumno -->
							<?php $result_estado = sql_tabla_todo($con,"estado_alumno"); ?>

							<select name="mod_estado">
								<?php foreach ($result_estado as $valor):?>
									<?php if ($valor['descripcion'] == $result_alum['ea_descripcion']):?>
										<option value="<?php echo $valor['id'];?>" selected>
									<?php else:?>
										<option value="<?php echo $valor['id'];?>">
									<?php endif;?>
										<?php echo $valor['descripcion'];?>
									</option>
								<?php endforeach;?>
							</select>
							<!-- selecciona carrera del alumno -->
							<?php $result_carrera = sql_tabla_todo($con,"carrera"); ?>

							<select name="mod_carrera">
								<?php foreach ($result_carrera as $valor):?>
									<?php if ($valor['nombre_carrera'] == $result_alum['nombre_carrera']):?>
										<option value="<?php echo $valor['id'];?>" selected>
									<?php else:?>
										<option value="<?php echo $valor['id'];?>">
									<?php endif;?>
										<?php echo $valor['nombre_carrera'];?>
									</option>
								<?php endforeach;?>
							</select>

						</fieldset>
				<?php else: ?>
						<fieldset>
							<legend>Alumno</legend>
							<!-- selecciona el tipo de alumno -->
							<label>Condicion alumno</label>
							<?php $result_estado_alumno = sql_tabla_todo($con,"estado_alumno");?>
							<select  name="mod_estado" disabled  >
								<?php foreach ($result_estado_alumno as $valor):?>
									<option value="<?php echo $valor['id'];?>">
										<?php echo $valor['descripcion'];?>
									</option>
								<?php endforeach;?>
							</select>


							<!-- selecciona carrera del alumno -->
							<label>Carrera</label>
							<?php $result_carrera = sql_tabla_todo($con,"carrera");?>
							<select  name="mod_carrera"  disabled >
								<?php foreach ($result_carrera as $valor):?>
									<option value="<?php echo $valor['id'];?>">
										<?php echo $valor['nombre_carrera'];?>
									</option>
								<?php endforeach;?>
							</select>

						</fieldset>

				<?php endif;?>
				<?php if ($result_prof != false): ?>
						<!-- sector profesor -->
						<fieldset>
							<legend>Profesor</legend>
							<!-- selecciona el cargo del profesor -->
							<?php $result_profesor = sql_tabla_todo($con,"cargo"); ?>
							<select name="mod_cargo">
								<?php foreach ($result_profesor as $valor):?>
									<?php if ($valor['descripcion_cargo'] == $result_prof['descripcion_cargo']):?>
										<option value="<?php echo $valor['id'];?>" selected>
									<?php else:?>
										<option value="<?php echo $valor['id'];?>">
									<?php endif;?>
										<?php echo $valor['descripcion_cargo'];?>
									</option>
								<?php endforeach;?>

						</fieldset>
				<?php else: ?>
					<fieldset>
						<legend>Profesor</legend>
						<!-- selecciona el tipo de alumno -->
						<label>Cargo</label>
						<?php $result_cargo = sql_tabla_todo($con,"cargo");?>
						<select  name="mod_cargo" disabled>
							<?php foreach ($result_cargo as $valor):?>
								<option value="<?php echo $valor['id'];?>">
									<?php echo $valor['descripcion_cargo'];?>
								</option>
							<?php endforeach;?>
						</select>		
					</fieldset>
				<?php endif; ?>
			</div> <!-- div span4 -->
			</fieldset>
			</form>
		</div>
	</div>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../bootstrap/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
