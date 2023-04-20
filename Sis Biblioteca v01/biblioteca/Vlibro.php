<?php
	include("../dbconexion.php");

	$tabla = $cnmysql->query('SELECT * FROM libros');

	$NroLibros = mysqli_num_rows($tabla);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css_l/hoja_libro.css">
<script type="text/javascript" src="js/funcioneslibro.js"></script>
</head>
<body>

<script type="text/javascript">
		$(function ListarDefault(){
			var parametros = {
			"dbusqueda": $("#txtbusqueda").val()
			};

			$.ajax({
			data: parametros,
			url: 'listarLibro.php',
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
					<button onclick="VNuevoLi();">Agregar Libro</button>
					<button onclick="VistaDetalleAutor();">Opciones de Autor</button>
					<button onclick="VistaDetalleEditorial();">Opciones de Editorial</button>
					<button onclick="VistaDetalleGenero();">Opciones de Género</button>
					</div>	

					<div id="BusquedaLi">
					<input type="text" id= "txtbusqueda" name="" placeholder="Titulo,Autor,Editorial,Genero">
					<button type="button" onclick="ListarLibro();">Buscar</button>
					
					</div>

					
				</div>

				<div id="ListaLi">
					
				</div>


				<p id="NroLibros"><?php echo "Cantidad de Libros: " .$NroLibros; ?></p>

			</div>


		</div>

	</div>




</body>
</html>