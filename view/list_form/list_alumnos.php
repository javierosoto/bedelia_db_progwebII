<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Listado comision</title>

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
						<h1 class="text-center text-info">
							<label><strong>Listado de alumnos <?php echo "" ;?></strong></label>
						</h1>
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
						<button type="button" class="btn btn-success" onclick="location.href='../view/abm_menu.php';">Salir</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../view/bootstrap/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../view/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
