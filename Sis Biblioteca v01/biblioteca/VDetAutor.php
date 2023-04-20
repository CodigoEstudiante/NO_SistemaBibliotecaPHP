<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css_l/hoja_DetAutor.css">
	<title></title>
	<meta charset="utf-8">
</head>

<script type="text/javascript">

		$(function ListarDefault(){
			var parametros = {};

			$.ajax({
			data: parametros,
			url: 'listarAutor.php',
			type: 'POST',
			beforeSend: function(){
			$("#listAutores").html("Procesando")
			},
			success: function(datos){
			$("#listAutores").html(datos);
			}
			});


		})

		function tiempoReal(){

			var tabla = $.ajax({

				url:"listarAutor.php",
				datatype:"text",
				async:false,
			}).responseText;

			document.getElementById("listAutores").innerHTML = tabla;
		}

		setInterval(tiempoReal, 1000);
		

</script>


<body>
	<div id="contenidoDetAutor">
		<div id="cajaMayor">
			<h1>Opciones de Autor</h1>

			<div id="caja1">
				<fieldset>
					<legend>Lista de Autores</legend>
					<div id="listAutores">
						
					</div>
				</fieldset>
			</div>

			<div id="caja2">

				<div id="agregarAutor">

					<form id="FormAgregarAutor">
						<input type="text" name="txtautor" id="txtautor" placeholder="Nuevo Autor" required>
						<button type="button" onclick="GuardarAutor();">Agregar Autor</button>
					</form>

				</div>


				<hr>


				<div id="modificarAutor">

					<form id="FormModificarAutor">
						
							<input type="text" id="txtcodautorMod" placeholder="Codigo de Autor" required>
							<input type="text" id="txtautorMod" placeholder="Cambiar Nombre por..." required>
						
						<button type="button" onclick="ModificarAutor();">Modificar Autor</button>
					</form>

				</div>

				
				<hr>


				<div id="EliminarAutor">
					<form id="FormEliminarAutor">
						<input type="text" id="txtcodautorEli" placeholder="Ingrese Codigo de Autor" required>
						<button type="button" onclick="EliminarAutor();" >Eliminar Autor</button>
					</form>
				</div>

			</div>

			<div id="CajaMensaje">

			</div>

			<div id="Regreso">
				<button onclick="VistaLibro();"> Volver </button>
			</div>

	


		</div>

	</div>

</body>
</html>