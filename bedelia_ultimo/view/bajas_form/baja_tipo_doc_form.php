<?php


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
	<title>Baja tipo DNI</title>
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
				<div class="span6">
					<form name="baja_tipo_dni_form" action="../funcion_sql/bajas/baja_tipo_doc_sql.php" method="post" >
						<fieldset>
							<legend>Baja</legend>
							<?php $con = conectar();?>

							<!-- seleccionar el tipo de documento a dar de baja -->
							<label align="left">Seleccione tipo documento</label>
							
							<?php $result = sql_tabla_todo($con,"tipo_doc");?>
							<select name="baja_id_tipo_dni">
								<?php foreach ($result as $valor):?>
									<option value="<?php echo $valor['id'];?>">
										<?php echo $valor['descripcion'] ;?>
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
