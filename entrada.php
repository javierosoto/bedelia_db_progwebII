<html>
	<head>
	<div class="logo_udc" align="center">
		<img src="udc.png" height="100" width="500">
	</div>
	</head>
	
	<body>
		<div name="entrada" align="center">
			<form name="ingreso" action="index.php" method="post">
				<fieldset > 
					<!-- ********** primer consulta ************ -->
					<?php try {
							$pdo = new PDO('mysql:host=localhost;
											dbname=bedelia_db', 'root', 'root');
							
					} catch (Exception $exc) {
							die("Error :").$exc->getMessage();
					}
							try {
								//armamos el sql que da las materias dictadas por el profesor
								$sql = "select
											p.id, p.ape_nom, p.nro_doc, ma.nombre_materia 
										from
											persona as p, profesor as pr, comision as co, materia as ma, carrera ca
										where
											p.nro_doc = :documento and
											pr.persona_id = p.id and
											co.profesor_id = pr.id and
											co.materia_id = ma.id group by ma.nombre_materia";

								//preparamos un statement con el sql anterior
								$stmt = $pdo->prepare($sql);

								//especificamos 
								$stmt->setFetchMode(PDO::FETCH_ASSOC);

								$stmt->bindParam(':documento', $_POST['nro_doc']);

								$stmt->execute();

								$results_materias = $stmt->fetchAll();		

						} catch (Exception $e) {
								echo 'Error de conexion a la DB:'.$e->getMassage();
								die();
						}
						
					?>
					<legend><h1>Entrada </h1></legend>
					
					<br>
					<label>Materia </label>
					<select> 
					<option><?php echo 'Seleccione materia';?></option>

							<?php foreach ($results_materias as $materia):?>
								<option><?php echo $materia['nombre_materia'];?></option>
							<?php endforeach;?>
						?>
					</select>
					<br>
					<br>
					<?php
						try {


							//armamos el sql para las aulas 
							$sql_aulas = "select
										*
									from
										aula as a";

							//preparamos un statement con el sql anterior
							$stmt_aulas = $pdo->prepare($sql_aulas);

							//especificamos 
							$stmt_aulas->setFetchMode(PDO::FETCH_ASSOC);

							

							$stmt_aulas->execute();

							$results_aulas = $stmt_aulas->fetchAll();		

							} catch (Exception $e) {
									echo 'Error de conexion a la DB:'.$e->getMassage();
									die();

							}				
							?>
					<label>Aula </label>
					<select>
						<option><?php echo 'Seleccione aula';?></option>

							<?php foreach ($results_aulas as $aula):?>
								<option><?php echo $aula['descripcion_aula'];?> </option>
							<?php endforeach;?>
					</select>
					<br>
					<br>
					<button type="submit" name="cancelar"> Cancelar </button>
					<button type="submit" autofocus="True" name="aceptar"> Aceptar </button>
				</fieldset>
			</form>
		</div>
		<div name="error" align="center" style="color:red">
			<h1><label> <?php echo $error; ?> </label></h1>
		</div>
	</body>
</html>
