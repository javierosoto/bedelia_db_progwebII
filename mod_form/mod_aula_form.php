<?php
	require_once '../error.php';
	require_once '../funcion_sql/funciones_sql.php';
	require_once '../funcion_sql/conexion.php';

	if('POST' == $_SERVER['REQUEST_METHOD']):
		
	$con = conectar();

	$sql = "SELECT id, descripcion_aula FROM aula WHERE id = :id_aula";
			
			$stmt = $con->prepare($sql);
			
			$stmt->bindParam(':id_aula', $_POST['mod_id_aula']);
			
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
				<form name="modificar_aula" method="post" action="../funcion_sql/mod/mod_aula_sql.php">
					<input type="hidden" name="mod_sexo" value="<?php echo $result['id']; ?>">
					<label>Aula</label>
					<input type="text" name='desc_aula' value="<?php echo $result['descripcion_aula']; ?>" >
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
	<title>Modificar aula</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	

	<?php require_once '../error.php';?>
	<?php require_once '../funcion_sql/funciones_sql.php';?>
	<?php require_once '../funcion_sql/conexion.php';?>
	
</head>

<body>

	<header>

	</header>
	<article>
			<form align="center" name="baja_persona_form" action="mod_aula_form.php" method="post" >
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
