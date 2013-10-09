<!DOCTYPE html>
<head>
	<title>Alta Comision</title>
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
				<label align="left">Comision</label>
				<input type="text" name="alta_comision_materia" placeholder="Comision" />
				<br>
				<!-- seleccion de materia -->
				<label>Materia</label>
				<?php $con = conectar();?>
				<?php $result = sql_tabla_todo($con,"materia");?>
				<select name="opt_materia">
						<?php foreach ($result as $valor):?>
							<option value="<?php echo $valor['id'];?>">
								<?php echo $valor['nombre_materia'];?>
							</option>
						<?php endforeach;?>
					
				</select>
				<br>

				<!-- seleccion de aula -->
				<label>Aula</label>
				<?php $result = sql_tabla_todo($con,"aula");?>
				<select name="opt_aula">
						<?php foreach ($result as $valor):?>
							<option value="<?php echo $valor['id'];?>">
								<?php echo $valor['descripcion_aula'];?>
							</option>
						<?php endforeach;?>
					
				</select>
				<br>

				<!-- seleccion profesor para la comision -->
				<label>Profesor</label>
				<?php $result = sql_profesores($con);?>
				<select name="opt_profesor">
						<?php foreach ($result as $valor):?>
							<option value="<?php echo $valor['prof_id'];?>">
								<?php echo $valor['ape_nom'];?>
							</option>
						<?php endforeach;?>
					
				</select>



				<br>
				<br>
				<br>
				<input type="submit" value="Cancelar" onclick="location.href='../abm/abm_comision';"/>
				
				<input type="submit" value="Guardar" />

			</form>
		



		</header>
		<footer>

		</footer>

	</article>

	
</body>

</html>
