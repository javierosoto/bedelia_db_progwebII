<!DOCTYPE html>
<html>
	<head>
		<title>Alta Materia</title>
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
					<form  name="alta_materia_form" action="../controler/controler.php" method="post" >
						<fieldset>
							<legend>Alta materia</legend>
							<!-- xxxxxxxxxxxxx -->
							<input type="hidden" name="desc_post" value="alta_materia"/>
							<label>Nombre materia</label>
							<input type="text" name="alta_nombre_materia" placeholder="Ingrese nombre materia" />
							<br>
							<label>Fecha inicio cursada</label>
							<!-- xxxxxxxxxxxxxx -->
							<input type="date" name="alta_fecha_inicio_cursada" />
							<br>
							<label>Fecha fin cursada</label>
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
							<input type="button" value="Nuevo" onclick="window.open('alta_tipo_carrera_form.php?ventana=true','Alta carrera', 'location=no,status=1,scrollbars=1,width=500,height=350'); return false;">
							<br>
							<br>
							
							<input type="button" value="Cancelar" onclick="location.href='../index.php';"/>
							
							<input type="submit" value="Guardar" />
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
