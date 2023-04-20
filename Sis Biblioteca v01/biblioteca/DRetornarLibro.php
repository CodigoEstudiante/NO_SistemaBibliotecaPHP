<?php

	include('../dbconexion.php');
	$dcodLP = $_POST['vcod'];


	$query= "  

	UPDATE detalle_prestamo 
	SET CodEstado = '2',
	Fec_Retorno = CURDATE()
	WHERE Cod_Det_Prestamo = '$dcodLP';
	";

	$resultado = $cnmysql->query($query);

	if ($resultado) {
		include('Vlibrosprestados.php');
	}else{
		echo "<h1 style='color:#fff;'>Error al Retornar</h1>";
	}
?>