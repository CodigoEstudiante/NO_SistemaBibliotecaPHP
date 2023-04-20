
<?php 
	
	include('../dbconexion.php');

	/*$id = $_GET["id"];*/

	session_start();
	$id = $_SESSION["idb"];

	$query= "SELECT Nombres, Apellidos, Nro_Carnet FROM bibliotecario wHERE CodBibliotecario = '$id'";

	$resultado = $cnmysql->query($query);

	$fila = mysqli_fetch_array($resultado);

	$nombre = $fila['Nombres'];
	$apellidos = $fila['Apellidos'];
	$carnet  = $fila['Nro_Carnet'];


	$texto = "Bibliotecario: " .$nombre ." " .$apellidos ." | " ."Nro Carnet: " .$carnet;

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/vistas.js"></script>
	<script type="text/javascript" src="js/funcionesBibliotecario.js"></script>
	<script type="text/javascript" src="js/funcionesLector.js"></script>
	<script type="text/javascript" src="js/funcioneslibro.js"></script>
	<script type="text/javascript" src="js/funcionesAutor.js"></script>
	<script type="text/javascript" src="js/funcionesEditorial.js"></script>
	<script type="text/javascript" src="js/funcionesGenero.js"></script>
	<script type="text/javascript" src="js/funcionesAccionesLector.js"></script>

<script type="text/javascript" src="js/funcionesPrestamo.js"></script>

	<link rel="stylesheet" href="css_l/hoja_index_bibliotecario.css">
	<title>Sistema de Biblioteca</title>



</head>
<body onload="VistaInicio()">
	<div id="contenedor">

	

		<header>
		
			

			<div id="titulo">
				<h1>Sistema de Biblioteca</h1>
				<h3><?php echo $texto;?></h3>
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
				<li><a onclick="VistaBibliotecario();">Bibliotecarios</a></li>
				<li><a>Transacciones</a> 
					<ul>
						<li><a onclick="VistaPrestamo(<?php echo $id ?>);">Prestamos</a></li>
						<li><a onclick="VistaLibrosPrestados();">Libros Prestados</a></li>
						<li><a onclick="VistaLibrosRetornados();">Libros Devueltos</a></li>
						<li><a onclick="VistaLibrosReservadosBi();">Ver Reservas</a></li>
					</ul>
				</li>

				<li><a onclick="VistaLibro();">Libros</a></li>
				<li><a onclick="VistaLector();">Lectores</a></li>
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