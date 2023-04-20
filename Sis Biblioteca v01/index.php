<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/vistas.js"></script>
	<link rel="stylesheet" href="css/hoja_index.css">
	<title>Sistema de Biblioteca</title>


	<script type="text/javascript">

		function AbrirVentaLogin(){
			document.forms['formingreso'].reset();
			$("#ventanalogin").slideDown("slow");
			$('#ErrorUsuario').hide('fast');
		}

		function CerrarVentaLogin(){
			document.forms['formingreso'].reset();
			$("#ventanalogin").slideUp("fast");
			$('#ErrorUsuario').hide('fast');
		}
		

	</script>


</head>
<body onload="VistaInicio()">
	<div id="contenedor">

		<div id="ventanalogin">
			

			<div id="formlogin">

				<div id="cerrar"><a href="javascript:CerrarVentaLogin();">Cerrar X</a></div>

				<h1>Ingresar al Sistema</h1>
				<hr><br>

				<form method="POST" name="formingreso">
	
					<input type="text" name="txtnrcarnet" placeholder="Nro. Carnet..." required>
					<input type="password" name="txtclave" placeholder="Contraseña..." required>
					<button type="submit" name="btnEntrar">Entrar</button>
					<button type="button" onclick="javascript:CerrarVentaLogin();">Cancelar</button>
					<div id='ErrorUsuario'><strong>Error!</strong>Usuario No Encontrado</div>
					<?php
						include('dbconexion.php');

						if (isset($_POST['btnEntrar'])){

							$nrcarnet = $_POST['txtnrcarnet'];
							$clave = $_POST['txtclave'];

							$query_b = "SELECT CodBibliotecario, Nro_Carnet FROM bibliotecario WHERE Nro_Carnet='$nrcarnet' AND Contrasena ='$clave'";
							$query_l = "SELECT CodLector, Nro_Carnet FROM lector WHERE Nro_Carnet='$nrcarnet' AND Contrasena ='$clave'";

							$result_b = $cnmysql->query($query_b);
							$result_l = $cnmysql->query($query_l);

							$num_row_b = mysqli_num_rows($result_b);
							$num_row_l = mysqli_num_rows($result_l);
							


							if( $num_row_b > 0 ){
								
								$row = mysqli_fetch_array($result_b);

								/*$idb = $row['CodBibliotecario'];*/

								session_start();
								$_SESSION["idb"]= $row['CodBibliotecario'];

								/*header("location: biblioteca/indexbibliotecario.php?id=$idb");*/
								header("location: biblioteca/indexbibliotecario.php");

							}elseif ($num_row_l > 0 ) {
								
								$row = mysqli_fetch_array($result_l);

								/*$idl = $row['CodLector'];*/

								session_start();
								$_SESSION["idl"] = $row['CodLector'];

								/*header("location: biblioteca/indexlector.php?id=$idl");*/
								header("location: biblioteca/indexlector.php");

							}else{ 


								echo "<script>";
								echo "$('#ventanalogin').slideDown('slow');";
								echo "$('#ErrorUsuario').slideDown('slow');";
								echo "</script>";
							}

						}else{

						}
					?>


				</form>
			</div>

		</div>

		<header>

			<div id="titulo">
				<h1>Sistema de Biblioteca</h1>
			</div>	

			<div id="banner">
				<div><img src="img/banner.jpg" width="900" height="200"></div>	
			</div>

		</header>

		<br>
		<hr>

		<nav>
		<center>
			<ul>
				<li><a onclick="VistaInicio();">Inicio</a></li>
				<li><a onclick="VistaLibros();">Libros</a></li>
				<li><a onclick="VistaAcercaDe();">Acerca de</a></li>
				<li><a href="javascript:AbrirVentaLogin();">Entrar</a></li>
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