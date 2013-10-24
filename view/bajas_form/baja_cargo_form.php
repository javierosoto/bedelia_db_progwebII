<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title>Baja cargo</title>
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
					<form name="baja_persona_form" action="../funcion_sql/bajas/baja_cargo_sql.php" method="post" >
						<fieldset>
							<legend>Baja cargo</legend>
							<?php $con = conectar();?>

							<!-- seleccionar el aula a dar de baja -->
							<label align="left">Seleccione cargo</label>
							<?php $result = sql_tabla_todo($con,"cargo");?>

							<select name="baja_id_cargo">
								<?php foreach ($result as $valor):?>
									<option value="<?php echo $valor['id'];?>">
										<?php echo $valor['descripcion_cargo'] ;?>
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
		<script src="../view/bootstrap/js/jquery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../view/bootstrap/js/bootstrap.min.js"></script>

		
	</body>

</html>
