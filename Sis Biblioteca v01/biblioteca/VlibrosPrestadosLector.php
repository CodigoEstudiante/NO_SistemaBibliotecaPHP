<!DOCTYPE html>
<html>
<head>

	<script type="text/javascript">
		

			function imprSelec(nombre) {
			  var ficha = document.getElementById(nombre);//obtenemos el objeto a imprimir
			  var ventimp = window.open(' ', 'popimpr'); //abrimos una ventana vacía nueva
			  ventimp.document.write( ficha.innerHTML ); //imprimimos el HTML del objeto en la nueva ventana
			  ventimp.document.close(); //cerramos el documento
			  ventimp.print( ); //imprimimos la ventana
			  ventimp.close(); //cerramos la ventana

			}
	</script>
	

	
	<title></title>

	<link rel="stylesheet" type="text/css" href="css_l/hoja_librosPrestadosLector.css">
</head>
<body>

<script type="text/javascript">
		$(function ListarDefault(){
			var parametros = {};

			$.ajax({
			data: parametros,
			url: 'listarlibrosprestadoslector.php',
			type: 'POST',
			beforeSend: function(){
			$("#ListaLPL").html("Procesando")
			},
			success: function(datos){
			$("#ListaLPL").html(datos);
			}
			});



		})



</script>


	<div id="ContenidoLPL">
		
		<div id="DatosLPL">
			


			<div id="tablaLPL">
				
				<h1>Mis Libros Prestados</h1>
				<div id="busqueda">




					<div id="ImprimirLPL">
					<button onclick="imprSelec('ListaLPL');">Imprimir</button>
					</div>	

					<!--<div id="BusquedaLR">
					<input type="text" id="txtbusqueda" name="" placeholder="Nro Carnet Lector">
					<button type="button" onclick="ListarLibrosDevueltos();">Buscar</button>
					</div>-->


					
				</div>

				<div id="ListaLPL">
					
				</div>

			</div>


		</div>

	</div>




</body>
</html>