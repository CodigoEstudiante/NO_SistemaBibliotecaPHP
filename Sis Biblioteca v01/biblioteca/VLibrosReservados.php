<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css_l/hoja_librosreservados.css">
</head>
<body>

<script type="text/javascript">
		$(function ListarDefault(){
			var parametros = {
			"dbusqueda": $("#txtbusqueda").val()
			};

			$.ajax({
			data: parametros,
			url: 'listarLibrosReservados.php',
			type: 'POST',
			beforeSend: function(){
			$("#ListaLRS").html("Procesando")
			},
			success: function(datos){
			$("#ListaLRS").html(datos);
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


	<div id="ContenidoLRS">
		
		<div id="DatosLRS">
			


			<div id="tablaLRS">
				
				<h1>Libros Reservados</h1>
				<div id="busqueda">

					<div id="NuevoLRS">
					<button onclick="imprSelec('ListaLRS');">Imprimir</button>
					</div>	

					<div id="BusquedaLRS">
					<input type="text" id= "txtbusqueda" name="" placeholder="Titulo">
					<button type="button" onclick="ListarLibrosReservados();">Buscar</button>
					
					</div>

					
				</div>

				<div id="ListaLRS">
					
				</div>



			</div>


		</div>

	</div>




</body>
</html>