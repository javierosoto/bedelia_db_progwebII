<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Listado materias</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<?php require_once '../error.php';?>
	<?php require_once '../funcion_sql/funciones_sql.php';?>
	<?php require_once '../funcion_sql/conexion.php';?>

	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="../bootstrap/css/style.css" rel="stylesheet">

  

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  
	<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/scripts.js"></script>
</head>

<body>
	<?php $con = conectar();?>
	<div align="center">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div align="center">
						<h3 class="text-center text-info">
							<label>Listado de <?php echo "hola" ;?></label>
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
</body>
</html>
