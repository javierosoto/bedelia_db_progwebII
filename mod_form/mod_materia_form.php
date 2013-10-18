<?php

	require '../error.php';
	require_once '../funcion_sql/funciones_sql.php';
	require_once '../funcion_sql/conexion.php';

	if('POST' == $_SERVER['REQUEST_METHOD']):

	
	$con = conectar();

	$id_materia = isset($_POST['id_materia']) ? $_POST['id_materia'] : null;

	echo $id_materia;
	
	$sql = "SELECT
				ma.id AS id_ma, nombre_materia, fecha_inicio_cursada, fecha_fin_cursada, carrera_id , ca.nombre_carrera
			FROM
				materia AS ma , carrera AS ca
			WHERE
				ma.id = :carrera and
				carrera_id = ca.id";
			
			$stmt = $con->prepare($sql);
			
			$stmt->setFetchMode(PDO::FETCH_ASSOC);

			$stmt->bindParam(':carrera', $id_materia);

			$stmt->execute();
			
			$result = $stmt->fetch();

			var_dump ($result);
?>	
	<html>
		<header align="center">
			<h3>MODIFICACION</h3>
		</header>
		<body>
			<article align="center">
				<form name="modificar_materia" method="post" action="../funcion_sql/mod/mod_materia_sql.php">
					<input type="hidden" name="id_materia" value="<?php echo $result['id_ma']; ?>">
					<label>Materia</label>
					<input type="text" name="nombre_materia" value="<?php echo $result['nombre_materia']; ?>" >
					<br>
					<label>Fecha inicial</label>
					<input type="date" name="fecha_ini" value="<?php echo $result['fecha_inicio_cursada']; ?>">
					<br>
					<label>Fecha final</label>
					<input type="date" name="fecha_fin" value="<?php echo $result['fecha_fin_cursada']; ?>">
					<br>

					<!-- consulta a la tabla tipo documento -->
					<?php $result_carrera = sql_tabla_todo($con,"carrera"); ?>
					
					<!-- modifica a la carrera que pertenece la materia -->
					<label>Carrera</label>
						<select name="mod_carrera">
							<?php foreach ($result_carrera as $valor):?>
							
									<?php if ($valor['nombre_carrera'] == $result['nombre_carrera']):?>
										<option value="<?php echo $valor['id'];?>" selected>
									<?php else: ?>
										<option value="<?php echo $valor['id'];?>">
									<?php endif;?>
									
									<?php echo $valor['nombre_carrera'];?>
								</option>
								
						<?php endforeach;?>
						</select>
					<br>
					
					<button type="submit">Modificar</button>
				</form>
			</article>
		</body>
	</html>
	
<?php
	else:
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
	<title>Modificar carrera</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	

	<?php require_once '../error.php';?>
	<?php require_once '../funcion_sql/funciones_sql.php';?>
	<?php require_once '../funcion_sql/conexion.php';?>
	
</head>

<body>

	<header>

	</header>
	<article>
			<form align="center" name="mod_materia_form" action="mod_materia_form.php" method="post" >
				<?php $con = conectar();?>

				<!-- seleccionar el aula a dar de baja -->
				<label align="left">Seleccione carrera</label>
				
				<?php $result = sql_tabla_materias_carrera($con);?>
				<select name="id_materia">
					<?php foreach ($result as $valor):?>
						<option value="<?php echo $valor['id_ma'];?>">
							<?php echo $valor['nombre_materia']." - ".$valor['nombre_carrera'] ;?>
						</option>
					<?php endforeach;?>
					
				</select>
				
				<br>
				<br>
				<br>

				<input type="submit" value="Cancelar" />
				<input type="submit" value="Modificar" />
				
			
			</form>
		</article>
	
</body>

</html>

<?php
	endif;
?>
