<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Listado materias</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


	<?php require dirname(__FILE__).'/../../error.php';?>
	<?php require dirname(__FILE__).'/../../model/funcion_sql/funciones_sql.php';?>
	<?php require dirname(__FILE__).'/../../model/funcion_sql/conexion.php';?>

	<link href="../view/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../view/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="../view/bootstrap/css/personal.css" rel="stylesheet">


</head>

<body>
	<?php $con = conectar();?>
	<div align="center">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div align="center">
						<h3 class="text-center text-info">
							<label>Listado de materias<?php echo "" ;?></label>
						</h3>
					</div>
					<table class="table table-bordered table-condensed table-striped">
						<thead>
							<tr>
								<th>
									<div align="center">
										<label>Materia</label>
									</div>
								</th>
								<th>
									<div align="center">
										<label>Inicio</label>
									</div>
								</th>
								<th>
									<div align="center">
										<label>Finaliza</label>
									</div>
								</th>
								<th>
									<div align="center">
										<label>Carrera</label>
									</div>
								</th>
							</tr>
						</thead>
						<?php $con = conectar();?>
						<?php $result = sql_tabla_materias_carrera($con);?>
						
						<tbody>
							<?php foreach ($result AS $valor): ?>
							<tr>
								<td>
									<label><?php echo $valor['nombre_materia'];?></label>
								</td>
								<td>
									<label><?php echo $valor['nombre_carrera'];?></label>
								</td>
								<td>
									<label><?php echo $valor['fecha_inicio_cursada'];?></label>
								</td>
								<td>
									<label><?php echo $valor['fecha_fin_cursada'];?></label>
								</td>
								
							</tr>
							<?php endforeach;?>

						</tbody>
						
					</table>
					<div class="btn-group" align="center">
						<button type="button" class="btn btn-success" onclick="location.href='../abm_menu.php';">Salir</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	  
	<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/scripts.js"></script>
</body>
</html>
