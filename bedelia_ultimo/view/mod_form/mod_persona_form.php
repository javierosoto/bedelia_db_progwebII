<?php


	require '../error.php';
	require_once '../funcion_sql/funciones_sql.php';
	require_once '../funcion_sql/conexion.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		
		<title>Modificar persona</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />

		<?php require_once '../error.php';?>
		<?php require_once '../funcion_sql/funciones_sql.php';?>
		<?php require_once '../funcion_sql/conexion.php';?>

		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<!--
		<link href="../bootstrap/css/style.css" rel="stylesheet">
	-->
		<link href="../bootstrap/css/personal.css" rel="stylesheet">
		
	</head>

<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span8">
				<form  name="mod_persona_form" action="mod_persona_dos_form.php" method="post" >
					<fieldset>
						 <legend>Modifica</legend>
						<?php $con = conectar();?>
						<!-- seleccionar el tipo de documento -->
						<label>Seleccione persona</label>
						
						<?php $result = sql_tabla_todo($con,"persona");?>
						<select name="mod_id_pers">
							<?php foreach ($result as $valor):?>
								<option value="<?php echo $valor['id'];?>">
									<?php $valor['ape_nom'] = str_replace(',',' ', $valor['ape_nom']);?>
									<?php echo "DNI ".$valor['nro_doc']." - ".$valor['ape_nom'] ;?>
								</option>
							<?php endforeach;?>
						</select>
						<br>
				
						<input type="button" value="Cancelar" onclick="location.href='../abm_menu.php';"/>
						<input type="submit" value="Modificar" />
						 
					</fieldset>
				</form>
			</div>
		</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../bootstrap/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
