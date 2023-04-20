<?php
include('../dbconexion.php');



$dCodLector = $_POST['codLector'];


if (!empty($dCodLector)) 
{



	$query = " 
	SELECT PR.CodLector, PR.Fec_Devolucion, DP.CodEstado FROM detalle_prestamo DP
	INNER JOIN prestamo PR on PR.CodPrestamo = DP.CodPrestamo
	WHERE PR.CodLector = '$dCodLector' AND
	CURDATE() > PR.Fec_Devolucion AND
	DP.CodEstado = 1;
	";

	$resultado = $cnmysql->query($query);

	$existente = mysqli_num_rows($resultado);

	if ($existente <= 0) {


		echo "<p
		style='	background-color: #8FE397;
				padding: 10px;
				box-sizing: border-box;
				color: #1D7034;
				border:2px dotted #4DA459;'
		><strong>Obsercaciones:</strong>El Lector no tiene libros pendientes </p>";
	}else{
		echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>Obsercaciones:</strong> El Lector tiene libros pendientes </p>";
	}


}else{
	echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>Error!</strong> Ingrese Carnet de Lector</p>";
}




?>