<?php

	require '../error.php';
	require_once '../funcion_sql/funciones_sql.php';
	require_once '../funcion_sql/conexion.php';

	if('POST' == $_SERVER['REQUEST_METHOD']):
		
	$con = conectar();

	$id_co = isset($_POST['id_comision']) ? $_POST['id_comision'] : null;


	/*
	 * sql para traer los datos de la comision
	 */
	 
	$sql = "SELECT
				co.id AS id_co, co.descripcion_comision, co.materia_id, co.aula_id, co.profesor_id,
				au.id AS id_au, au.descripcion_aula,
				ma.id AS id_ma, ma.nombre_materia, ma.fecha_inicio_cursada, ma.fecha_fin_cursada, ma.carrera_id,
				ca.id AS id_ca, ca.nombre_carrera,
				pr.id AS id_pr,
				pe.id AS id_pe, pe.ape_nom
			FROM
				persona AS pe,
				carrera AS ca,
				materia AS ma,
				aula AS au,
				comision AS co,
				profesor AS pr
			WHERE
				pe.id = pr.persona_id and
				pr.id = co.profesor_id and
				co.materia_id = ma.id and
				ma.carrera_id = ca.id and
				co.aula_id = au.id and
				co.id = :id_co";

						
			$stmt = $con->prepare($sql);
			
			$stmt->bindParam(':id_co', $id_co);
			
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			$stmt->execute();
			
			$result = $stmt->fetch();

?>	
	<html>
		<header>
			<!-- Bootstrap --> 
			<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
			<link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
			<link href="../bootstrap/css/style.css" rel="stylesheet">
		</header>
		<body>
			<article align="center">
				<form role="form" name="modificar_persona" method="post" action="../funcion_sql/mod/mod_persona_sql.php">
					<div class="form-group">
					<input type="hidden" name="id_comision" value="<?php echo $result['id_co']; ?>">
					<label align="center"><strong>Comision</strong></label>
					<input type="text" name="desc_com" value="<?php echo $result['descripcion_comision']; ?>">

					<!-- ********************************* -->
					<?php $result_materias = sql_tabla_materias_carrera($con); ?>
					<?php var_dump($result_materias);?>
					<!-- modifica el tipo de documento -->
					<label><strong>Materia</strong></label>
						<select name="id_materia">
							<?php foreach ($result_materias as $valor):?>
							
									<?php if ($valor['nombre_materia'] == $result['nombre_materia']):?>
										<option value="<?php echo $valor['id_ma'];?>" selected>
									<?php else: ?>
										<option value="<?php echo $valor['id_ma'];?>">
									<?php endif;?>
									
									<?php echo $valor['nombre_materia'];?>
								</option>
								
						<?php endforeach;?>
						</select>
					<br>

					<!-- ********************* -->
					<label><strong>Aula</strong></label>
					<?php $result_aula = sql_tabla_todo($con,"aula"); ?>
					<select name="mod_aula">
						<?php foreach ($result_aula as $valor):?>
							<?php if ($valor['descripcion_aula'] == $result['descripcion_aula']):?>
								<option value="<?php echo $valor['id_au'];?>" selected>
							<?php else:?>
								<option value="<?php echo $valor['id_au'];?>">
							<?php endif;?>
								<?php echo $valor['descripcion_aula'];?>
							</option>
						<?php endforeach;?>
					
					</select>
					<br>
					<br>

					<button type="submit">Modificar</button>
					<button type="submit" onclick="location.href='../abm_menu.php';">Cancelar</button>
				</div>
				</form>
			</article>

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

<head>
	<title>Baja comision</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	

	<?php require_once '../error.php';?>
	<?php require_once '../funcion_sql/funciones_sql.php';?>
	<?php require_once '../funcion_sql/conexion.php';?>

	<!-- Bootstrap --> 
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="../bootstrap/css/style.css" rel="stylesheet">

	
</head>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
	<title>Modificar persona</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

	<?php require_once '../error.php';?>
	<?php require_once '../funcion_sql/funciones_sql.php';?>
	<?php require_once '../funcion_sql/conexion.php';?>
	
</head>

<body>

	<header>

	</header>
	<article>
			<form role="form" align="center" name="mod_persona_form" action="mod_comision_form.php" method="post" >
				<div class="form-group">
				<?php $con = conectar();?>

				<!-- seleccionar el tipo de documento -->
				<label>Seleccione comision</label>
				
				<?php $result = sql_comision($con);?>

				<select name="id_comision">
					<?php foreach ($result as $valor):?>
						<option value="<?php echo $valor['id_co'];?>">
							
							<?php echo $valor['descripcion_comision']." - ".$valor['nombre_carrera'];?>
						</option>
					<?php endforeach;?>
					
				</select>

				<br>
				<br>
				<br>

				<input type="submit" value="Cancelar" onclick="location.href='../abm/abm_persona.php';" />
				<input type="submit" value="Modificar" />
				
			</div>
			</form>
		</article>


		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../bootstrap/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
	
</body>

</html>
<?php
	endif;
?>
