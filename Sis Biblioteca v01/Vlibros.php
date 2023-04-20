<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/hoja_libros.css">
<script type="text/javascript" src="js/funcionesLibros.js"></script>
</head>
<body>

<script type="text/javascript">
		$(function ListarDefault(){
			var parametros = {
			"dbusqueda": $("#txtbusqueda").val()
			};

			$.ajax({
			data: parametros,
			url: 'listarlibros.php',
			type: 'POST',
			beforeSend: function(){
			$("#ListaLi").html("Procesando")
			},
			success: function(datos){
			$("#ListaLi").html(datos);
			}
			});


			})
		</script>


	<div id="ContenidoLi">
		
		<div id="DatosLi">
			


			<div id="tablaLi">
				
				<h1>Lista de Libros</h1>
				<div id="busqueda">

					<div id="NuevoLi">

					</div>	

					<div id="BusquedaLi">
					<input type="text" id= "txtbusqueda" name="" placeholder="Titulo,Autor,Género,Editorial">
					<button type="button" onclick="ListarLibros();">Buscar</button>
					
					</div>

					
				</div>

				<div id="ListaLi">
					
				</div>

			</div>


		</div>

	</div>




</body>
</html>