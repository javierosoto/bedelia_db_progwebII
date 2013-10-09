<?php

	require '../error.php';
	require_once '../funcion_sql/funciones_sql.php';
	require_once '../funcion_sql/conexion.php';

	if('POST' == $_SERVER['REQUEST_METHOD']):
		
	$con = conectar();

	$sql = "SELECT id, descripcion FROM estado_alumno WHERE id = :id_est_alumno";
			
			$stmt = $con->prepare($sql);
			
			$stmt->bindParam(':id_est_alumno', $_POST['mod_id_estado_alumno']);
			
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			$stmt->execute();
			
			$result = $stmt->fetch();

			var_dump($result);
?>	
	<html>
		<header align="center">
			<h3>MODIFICACION</h3>
		</header>
		<body>
			<article align="center">
				<form name="modificar_estado_alumno" method="post" action="../funcion_sql/mod/mod_estado_alumno_sql.php">
					<input type="hidden" name="mod_estado_alumno" value="<?php echo $result['id']; ?>">
					<label>Estado alumno</label>
					<input type="text" name="desc_estado_alumno" value="<?php echo $result['descripcion']; ?>" >
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
	<title>Modificar estado alumno</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	

	<?php require_once '../error.php';?>
	<?php require_once '../funcion_sql/funciones_sql.php';?>
	<?php require_once '../funcion_sql/conexion.php';?>
	
</head>

<body>

	<header>

	</header>
	<article>
			<form align="center" name="mod_estado_alumno_form" action="mod_estado_alumno_form.php" method="post" >
				<?php $con = conectar();?>

				<!-- seleccionar el estado del alumno a dar de modificar -->
				<label align="left">Seleccione estado</label>
				
				<?php $result = sql_tabla_todo($con,"estado_alumno");?>
				<select name="mod_id_estado_alumno">
					<?php foreach ($result as $valor):?>
						<option value="<?php echo $valor['id'];?>">
							<?php echo $valor['descripcion'] ;?>
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
