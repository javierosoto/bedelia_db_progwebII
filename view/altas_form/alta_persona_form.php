<!DOCTYPE html>

<head>
	<title>Alta persona</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

	<?php require dirname(__FILE__).'/../../error.php';?>
	<?php require dirname(__FILE__).'/../../model/funcion_sql/funciones_sql.php';?>
	<?php require dirname(__FILE__).'/../../model/funcion_sql/conexion.php';?>

	<!-- script que habilita los campos de alumno o profesor -->
	<script>
	function disableSelect()
	{
		if(document.alta_persona_form.checkbox_alumno.checked){
			document.alta_persona_form.id_estado_alumno.disabled=false;
			document.alta_persona_form.id_carrera_alumno.disabled=false;
		}else{
			document.alta_persona_form.id_estado_alumno.disabled=true;
			document.alta_persona_form.id_carrera_alumno.disabled=true;
		}

		if(document.alta_persona_form.checkbox_profesor.checked){
			document.alta_persona_form.id_cargo.disabled=false;
		}else{
				document.alta_persona_form.id_cargo.disabled=true;
		}


	}
	-->
	</script>

	<link href="../view/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../view/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="../view/bootstrap/css/personal.css" rel="stylesheet">



	
</head>

<body>
		<header>

		</header>

		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span8">
					<form name="alta_persona_form" action="../controler/controler.php" method="post">
						<fieldset>
							<legend>Alta</legend>
							<label>Tipo documento</label>
							
							<!-- seleccionar el tipo de documento -->
							<?php $con = conectar();?>
							<?php $result_td = sql_tabla_todo($con,"tipo_doc");?>
							<select name="id_tipo_doc_form">
								<?php foreach ($result_td as $valor):?>
									<option value="<?php echo $valor['id'];?>">
										<?php echo $valor['descripcion'];?>
									</option>
								<?php endforeach;?>
							</select>
							<br>
							<!-- ingresar el numero de documento -->

							<input type="hidden" name="desc_post" value="alta_pers"  />

							<label align="left">Documento</label>
							<input type="text"  name="nro_doc_form"  placeholder="Documento" />
							<br>
							<label align="left">Apellido</label>
							<!-- ingresar el apellido que luego se concatenara con el nombre -->
							<input type="text" name="apellido_form"  placeholder="Apellido" />
							<br>
							<label align="left">Nombre/s</label>
							<!-- ingresa el nombre -->
							<input type="text" name="nombre_form"   placeholder="Nombre" />
							<br>
							<label align="left">Direccion</label>
							<!---ingresa direccion de la persona -->
							<input type="text" name="direccion_form"  placeholder="Direccion"/>
							<br>
							<!-- ingresa fecha de nacimiento -->
							<label align="left">Fecha de nacimiento</label>
							<input type="date" name="fecha_nac_form" value="Fecha Nacimiento"  />
							<br>
							<!-- selecciona el sexo -->
							<label align="left">Sexo</label>
							<?php $result = sql_tabla_todo($con,"sexo");?>
							<select name="sexo_form">
								<?php foreach ($result as $valor):?>
									<option value="<?php echo $valor['id'];?>">
										<?php echo $valor['descripcion_sexo'];?>
									</option>
								<?php endforeach;?>
							</select>
							<br>
							<br>
							<input type="checkbox" name="checkbox_alumno" value="checkbox" onclick="disableSelect();"/> Alumnos
							<br>
							<br>
							<input type="checkbox" name="checkbox_profesor" value="checkbox" onclick="disableSelect();"/> Profesor
						</fieldset>

						
				<br>
				<input type="button" value="Cancelar" onclick="location.href='../abm_menu.php';"/>
				
				<input type="submit" value="Guardar" />
				</div> <!-- div span8 -->
					<!-- empieza la parte alumno y profesor -->
					<div class="span4">
						<fieldset>
							<legend>Alumno</legend>
							<!-- selecciona el tipo de alumno -->
							<label>Condicion alumno</label>
							<?php $result_estado_alumno = sql_tabla_todo($con,"estado_alumno");?>
							<select  name="id_estado_alumno"  disabled>
								<?php foreach ($result_estado_alumno as $valor):?>
									<option value="<?php echo $valor['id'];?>">
										<?php echo $valor['descripcion'];?>
									</option>
								<?php endforeach;?>
							</select>


							<!-- selecciona carrera del alumno -->
							<label>Carrera</label>
							<?php $result_carrera = sql_tabla_todo($con,"carrera");?>
							<select  name="id_carrera_alumno"  disabled>
								<?php foreach ($result_carrera as $valor):?>
									<option value="<?php echo $valor['id'];?>">
										<?php echo $valor['nombre_carrera'];?>
									</option>
								<?php endforeach;?>
							</select>
							
						</fieldset>
						<!-- sector profesor -->
						<fieldset>
							<legend>Profesor</legend>
							<!-- selecciona el tipo de alumno -->
							<label>Cargo</label>
							<?php $result_cargo = sql_tabla_todo($con,"cargo");?>
							<select  name="id_cargo"  disabled>
								<?php foreach ($result_cargo as $valor):?>
									<option value="<?php echo $valor['id'];?>">
										<?php echo $valor['descripcion_cargo'];?>
									</option>
								<?php endforeach;?>
							</select>		
						</fieldset>
					</div> <!-- div span4 -->
				
				</form> <!-- cierro form -->
			</div> <!-- div row-fluid -->
		</div>  <!-- div container-fluid -->



	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../view/bootstrap/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../view/bootstrap/js/bootstrap.min.js"></script>
	
</body>

</html>
