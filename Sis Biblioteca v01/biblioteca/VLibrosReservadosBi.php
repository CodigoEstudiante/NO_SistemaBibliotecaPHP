<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css_l/hoja_librosreservadobi.css">
</head>
<body>

<script type="text/javascript">
		$(function ListarDefault(){
			var parametros = {
			"dbusqueda": $("#txtbusqueda").val()
			};

			$.ajax({
			data: parametros,
			url: 'listarLibrosReservadosBi.php',
			type: 'POST',
			beforeSend: function(){
			$("#ListaLRSBi").html("Procesando")
			},
			success: function(datos){
			$("#ListaLRSBi").html(datos);
			}
			});


			})


			function imprSelec(nombre) {
			  var ficha = document.getElementById(nombre);//obtenemos el objeto a imprimir
			  var ventimp = window.open(' ', 'popimpr'); //abrimos una ventana vacía nueva
			  ventimp.document.write( ficha.innerHTML ); //imprimimos el HTML del objeto en la nueva ventana
			  ventimp.document.close(); //cerramos el documento
			  ventimp.print( ); //imprimimos la ventana
			  ventimp.close(); //cerramos la ventana

			}



</script>


	<div id="ContenidoLRSBi">
		
		<div id="DatosLRSBi">
			


			<div id="tablaLRSBi">
				
				<h1>Libros Reservados</h1>
				<div id="busqueda">

					<div id="NuevoLRSBi">
					<button onclick="imprSelec('ListaLRSBi');">Imprimir</button>
					<button onclick="ListarPorFecha();">Ver por Fecha Limite</button>
					</div>	

					<div id="BusquedaLRSBi">
					<input type="text" id= "txtbusqueda" name="" placeholder="Nro Carnet Lector">
					<button type="button" onclick="ListarLibrosReservadosBi();">Buscar</button>
					
					</div>

					
				</div>

				<div id="ListaLRSBi">
					
				</div>



			</div>


		</div>

	</div>




</body>
</html>