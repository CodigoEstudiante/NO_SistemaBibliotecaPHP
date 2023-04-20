
<?php
$fecha = date('Y-m-d');

$nuevafecha = strtotime ( '-1 day' , strtotime ( $fecha ) ) ;
$nuevafechaYear = strtotime ( '+1 year' , strtotime ( $fecha ) ) ;

$FechaActual = date ( 'Y-m-d' , $nuevafecha );
$FechaMaxima = date ( 'Y-m-d' , $nuevafechaYear );

	include('../dbconexion.php');

	$id = $_POST['cod'];

	$query= "SELECT Nro_Carnet FROM bibliotecario wHERE CodBibliotecario = '$id'";

	$resultado = $cnmysql->query($query);


	$fila = mysqli_fetch_array($resultado);

	$carnet  = $fila['Nro_Carnet'];

	/*LISTA PARA LOS LECTORES*/

	$lectores = $cnmysql->query("SELECT * FROM lector");

?>
<script type="text/javascript">
	var carnetBi = '<?php echo $carnet ;?>'
	$('#txtCarnetBi').val(carnetBi);
</script>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css_l/hoja_prestamo.css">
	<meta charset="utf-8">
	<title></title>
</head>


<script type="text/javascript">
	
	$(function VistaDefault(){

		var parametros = {
			"dbusqueda": $("#txtbusqueda").val()
		};

		$.ajax({
			data: parametros,
			url: 'listarStockLibros.php',
			type: 'POST',
			beforeSend: function(){
				$("#ListaLibros").html("Procesando")
			},
			success: function(datos){
				$("#ListaLibros").html(datos);
			}
		});
		}
	)




</script>
<body>
	<div id="ContPrestamo">

		<div id="ContDatos">
			<h1>Préstamo</h1>
			<form id="FormPrestamo">

				<div>
					<label for="txtCarnetBi">Carnet Bibliotecario:</label>
					<input type="hidden" value="<?php echo $id; ?>" id="txtCodBi">
					<input type="text" id="txtCarnetBi" readonly>
				</div>

				<div>
					<label for="txtCarnetLe">Nro Carnet Lector:</label>
					<div>
						<select class="js-example-basic-single" id="cboLector">
						<?php

							while ($fila = mysqli_fetch_array($lectores)) {

								echo "<option value='" .$fila['CodLector'] ."'>" .$fila['Nro_Carnet'] ."</option>";			
							}
						?>
						</select>
					
						<button type="button" onclick="VerificarLector()">Verificar</button>
					</div>
					
				</div>

				<div id="MsjVerificarLector">
					
				</div>

				<div>
					<label for="dtpFecha">Fecha Devolucion:</label>
					<input type="date" id="dtpFecha" step="1" min="<?php echo $FechaActual; ?>" max="<?php echo $FechaMaxima; ?>" value="<?php echo $FechaActual; ?>">
				</div>

				<div>
					<label for="txtCodLibro">Código Libro:</label>
					<div>
						<input type="number" id="txtCodLibro" min="1">
						
					</div>
				</div>

				<div id="MsjVerificarLibro">
					
				</div>

				<div id="botones">
					<button type="button" onclick="GuardarPrestamo();">Guardar Préstamo</button>
					<button type="button" onclick="VistaInicio();">Cancelar Préstamo</button>
				</div>

				<div id="MsjVerificarPrestamo">
					
				</div>
			</form>

		</div>
		

		<div id="ContListLibros">
			<h1>Lista de Libros</h1>
			<div id="busqueda">
								
				<input type="text" id="txtbusqueda" placeholder="Titulo,Autor,Editorial,Genero">
				<button type="button" onclick="ListarStockLibro();">Buscar</button>
							
			
			</div>


			<div id="ListaLibros">
				
			</div>

		</div>
	</div>


</body>
</html>