<html>
	
	<head>
	<div class="logo_udc" align="center">
		<img src="udc.png" height="100" width="500">
	</div>
	</head>
	
	<body>
		<div name="salida" align="center">
			<form name="salida" action="index.php" method="post">
				<fieldset >
					<legend><h1>Salida <?php echo $_POST['ape_nom'];?></h1></legend>
					
					
					<br>
					
					<label>Materia <?php echo $_POST['materia'];?></label>
					<br>
					<label>Aula<?php echo $_POST['aula'];?></label>
					<br>
					
						<input type="text" name="temas_dados" value="Ingrese el tema o los temas dados">
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