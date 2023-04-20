<?php
include('../dbconexion.php');


$dCodBi = $_POST['codBibliotecario'];
$dCodLector = $_POST['codLector'];
$dFecDevolucion = $_POST['fechaDevolucion'];
$dCodLibro = $_POST['CodLibro'];



if (!empty($dCodBi) && !empty($dCodLector) && !empty($dFecDevolucion) && !empty($dCodLibro)) 
{

	/*VERIFICAMOS SI HAY LIBROS DISTPONIBLES SEGÚN EL ELEGIDO*/

	$consulta = "  
	SELECT Descripcion FROM stocklibros 
	WHERE CodLibro = '$dCodLibro';
	";

	$result = $cnmysql->query($consulta);

	$dato = mysqli_fetch_array($result);
	$cantidad = (int) $dato['Descripcion'];

	if ($cantidad <= 0) {
		echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>Error!: </strong>No hay libros disponibles...</p>";
		exit();
	}



	$query = " 

	INSERT INTO prestamo(CodBibliotecario,CodLector,Fec_Entrega,Fec_Devolucion)
	VALUES ('$dCodBi','$dCodLector',CURDATE(),'$dFecDevolucion');
	";

	$resultado = $cnmysql->query($query);

	if ($resultado) {
		
		$query1 = "SELECT CodPrestamo FROM prestamo ORDER BY CodPrestamo DESC LIMIT 1";

		$resultado1 = $cnmysql->query($query1);
		$dato = mysqli_fetch_array($resultado1);
		$CodPrestamo = $dato['CodPrestamo'];

		$query2 = "  
			INSERT INTO detalle_prestamo
			(CodLibro,CodPrestamo,CodEstado,Fec_Retorno)
			VALUES ('$dCodLibro','$CodPrestamo','1','NULL');
		";
		$resultado2 = $cnmysql->query($query2);

		if($resultado2){
			echo "<p
		style='	background-color: #8FE397;
				padding: 10px;
				box-sizing: border-box;
				color: #1D7034;
				border:2px dotted #4DA459;'
		><strong>Éxito!: </strong> El préstamo ha sido guardado</p>";
		}else{
			echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>Error!: </strong>Los datos Presentan Errores, verifique porfavor... </p>";
		}



	}

}else{
	echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>Error!: </strong>Falta Ingresar Datos...</p>";
}



?>