<!DOCTYPE html>
<head>
	<title>Alta Comision</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<?php require dirname(__FILE__).'/../../error.php';?>
	<?php require dirname(__FILE__).'/../../model/funcion_sql/funciones_sql.php';?>
	<?php require dirname(__FILE__).'/../../model/funcion_sql/conexion.php';?>
	
	<link href="../view/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../view/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="../view/bootstrap/css/personal.css" rel="stylesheet">
	
	<!-- script para utilizar con el select -->
	<script type="text/javascript">
		function mostrar_materias(){

			var carrera =$("#select_carrera").val();
			
			$.ajax({
			
				url:'/funcion_sql/ajax_procesa.php',
				data:{tipo_carrera : carrera},
				type: 'post',
				success: function(data)
				{
					$("#select_materia").html(data);
				}
			})
		}
	</script>
	
</head>

<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">

				<form  name="alta_materia_form" action="../controler/controler.php" method="post" >

				<fieldset>
					<legend>Alta comision</legend>
					<input type="hidden" name="desc_post" value="alta_comision" />
					<!-- ingresa nombre de la comision -->
					<label><strong>Comision</strong></label>
					<input type="text" name="alta_comision_materia" placeholder="Ingrese comision" />
					<br>

					<!-- *************************************************************** -->
					<!-- seleccion de materia -->
					<label><strong>Materia</strong></label>
					<?php $con = conectar();?>
					<?php $result_carrera = sql_tabla_todo($con,"carrera");?> <!-- sql de carrera -->
					<select  id="id_carrera" name="opt_materia">
							<?php foreach ($result_carrera as $valor):?>
								<option value="<?php echo $valor['id'];?>">
									<?php echo $valor['nombre_carrera'];?>
								</option>
							<?php endforeach;?>
						
					</select>
					<br>

					<!-- seleccion de aula -->
					<label><strong>Aula</strong></label>
					<?php //$result = sql_tabla_todo($con,"aula");?> <!-- no necesito sql de carrera -->
					<select id="id_materia"name="opt_materia">
							<?php foreach ($result as $valor):?>
								<option value="<?php echo $valor['id'];?>">
									<?php echo $valor['descripcion_aula'];?>
								</option>
							<?php endforeach;?>
						
					</select>
					<br>

					<!-- *************************************************************** -->

					<!-- seleccion profesor para la comision -->
					<label><strong>Profesor</strong></label>
					<?php $result = sql_profesores($con);?>
					<select  name="opt_profesor">
							<?php foreach ($result as $valor):?>
								<option value="<?php echo $valor['prof_id'];?>">
									<?php $valor['ape_nom'] = str_replace(',',' ',$valor['ape_nom']);?>
									<?php echo $valor['ape_nom'];?>
								</option>
							<?php endforeach;?>
						
					</select>
					<input type="button" value="Nuevo" onclick="" >
					<br>

					<input type="button" value="Cancelar" onclick="location.href='../abm_menu.php';"/>
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
