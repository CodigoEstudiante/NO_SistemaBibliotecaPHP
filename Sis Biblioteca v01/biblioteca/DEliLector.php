<?php

	include('../dbconexion.php');
	$dcodLe = $_POST['vcod'];


	$query= "  
	DELETE FROM
	lector 
	WHERE
	CodLector = '$dcodLe'
	";

	$resultado = $cnmysql->query($query);

	if ($resultado) {
		include('Vlector.php');
	}else{
		echo "<h1 style='color:#fff;'>Error al eliminar</h1>";
	}
?>