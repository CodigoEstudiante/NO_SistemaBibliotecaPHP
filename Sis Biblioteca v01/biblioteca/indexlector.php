
<?php 


	include('../dbconexion.php');
	session_start();
	$id = $_SESSION["idl"];
	/*$id = $_GET["id"];*/

	$query= "SELECT Nombres, Apellidos, Nro_Carnet FROM lector wHERE CodLector = '$id'";

	$resultado = $cnmysql->query($query);

	$fila = mysqli_fetch_array($resultado);

	$nombre = $fila['Nombres'];
	$apellidos = $fila['Apellidos'];
	$carnet  = $fila['Nro_Carnet'];


	$texto = "Lector: " .$nombre ." " .$apellidos ." | " ."Nro Carnet: " .$carnet;





?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/vistas.js"></script>
	<script type="text/javascript" src="js/funcionesAccionesLector.js"></script>
	<link rel="stylesheet" href="css_l/hoja_index_lector.css">
	<title>Sistema de Biblioteca</title>



</head>

	<script type="text/javascript">

		function AbrirVentaLogin(){
			document.forms['formingreso'].reset();

			$("#ventanalogin").slideDown("slow");
			$('#formdatos').slideDown('fast');


		}

		function CerrarVentaLogin(){
			document.forms['formingreso'].reset();
			$("#ventanalogin").slideUp("fast");
			$('#msj').hide('fast');
		}

		function CambiarContrasena(){
			var parametros = {
				"Aclve" : $('#txtclave').val(),
				"Nclve" : $('#txtnclave').val(),
				"Cclve" : $('#txtcclave').val()
			};

			$.ajax({
				data: parametros,
				url: 'DcambiarContrasena.php',
				type: 'POST',
				beforeSend: function(){
					$("#msj").html("Procesando")
				},
				success: function(msje){
					$("#msj").slideDown("fast");
					$('#msj').html(msje);
				}
			});



		}


	</script>


<body onload="VistaInicio()">
	<div id="contenedor">

	


		<div id="ventanalogin">
			

			<div id="formlogin">

				<div id="cerrar"><a href="javascript:CerrarVentaLogin();">Cerrar X</a></div>

				<h1>Cambiar Contraseña</h1>
				<hr><br>

				<form method="POST" name="formingreso" id="formcontra">
					<div id="formdatos">
						<input type="password" id="txtclave" placeholder="Contraseña" required>
						<input type="password" id="txtnclave" placeholder="Nueva Contraseña" required>
						<input type="password" id="txtcclave" placeholder="Confirmar Nueva Contraseña" required>


						<button type="button" onclick="CambiarContrasena();">Aceptar</button>
						<button type="button" onclick="CerrarVentaLogin();">Cancelar</button>
					</div>


					<div id='msj'>
						
					</div>
					

				</form>


			</div>

		</div>



















		<header>
			

			<div id="titulo">
				<!--<h1>Sistema de Biblioteca</h1>-->
				<h3><?php echo $texto;?></h3>

				<a href="javascript:AbrirVentaLogin();">Cambiar Contraseña</a>
				
			</div>	

			<div id="banner">
				<div><img src="img_l/banner.jpg" width="900" height="200"></div>	
			</div>

		</header>

		<br>
		<hr>

		<nav>
		<center>

			<ul id="menu">
				<li><a onclick="VistaInicio();">Inicio</a></li>
				<li><a onclick="VistaReserva();">Reservar Libro</a></li>
				<li><a>Mi Historial</a> 
					<ul>
						<li><a onclick="VistaLibrosReservados();">Libros Reservados</a></li>
						<li><a onclick="VistaLibrosPrestadosLector();">Libros Prestados</a></li>
						<li><a onclick="VistaLibrosDevueltosLector();">Libros Devueltos</a></li>
					</ul>
				</li>

				<!--<li><a onclick="VistaLibro();">Libros</a></li>-->
				<!--<li><a onclick="VistaLector();">Mi Cuenta</a></li>-->
				<li><a href="../index.php">Salir</a></li>
			</ul>



		</center>
		</nav>


		<section>
			<div id="contenido">
			
			</div>
		</section>

		<footer>
			<p>Senati-Desarrollo de Software Ciclo V | Proyecto Sistema de Biblioteca © | SJM</p>
		</footer>
		
	</div>








</body>
</html>