
<?php
$fecha = date('Y-m-d');
$nuevafecha = strtotime ( '-1 day' , strtotime ( $fecha ) ) ;
$nuevafechaYear = strtotime ( '+1 year' , strtotime ( $fecha ) ) ;

$FechaActual = date ( 'Y-m-d' , $nuevafecha );
$FechaMaxima = date ( 'Y-m-d' , $nuevafechaYear );



	include('../dbconexion.php');

	$dcodReserva = $_POST['vcod'];

	$query1 = "
	SELECT LE.CodLector AS 'CodLector', LE.Nro_Carnet AS 'Nro_Carnet', LI.CodLibro AS 'CodLibro' 
	FROM reservas RE
	INNER JOIN lector LE ON LE.CodLector = RE.CodLector
	INNER JOIN libros LI ON LI.CodLibro = RE.CodLibro
	WHERE
	RE.CodReserva = '$dcodReserva';
	";


	session_start();
	$CodBi = $_SESSION["idb"];

	$query2 = "SELECT Nro_Carnet FROM bibliotecario wHERE CodBibliotecario = '$CodBi'";
	$resultado2 = $cnmysql->query($query2);
	$dato2 = mysqli_fetch_array($resultado2);


	$resultado1 = $cnmysql->query($query1);
	$dato1 = mysqli_fetch_array($resultado1);


	$CodLe = $dato1['CodLector'];

	$carnetBi  = $dato2['Nro_Carnet'];
	$carnetLe  = $dato1['Nro_Carnet'];
	$codLibro = $dato1['CodLibro'];


?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css_l/hoja_prestamoporreserva.css">
	<meta charset="utf-8">
	<title></title>
</head>


<body>
	<div id="ContPrestamo">

		<div id="ContDatos">
			<h1>Préstamo</h1>
			<form id="FormPrestamo">
					<input type="hidden" id="txtCodReserva" value="<?php echo $dcodReserva; ?>">
				<div>
					<label for="txtCarnetBi">Carnet Bibliotecario:</label>
					<input type="hidden" value="<?php echo $CodBi; ?>" id="txtCodBi">
					<input type="text" id="txtCarnetBi" value="<?php echo $carnetBi; ?>" readonly>
				</div>

				<div>
					<label for="txtCarnetLe">Nro Carnet Lector:</label>
					<input type="hidden" value="<?php echo $CodLe; ?>" id="txtCodLe">
					<input type="text" id="txtCarnetLe" value="<?php echo $carnetLe; ?>" readonly>

				</div>

				<div>
					<label for="dtpFecha">Fecha Devolucion:</label>
					<input type="date" id="dtpFecha" step="1" min="<?php $FechaActual; ?>" max="<?php echo $FechaMaxima; ?>" value="<?php echo $FechaActual; ?>">
				</div>

				<div>
					<label for="txtCodLibro">Código Libro:</label>

					<input type="text" id="txtCodLibro" value="<?php echo $codLibro; ?>" readonly>

				</div>


				<div id="botones">
					<button type="button" onclick="GuardarPrestamoPorReserva();">Guardar Préstamo</button>
					<button type="button" onclick="VistaLibrosReservadosBi();">Cancelar Préstamo</button>
				</div>

			</form>

		</div>
		

</body>
</html>