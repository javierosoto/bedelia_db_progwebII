<?php

	require '../error.php';
	require_once '../funcion_sql/funciones_sql.php';
	require_once '../funcion_sql/conexion.php';

	if('POST' == $_SERVER['REQUEST_METHOD']):
		
	$con = conectar();

	/*
	 * sql para traer los datos de la persona
	 */
	 
	$sql = "SELECT
				p.id, p.nro_doc, p.ape_nom, p.direccion, p.fecha_nac, se.id AS id_sexo,
				se.descripcion_sexo, td.id AS id_tipo_doc, td.descripcion, pr.id AS id_prof,
				pr.cargo_id, ca.descripcion_cargo
			FROM
				persona AS p, tipo_doc AS td, sexo AS se, cargo AS ca, profesor AS pr
			WHERE
				p.id = :id_persona 
				AND p.sexo_id = se.id
				AND p.tipo_doc_id = td.id
				AND pr.persona_id = p.id";

						
			$stmt = $con->prepare($sql);
			
			$stmt->bindParam(':id_persona', $_POST['mod_id_pers']);
			
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
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
				<form name="modificar_persona" method="post" action="../funcion_sql/mod/mod_profesor_sql.php">
					<input type="hidden" name="mod_id_pers" value="<?php echo $result['id']; ?>">

					<!-- consulta a la tabla tipo documento -->
					<?php $result_sexo = sql_tabla_todo($con,"tipo_doc"); ?>

					<!-- modifica el tipo de documento -->
					<label>Tipo documento</label>
						<select name="mod_tipo_doc">
							<?php foreach ($result_sexo as $valor):?>
							
									<?php if ($valor['descripcion'] == $result['descripcion']):?>
										<option value="<?php echo $valor['id'];?>" selected>
									<?php else: ?>
										<option value="<?php echo $valor['id'];?>">
									<?php endif;?>
									
									<?php echo $valor['descripcion'];?>
								</option>
								
						<?php endforeach;?>
						</select>
					<br>

					<label>Numero documento</label>
					<input type="text" name="nro_doc" size="10" value="<?php echo $result['nro_doc']; ?>" >
					<br>

					<?php $apellido_nombre = explode (',', $result['ape_nom']);?>
					<!-- modifica el apellido -->
					<label>Apellido</label>
					<input type="text" name="apellido" size="50" value="<?php echo $apellido_nombre[0]; ?>" >
					<br>

					<!-- modifica el nombre -->
					<label>Nombre</label>
					<input type="text" name="nombre" size="50" value="<?php echo $apellido_nombre[1]; ?>" >
					<br>

					<!-- modifica la direccion -->
					<label>Direccion</label>
					<input type="text" name="direccion"  size="50" value="<?php echo $result['direccion']; ?>" >
					<br>

					<!-- modifica la fecha de nacimiento -->
					<label>Fecha nacimiento</label>
					<input type="date" name="fecha_nac" value="<?php echo $result['fecha_nac']; ?>" >
					<br>

					<!-- modifica el sexo -->
					<label>Sexo</label>
					<?php $result_sexo = sql_tabla_todo($con,"sexo"); ?>
					<select name="mod_sexo">
						<?php foreach ($result_sexo as $valor):?>
							<?php if ($valor['descripcion_sexo'] == $result['descripcion_sexo']):?>
								<option value="<?php echo $valor['id'];?>" selected>
							<?php else:?>
								<option value="<?php echo $valor['id'];?>">
							<?php endif;?>
								<?php echo $valor['descripcion_sexo'];?>
							</option>
						<?php endforeach;?>
					
					</select>

					<br>

					<!-- modifica el cargo del profesor -->
					<label align="left">Cargo</label>
					<?php $result_cargo = sql_tabla_todo($con,"cargo");?>
					<select name="opt_cargo">
							<?php foreach ($result_cargo as $valor):?>
								<?php if ($valor['descripcion_cargo'] == $result['descripcion_cargo']):?>
									<option value="<?php echo $valor['id'];?>" selected>
								<?php else:?>
									<option value="<?php echo $valor['id'];?>">
								<?php endif;?>
									<?php echo $valor['descripcion_cargo'];?>
								</option>
							<?php endforeach;?>
						
					</select>


					
					<br>
					<br>

					<input type="submit" value="Cancelar" onclick="location.href='../abm/abm_profesor.php';"/>
					<input type="submit" value="Modificar" />
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
			<form align="center" name="mod_persona_form" action="mod_profesor_form.php" method="post" >
				<?php $con = conectar();?>

				<!-- seleccionar el tipo de documento -->
				<label align="left">Seleccione persona</label>
				
				<?php $result = sql_profesores_listado($con);?>
				<select name="mod_id_pers">
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


				<input type="submit" value="Cancelar" onclick="location.href='../abm/abm_profesor.php';"/>
				<input type="submit" value="Modificar" />
				
			
			</form>
		</article>
	
</body>

</html>
<?php
	endif;
?>
