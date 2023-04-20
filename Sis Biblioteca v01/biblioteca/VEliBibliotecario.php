
<?php

	include('../dbconexion.php');
	$dcodBi = $_POST['vcod'];


	$query= "SELECT * FROM bibliotecario wHERE CodBibliotecario = '$dcodBi'";

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
	<link rel="stylesheet" type="text/css" href="css_l/hoja_EliBibliotecario.css">
	<title></title>
</head>
<body>
	<div id="CEliBi">
		
		<div id="CajaMensaje">
			<h1><strong>Mensaje del Sistema</strong></h1>
			<p>¿Desea el Eliminar del Registro a: <?php echo $usuario;?>?</p>
			<div>
				<button type="button" onclick="DEliminarBi(<?php echo $dcodBi ?>);">Aceptar</button>
				<button type="button" onclick="VistaBibliotecario();">Cancelar</button>
			</div>
		</div>


	</div>

</body>
</html>
