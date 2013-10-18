<!DOCTYPE html>
<head>
	<title>Alta Comision</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<?php require '../error.php';?>
	<?php require '../funcion_sql/funciones_sql.php';?>
	<?php require '../funcion_sql/conexion.php';?>

	
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="../bootstrap/css/style.css" rel="stylesheet">

	
</head>

<body>
	<article>
		<header>

		</header>
			<form role="form" align="center" name="alta_materia_form" action="../funcion_sql/altas/alta_comision_sql.php" method="post" >

			<div class="form-group">
				<!-- ingresa nombre de la comision -->
				<label><strong>Comision</strong></label>
				<input type="text" name="alta_comision_materia" placeholder="Ingrese comision" />
				<br>
				<!-- seleccion de materia -->
				<label><strong>Materia</strong></label>
				<?php $con = conectar();?>
				<?php $result = sql_tabla_materias_carrera($con);?>
				<select  name="opt_materia">
						<?php foreach ($result as $valor):?>
							<option value="<?php echo $valor['id_ma'];?>">
								<?php echo $valor['nombre_materia']." - ".$valor['nombre_carrera'];?>
							</option>
						<?php endforeach;?>
					
				</select>
				<br>

				<!-- seleccion de aula -->
				<label><strong>Aula</strong></label>
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
				<label><strong>Profesor</strong></label>
				<?php $result = sql_profesores($con);?>
				<select  name="opt_profesor">
						<?php foreach ($result as $valor):?>
							<option value="<?php echo $valor['prof_id'];?>">
								<?php echo $valor['ape_nom'];?>
							</option>
						<?php endforeach;?>
					
				</select>



				<br>
				<br>
				<br>
				<input type="submit" value="Cancelar" onclick="location.href='../abm_menu.php';"/>
				
				<input type="submit" value="Guardar" />
			</div>
			</form>
		



		</header>
		<footer>

		</footer>

	</article>
	S<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="bootstrap/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
	
</body>

</html>
