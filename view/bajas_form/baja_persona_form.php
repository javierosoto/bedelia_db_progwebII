<?php


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
	<title>Baja persona</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

	<?php require '../../error.php';?>
	<?php require '../../controler/funcion_sql/funciones_sql.php';?>
	<?php require '../../controler/funcion_sql/conexion.php';?>
	
	<link href="../../controler/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../controler/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="../../controler/bootstrap/css/personal.css" rel="stylesheet">
	
</head>

<body>



	<header>

	</header>
	<article>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<form name="baja_persona_form" action="../funcion_sql/bajas/baja_persona_sql.php" method="post" >
						<fieldset>
							<legend>Baja persona</legend>
							<?php $con = conectar();?>
							<!-- seleccionar el tipo de documento -->
							<label>Seleccione persona</label>
							<?php $result = sql_tabla_todo($con,"persona");?>
							<select name="baja_id_persona">
								<?php foreach ($result as $valor):?>
									<option value="<?php echo $valor['id'];?>">
										<?php echo "DNI ".$valor['nro_doc']." - ".$valor['ape_nom'] ;?>
									</option>
								<?php endforeach;?>
							</select>
							<br>

							<input type="button" value="Cancelar" onclick="location.href='../abm_menu.php';"/>
								
							<input type="submit" value="Borrar" />
						
						</fieldset>
					</form>
				</div>
			</div>
		</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="../../controler/bootstrap/js/jquery.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="../../controler/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
