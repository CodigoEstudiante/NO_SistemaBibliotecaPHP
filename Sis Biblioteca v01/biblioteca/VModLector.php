
<?php

	include('../dbconexion.php');
	$dcodLe = $_POST['vcod'];


	$query= "SELECT * FROM lector wHERE CodLector = '$dcodLe'";

	$resultado = $cnmysql->query($query);

	$fila = mysqli_fetch_array($resultado);

	$Nombres = $fila['Nombres'];
	$Apellidos = $fila['Apellidos'];
	$Direccion = $fila['Direccion'];
	$Email = $fila['Email'];
	$Telefono = $fila['Telefono'];





?>




<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css_l/hoja_ModLector.css">
	<title></title>
</head>
<body>
	<div id="CModLe">
		
		<div id="formulario">
			<h1>Modificar Lector</h1>
			<form>
			<input type="hidden" id="txtcod" value="<?php echo $dcodLe ;?>">
			<div>
			<label for="txtnombres">Nombres:</label>
			<input type="text" required id="txtnombres" value="<?php echo $Nombres ;?>" >
			</div>

			<div>
			<label for="txtapellidos">Apellidos:</label>
			<input type="text" required id="txtapellidos" value="<?php echo $Apellidos ;?>" >	
			</div>

			<div>
			<label for="txtdireccion">Dirección:</label>
			<input type="text" required id="txtdireccion" value="<?php echo $Direccion ;?>" >	
			</div>

			<div>
			<label for="txtemail">Email:</label>
			<input type="text" required id="txtemail" value="<?php echo $Email;?>" >	
			</div>

			<div>
			<label for="txttelefono">Telefono:</label>
			<input type="numb" required id="txttelefono" value="<?php echo $Telefono ;?>" min="1" >	
			</div>



			<div id= 'botones'>
				<button type="button" onclick="DModificarLe();">Aceptar Cambios</button>
				<button type="button" onclick="VistaLector();">Cancelar Cambios</button>
			</div>
			

			</form>
		
			

		</div>

	</div>

</body>
</html>