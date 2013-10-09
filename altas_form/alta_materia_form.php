<!DOCTYPE html>
<head>
	<title>Alta Materia</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<?php require '../error.php';?>
	<?php require '../funcion_sql/funciones_sql.php';?>
	<?php require '../funcion_sql/conexion.php';?>
	
</head>

<body>
	<article>
		<header>

		</header>
			<form align="center" name="alta_materia_form" action="xxxxxx.php" method="post" >

				<!-- xxxxxxxxxxxxx -->
				<label align="left">Nombre materia</label>
				<input type="text" name="alta_nombre_materia" placeholder="Ingrese nombre materia" />
				<br>
				<label align="left">Fecha inicio cursada</label>
				<!-- xxxxxxxxxxxxxx -->
				<input type="date" name="alta_fecha_inicio_cursada" />
				<br>
				<label align="left">Fecha fin cursada</label>
				<!-- xxxxxxxxxxxxxx -->
				<input type="date" name="alta_fecha_fin_cursada" />
				<br>
				<label>Carrera</label>
				<?php $con = conectar();?>
				<?php $result = sql_tabla_todo($con,"carrera");?>
				<select name="opt_carrera">
						<?php foreach ($result as $valor):?>
							<option value="<?php echo $valor['id'];?>">
								<?php echo $valor['nombre_carrera'];?>
							</option>
						<?php endforeach;?>
					
				</select>
				<br>
				<br>
				<input type="submit" value="Cancelar" />
				
				<input type="submit" value="Guardar" />

			</form>
		



		</header>
		<footer>

		</footer>

	</article>

	
</body>

</html>
