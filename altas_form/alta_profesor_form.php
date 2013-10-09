<!DOCTYPE html>

<head>
	<title>Alta Profesor</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	
	<?php require '../error.php';?>
	<?php require '../funcion_sql/funciones_sql.php';?>
	<?php require '../funcion_sql/conexion.php';?>
	
	
</head>

<body>
	<article>
		<header>

		</header>
			<form align="center" name="alta_persona_form" action="../funcion_sql/altas/alta_profesor_sql.php" method="post" >

				<!-- seleccionar el tipo de documento -->
				<label align="left">Tipo Documento</label>
				<?php $con = conectar();?>
				<?php $result = sql_tabla_todo($con,"tipo_doc");?>
				
				<select name="opt_tipo_doc">
						<?php foreach ($result as $valor):?>
							<option value="<?php echo $valor['id'];?>">
								<?php echo $valor['descripcion'];?>
							</option>
						<?php endforeach;?>
					
				</select>
				<br>

				<!-- ingresar el numero de documento -->
				<label align="left">Documento</label>
			
				<input type="text" name="nro_doc_form"  placeholder="Documento"/>
				<br>
				<label align="left">Apellido</label>
				<!-- ingresar el apellido que luego se concatenara con el nombre -->
				<input type="text" name="apellido_form" placeholder="Apellido"/>
				<br>
				<label align="left">Nombre/s</label>
				<!-- ingresa el nombre -->
				<input type="text" name="nombre_form"  placeholder="Nombre"/>
				<br>
				<label align="left">Direccion</label>
				<!---ingresa direccion de la persona -->
				<input type="text" name="direccion_form"  placeholder="Direccion"/>
				<br>
				<!-- ingresa fecha de nacimiento -->
				<label align="left">Fecha de nacimiento</label>
				<input type="date" name="fecha_nac_form" value="Fecha Nacimiento" />
				<br>
				<!-- selecciona el sexo -->
				<label align="left">Sexo</label>
				<?php $result = sql_tabla_todo($con,"sexo");?>
				<select name="opt_sexo">
						<?php foreach ($result as $valor):?>
							<option value="<?php echo $valor['id'];?>">
								<?php echo $valor['descripcion_sexo'];?>
							</option>
						<?php endforeach;?>
					
				</select>
				<br>
				
				<!-- selecciona el cargo del profesor -->
				<label align="left">Carrera</label>
				<?php $result = sql_tabla_todo($con,"cargo");?>
				<select name="opt_cargo">
						<?php foreach ($result as $valor):?>
							<option value="<?php echo $valor['id'];?>">
								<?php echo $valor['descripcion_cargo'];?>
							</option>
						<?php endforeach;?>
					
				</select>

				<br>
				<br>
				<br>
				<input type="submit" value="Cancelar" onclick="location.href='../abm/abm_profesor.php';"/>
				
				<input type="submit" value="Guardar" />


			</form>
		



		</header>
		<footer>

		</footer>

	</article>

	
</body>

</html>
