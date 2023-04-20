<?php

	include('../dbconexion.php');
	$dcodLi = $_POST['vcod'];


	$query= "  
	DELETE FROM
	libros 
	WHERE
	CodLibro = '$dcodLi'
	";

	$resultado = $cnmysql->query($query);

	if ($resultado) {
		include('Vlibro.php');
	}else{
		echo "<h1 style='color:#fff;'>Error al eliminar</h1>";
	}
?>

