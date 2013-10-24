<?php
	require dirname(__FILE__).'/../../error.php';
	require dirname(__FILE__).'/../../model/funcion_sql/funciones_sql.php';
	require dirname(__FILE__).'/../../model/funcion_sql/conexion.php';

	if('POST' == $_SERVER['REQUEST_METHOD']):


	$con = conectar();
	$id_aula = isset($_POST['mod_id_aula']) ? $_POST['mod_id_aula'] : null;
	$result = sql_aulas_mod ($con,$id_aula);

?>	


<html>
	<head>
		
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<!-- <link href="../bootstrap/css/style.css" rel="stylesheet"> 	-->
		<link href="../bootstrap/css/personal.css" rel="stylesheet">
		
	</head>

	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<form name="modificar_aula" method="post" action="../funcion_sql/mod/mod_aula_sql.php">
						<fieldset>
							<legend>Modificar aula</legend>
							<input type="hidden" name="mod_sexo" value="<?php echo $result['id']; ?>">
							<label>Aula</label>
							<input type="text" name='desc_aula' value="<?php echo $result['descripcion_aula']; ?>" >
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

<?php
	else:
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title>Modificar aula</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		

		<?php require dirname(__FILE__).'/../../error.php';?>
		<?php require dirname(__FILE__).'/../../model/funcion_sql/funciones_sql.php';?>
		<?php require dirname(__FILE__).'/../../model/funcion_sql/conexion.php';?>

		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<!-- <link href="../bootstrap/css/style.css" rel="stylesheet"> 	-->
		<link href="../bootstrap/css/personal.css" rel="stylesheet">
		
		
	</head>

	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<form  name="baja_persona_form" action="mod_aula_form.php" method="post" >
						<fieldset>
							<legend>Modificar aula</legend>
							<?php $con = conectar();?>

							<!-- seleccionar el aula a dar de baja -->
							<label align="left">Seleccione aula</label>
							
							<?php $result = sql_tabla_todo($con,"aula");?>
							<select name="mod_id_aula">
								<?php foreach ($result as $valor):?>
									<option value="<?php echo $valor['id'];?>">
										<?php echo $valor['descripcion_aula'] ;?>
									</option>
								<?php endforeach;?>
							</select>							
							<br>

							<input type="button" value="Cancelar" onclick="location.href='../abm_menu.php';"/>
							<input type="submit" value="Modificar" />

						</fieldset>
					</form>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="../bootstrap/js/jquery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../bootstrap/js/bootstrap.min.js"></script>
	</body>

</html>
<?php
	endif;
?>
