<?php

	include('../dbconexion.php');
	$dcodLe = $_POST['vcod'];


	$query= "SELECT * FROM Lector wHERE CodLector = '$dcodLe'";

	$resultado = $cnmysql->query($query);

	$fila = mysqli_fetch_array($resultado);

	$Nombres = $fila['Nombres'];
	$Apellidos = $fila['Apellidos'];
	
	$usuario = $Nombres ." " .$Apellidos;


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css_l/hoja_EliLector.css">
	<title></title>
</head>
<body>
	<div id="CEliLe">
		
		<div id="CajaMensaje">
			<h1><strong>Mensaje del Sistema</strong></h1>
			<p>¿Desea el Eliminar del Registro a: <?php echo $usuario;?>?</p>
			<div>
				<button type="button" onclick="DEliminarLe(<?php echo $dcodLe ;?>);">Aceptar</button>
				<button type="button" onclick="VistaLector();">Cancelar</button>
			</div>
		</div>


	</div>

</body>
</html>
