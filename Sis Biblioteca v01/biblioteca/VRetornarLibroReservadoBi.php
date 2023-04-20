<?php

	include('../dbconexion.php');
	$dcodRe = $_POST['vcod'];



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css_l/hoja_RetornarLibroPrestado.css">
	<title></title>
</head>
<body>
	<div id="CEliRe">
		
		<div id="CajaMensaje">
			<h1><strong>Mensaje del Sistema</strong></h1>

				
				

			<p>¿Desea Cancelar la Reserva de Este Libro?</p>
			<div>
				<button type="button" onclick="DRetornarLibroReservadoBi(<?php echo $dcodRe; ?>);">Aceptar</button>
				<button type="button" onclick="VistaLibrosReservadosBi();">Cancelar</button>
			</div>
		</div>


	</div>

</body>
</html>
