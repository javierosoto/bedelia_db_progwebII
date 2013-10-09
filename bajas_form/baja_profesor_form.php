<?php


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
	<title>Baja profesor</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

	<?php require_once '../error.php';?>
	<?php require_once '../funcion_sql/funciones_sql.php';?>
	<?php require_once '../funcion_sql/conexion.php';?>
	
</head>

<body>

	<header>

	</header>
	<article>
			<form align="center" name="baja_profesor_form" action="../funcion_sql/bajas/baja_profesor_sql.php" method="post" >
				<?php $con = conectar();?>

				<!-- seleccionar el tipo de documento -->
				<label align="left">Seleccione profesor</label>

				
				<!-- selecciona los profesores -->
				<?php $result = sql_profesores_listado($con);?>
				
				<select name="baja_id_profesor">
					<?php foreach ($result as $valor):?>
						<option value="<?php echo $valor['id'];?>">
							<?php $valor['ape_nom'] = str_replace(',',' ', $valor['ape_nom']);?>
							<?php echo "DNI ".$valor['nro_doc']." - ".$valor['ape_nom'] ;?>
						</option>
					<?php endforeach;?>
					
				</select>
				
				<br>
				<br>
				<br>

				<input type="submit" value="Cancelar" onclick="location.href='../abm/abm_profesor.php';" />
				<input type="submit" value="Borrar" />
				
			
			</form>
		</article>
	
</body>

</html>
