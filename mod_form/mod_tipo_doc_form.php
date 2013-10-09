<?php

	require '../error.php';
	require_once '../funcion_sql/funciones_sql.php';
	require_once '../funcion_sql/conexion.php';

	if('POST' == $_SERVER['REQUEST_METHOD']):
		
	$con = conectar();

	$sql = "SELECT id, descripcion FROM tipo_doc WHERE id = :id_tipo_dni";
			
			$stmt = $con->prepare($sql);
			
			$stmt->bindParam(':id_tipo_dni', $_POST['mod_id_tipo_dni']);
			
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
				<form name="modificar_tipo_doc" method="post" action="../funcion_sql/mod/mod_tipo_doc_sql.php">
					<input type="hidden" name="mod_tipo_doc_id" value="<?php echo $result['id']; ?>">
					<label>Tipo documento</label>
					<input type="text" name='mod_tipo_doc' value="<?php echo $result['descripcion']; ?>" >
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
	<title>Modificar tipo DNI</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	

	<?php require_once '../error.php';?>
	<?php require_once '../funcion_sql/funciones_sql.php';?>
	<?php require_once '../funcion_sql/conexion.php';?>
	
</head>

<body>

	<header>

	</header>
	<article>
			<form align="center" name="mod_tipo_dni_form" action="mod_tipo_doc_form.php" method="post" >
				<?php $con = conectar();?>

				<!-- seleccionar el tipo de documento a modificar -->
				<label align="left">Seleccione tipo documento</label>
				
				<?php $result = sql_tabla_todo($con,"tipo_doc");?>
				<select name="mod_id_tipo_dni">
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
