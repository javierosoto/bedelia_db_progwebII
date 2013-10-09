<?php


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
	<title>Baja materia</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	

	<?php require_once '../error.php';?>
	<?php require_once '../funcion_sql/funciones_sql.php';?>
	<?php require_once '../funcion_sql/conexion.php';?>
	
</head>

<body>

	<header>

	</header>
	<article>
			<form align="center" name="baja_persona_form" action="baja_materia_sql.php" method="post" >
				<?php $con = conectar();?>

				<!-- seleccionar el aula a dar de baja -->
				<label align="left">Seleccione materia</label>
				
				<?php $result = sql_tabla_todo($con,"materia");?>
				<select name="baja_id_materia">
					<?php foreach ($result as $valor):?>
						<option value="<?php echo $valor['id'];?>">
							<?php echo $valor['nombre_materia'] ;?>
						</option>
					<?php endforeach;?>
					
				</select>
				
				<br>
				<br>
				<br>

				<input type="submit" value="Cancelar" />
				<input type="submit" value="Borrar" />
				
			
			</form>
		</article>
	
</body>

</html>
