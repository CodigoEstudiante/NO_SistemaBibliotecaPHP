<?php

	include('../dbconexion.php');
	$dcodRe = $_POST['vcod'];

	$query1 = "  
	SELECT CodLibro
	FROM reservas 
	WHERE CodReserva = '$dcodRe'";

	$resultado1 = $cnmysql->query($query1);

	$datos1 = mysqli_fetch_array($resultado1);
	$CodLibro = $datos1['CodLibro'];



	$query2 = "
	UPDATE stocklibros 
	SET Descripcion = (Descripcion) + 1 
	WHERE CodLibro = '$CodLibro'; 
	";

	$resultado2 = $cnmysql->query($query2);

	if ($resultado2) {
		
		$query3 = "  
		DELETE FROM reservas
		WHERE CodReserva = '$dcodRe'
		";

		$resultado3 = $cnmysql->query($query3);

		if ($resultado3) {
			include('VLibrosReservadosBi.php');
		}else{
			echo "<h1 style='color:#fff;'>Error al eliminar</h1>";
		}




	}





?>