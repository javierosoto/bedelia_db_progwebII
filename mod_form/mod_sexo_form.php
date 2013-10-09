<?php

	require '../error.php';
	require_once '../funcion_sql/funciones_sql.php';
	require_once '../funcion_sql/conexion.php';

	if('POST' == $_SERVER['REQUEST_METHOD']):
		
	$con = conectar();

	$sql = "SELECT id, descripcion_sexo FROM sexo WHERE id = :id_sexo";
			
			$stmt = $con->prepare($sql);
			
			$stmt->bindParam(':id_sexo', $_POST['mod_id_sexo']);
			
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
				<form name="modificar_sexo" method="post" action="../funcion_sql/mod/mod_sexo_sql.php">
					<input type="hidden" name="mod_sexo" value="<?php echo $result['id']; ?>">
					<label>Sexo:</label>
					<input type="text" name="desc_sexo" value="<?php echo $result['descripcion_sexo']; ?>" >
					<br>
					
					<button type="submit">Modificar</button>
				</form>
			</article>
		</body>
	</html>
	
<?php
	else:
?>

<!DOCTYPE html>

	<head>
	<title>Modificar sexo</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />


	<?php require_once '../error.php';?>
	<?php require_once '../funcion_sql/funciones_sql.php';?>
	<?php require_once '../funcion_sql/conexion.php';?>

	</head>

	<body>

	<header>

	</header>
	<article>
			<form align="center" name="baja_sexo_form" action="mod_sexo_form.php" method="post" >
				<?php $con = conectar();?>

				<!-- seleccionar el sexo a dar de baja -->
				<label align="left">Seleccione sexo</label>
				
				<?php $result = sql_tabla_todo($con,"sexo");?>
				<select name="mod_id_sexo">
					<?php foreach ($result as $valor):?>
						<option value="<?php echo $valor['id'];?>">
							<?php echo $valor['descripcion_sexo'] ;?>
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
