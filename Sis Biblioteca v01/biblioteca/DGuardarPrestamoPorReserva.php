<?php
include('../dbconexion.php');

$dCodReserva = $_POST['CodReserva'];
$dCodBi = $_POST['codBibliotecario'];
$dCodLector = $_POST['codLector'];
$dFecDevolucion = $_POST['fechaDevolucion'];
$dCodLibro = $_POST['CodLibro'];



if (!empty($dCodBi) && !empty($dCodLector) && !empty($dFecDevolucion) && !empty($dCodLibro)) 
{
	$query0 = "
	UPDATE stocklibros 
	SET Descripcion = (Descripcion) + 1 
	WHERE CodLibro = '$dCodLibro'; 
	";

	$resultado0 = $cnmysql->query($query0);

	if ($resultado0) {
		
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

					$query3 = "  
						UPDATE reservas
						SET CodEstado = '3' /*CAMBIAMOS EL ESTADO DE LA RESERVA A REGISTRADO*/
						WHERE CodReserva = '$dCodReserva';
					";
					$resultado3 = $cnmysql->query($query3);


					include("VLibrosReservadosBi.php");
				}else{
					echo "<p
							style='	padding: 10px;
							color: #fff;
							><strong>Error!: </strong>Error al Guardar Datos...</p>";
				}

			}

	}



}else{
	echo "<p
		style='	padding: 10px;
				color: #fff;
		><strong>Error!: </strong>Error Datos Nulos...</p>";
}



?>