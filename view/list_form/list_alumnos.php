<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Listado comision</title>
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
						<h1 class="text-center text-info">
							<label>Listado de profesores <?php echo "" ;?></label>
						</h3>
					</div>
					<br>
					<br>
					<table class="table table-bordered table-condensed table-striped">
						<thead>
							<tr>
								<th>
									<div align="center">
										<label><strong>Tipo</strong></label>
									</div>
								</th>
								<th>
									<div align="center">
										<label><strong>DNI</strong></label>
									</div>
								</th>
								<th>
									<div align="center">
										<label><strong>Apellido, Nombre</strong></label>
									</div>
								</th>
								<th>
									<div align="center">
										<label><strong>Direccion</strong></label>
									</div>
								</th>
								<th>
									<div align="center">
										<label><strong>Sexo</strong></label>
									</div>
								</th>
								<th>
									<div align="center">
										<label><strong>Carrera</strong></label>
									</div>
								</th>
								<th>
									<div align="center">
										<label><strong>Regularidad</strong></label>
									</div>
								</th>

							</tr>
						</thead>
						<?php $con = conectar();?>
						<?php $result_alumnos = sql_alumno_listado($con);?>
						<tbody>
							<?php foreach ($result_alumnos AS $valor): ?>
							<tr>
								<td>
									<label align="center">
										<?php echo $valor['descripcion'];?>
									</label>
								</td>
								<td>
									<label align="center">
										<?php echo $valor['nro_doc'];?>
									</label>
								</td>
								<td>
									<div align="center">
										<?php $valor['ape_nom'] = str_replace(',',' ',$valor['ape_nom']);?>
										<label><?php echo $valor['ape_nom'];?></label>
									</div>
								</td>
								<td>
									<div align="center">
										<label><?php echo $valor['direccion'];?></label>
									</div>
								</td>

								<td>
									<div align="center">
										<label><?php echo $valor['descripcion_sexo'];?></label>
									</div>
								</td>
								<td>
									<div align="center">
										<label><?php echo $valor['nombre_carrera'];?></label>
									</div>
								</td>
								<td>
									<div align="center">
										<label><?php echo $valor['descripcion_est_alum'];?></label>
									</div>
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
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="bootstrap/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
