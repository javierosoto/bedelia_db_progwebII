<?php
	try {
		
		$pdo = new PDO('mysql:host=localhost;
						dbname=bedelia_db', 'root', 'root');
							
		} catch (Exception $exc) {
			die("Error :").$exc->getMessage();
	}

	//consulta sql para ver si existe el docuemnto 
	try {
			//armamos el sql que da las materias dictadas por el profesor
			$sql = "select
						p.id, p.ape_nom, p.nro_doc, ma.nombre_materia,
						fi.fecha_hora_entrada, fi.fecha_hora_salida
					from
						persona as p, profesor as pr, comision as co,
						materia as ma, fichaje as fi
					where
						p.nro_doc = :documento and
						pr.persona_id = p.id and
						co.profesor_id = pr.id and
						co.materia_id = ma.id and
						fi.comision_id = co.id";


			//preparamos un statement con el sql anterior
			$stmt = $pdo->prepare($sql);

			//especificamos 
			$stmt->setFetchMode(PDO::FETCH_ASSOC);

			$stmt->bindParam(':documento', $_POST['nro_doc']);

			$stmt->execute();

			$results = $stmt->fetchAll();		

	} catch (Exception $e) {
			echo 'Error de conexion a la BBDD: '.$e->getMassage();
			die();
	}
	echo sprintf("%d",count($results));
	if (count($results) == 1){
		require 'salida.php';
	}else{
		require 'entrada.php';
	}