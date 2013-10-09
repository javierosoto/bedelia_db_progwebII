<?php

	require '../error.php';
	require_once '../funcion_sql/funciones_sql.php';
	require_once '../funcion_sql/conexion.php';

	if('POST' == $_SERVER['REQUEST_METHOD']):
		
	$con = conectar();

	$sql = "SELECT id, descripcion_cargo FROM cargo WHERE id = :id_cargo";
			
			$stmt = $con->prepare($sql);
			
			$stmt->bindParam(':id_cargo', $_POST['mod_id_cargo']);
			
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
				<form name="modificar_cargo" method="post" action="../funcion_sql/mod/mod_cargo_sql.php">
					<input type="hidden" name="mod_cargo" value="<?php echo $result['id']; ?>">
					<label>Cargo</label>
					<input type="text" name="desc_cargo" value="<?php echo $result['descripcion_cargo']; ?>" >
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
	<title>Modificar cargo</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	

	<?php require_once '../error.php';?>
	<?php require_once '../funcion_sql/funciones_sql.php';?>
	<?php require_once '../funcion_sql/conexion.php';?>
	
</head>

<body>

	<header>

	</header>
	<article>
			<form align="center" name="mod_cargo_form" action="mod_cargo_form.php" method="post" >
				<?php $con = conectar();?>

				<!-- seleccionar el cargo a modificar -->
				<label align="left">Seleccione cargo</label>
				
				<?php $result = sql_tabla_todo($con,"cargo");?>
				<select name="mod_id_cargo">
					<?php foreach ($result as $valor):?>
						<option value="<?php echo $valor['id'];?>">
							<?php echo $valor['descripcion_cargo'] ;?>
						</option>
					<?php endforeach;?>
					
				</select>
				
				<br>
				<br>
				<br>

			
				<input type="submit" value="Cancelar" onclick="location.href='../abm/abm_cargo.php';" />
				<input type="submit" value="Modificar"/>
				
			
			</form>
		</article>
	
</body>

</html>
<?php
	endif;
?>
