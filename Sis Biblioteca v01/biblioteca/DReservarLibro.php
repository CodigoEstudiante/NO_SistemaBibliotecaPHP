<?php

	include('../dbconexion.php');
	$dcodLector = $_POST['codLector'];
	$dcodLibro = $_POST['codLibro'];




if (empty($dcodLibro)) {
	echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>Aviso! </strong>Ingrese Un Código de Libro</p>";
	exit();
}











$query1 = "
		SELECT Descripcion
		FROM stocklibros
		WHERE CodLibro = '$dcodLibro'
		";

$resultado1 = $cnmysql->query($query1);
$datos = mysqli_fetch_array($resultado1);
$stockLibro = $datos['Descripcion'];

if ($stockLibro >0) {

		$query2 = "  
			SELECT * FROM reservas 
			WHERE 
			CodLector = '$dcodLector' AND 
			CodLibro = '$dcodLibro'
			";
		$resultado2 = $cnmysql->query($query2);

		$num_filas = mysqli_num_rows($resultado2);

		if ($num_filas <= 0) {

				$query3 = "
					INSERT INTO reservas(
					CodLector,
					CodLibro,
					Fec_Reserva,
					CodEstado) 
					VALUES (
					'$dcodLector',
					'$dcodLibro',
					CURDATE(),
					'1'
					);
				";

				
				$resultado3 = $cnmysql->query($query3);

				if ($resultado3) {

					$query4 = "
					UPDATE stocklibros 
					SET Descripcion = (Descripcion) - 1 
					WHERE CodLibro = '$dcodLibro'; 
					";

					$cnmysql->query($query4);


					echo "<p
					style='	background-color: #8FE397;
							padding: 10px;
							box-sizing: border-box;
							color: #1D7034;
							border:2px dotted #4DA459;'
					><strong>Exito!</strong> Su Reserva fue Agregada</p>";
				}else{
				echo "<p
				style='	background-color: #EE9393;
						padding: 10px;
						box-sizing: border-box;
						color: #E33E3E;
						border:2px dotted #E33E3E;'
				><strong>Aviso! </strong>No se Pudo hacer la reserva, Intente de Nuevo</p>";
				}

		}else{
			echo "<p
			style='	background-color: #EE9393;
					padding: 10px;
					box-sizing: border-box;
					color: #E33E3E;
					border:2px dotted #E33E3E;'
			><strong>Aviso! </strong>El libro ya se encuentra reservado</p>";

		}











	
}else{
		echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>Aviso! </strong>No hay mas Libros Disponibles</p>";

}





	
	



?>