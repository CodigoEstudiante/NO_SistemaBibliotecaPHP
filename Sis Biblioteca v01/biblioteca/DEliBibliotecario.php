<?php

	include('../dbconexion.php');
	$dcodBi = $_POST['vcod'];


	$query= "  
	DELETE FROM
	bibliotecario 
	WHERE
	CodBibliotecario = '$dcodBi'
	";

	$resultado = $cnmysql->query($query);

	if ($resultado) {
		include('Vbibliotecario.php');
	}else{
		echo "<h1 style='color:#fff;'>Error al eliminar</h1>";
	}
?>