<html>
	<!--//defino arreglo con los tipos de documentos//-->
<?php $tipo_doc = array ( "DNI", "DU","LE","LC", "PAS"); ?>
	<!-- Seteo la variable error si no lo esta -->
<?php if (!isset($error))
		$error="";?>

	<body> 
		<head>
			<div class="logo_udc" align="center">
				<img src="udc.png" height="100" width="500">
			</div>
		</head>
	
	
		<div name="ingreso" align="center">
			<form name="ingreso" action="index.php" method="post">
				<fieldset > 
					<br>
					<br>
					<select name="tipo_docu">
						<?php foreach ($tipo_doc as $doc):?>
							<option><?php echo $doc;?> </option>
						<?php endforeach;?>
					</select>
					<input type="text" name="nro_doc" value="Ingrese documento" onfocus="true;">
					<button type="submit"> Enviar </button>
					<br>
					<br>					
					<br>
				</fieldset>
			</form>
		</div>
		
		<div name="error" align="center" style="color:red">
			<h1><label> <?php echo $error; ?> </label></h1>
		</div>
	</body>


</html>

