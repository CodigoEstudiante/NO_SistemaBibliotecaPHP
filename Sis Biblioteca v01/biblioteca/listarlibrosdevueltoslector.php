<?php
	

include('../dbconexion.php');

session_start();
$CodLector = $_SESSION["idl"];

?>

<!--<script type="text/javascript">
	var	 cod = <?php $CodLector ?>;

	alert(cod);

</script>-->

<?php

	$query= "
	SELECT DP.Cod_Det_Prestamo AS 'CodDp', LI.Titulo AS 'Titulo del Libro',LE.CodLector, PR.Fec_Entrega AS 'Fecha Entrega',PR.Fec_Devolucion AS 'Fecha de Devolución', DP.Fec_Retorno AS 'Fecha de Retorno'
	FROM detalle_prestamo DP
	INNER JOIN libros LI on LI.CodLibro = DP.CodLibro
	INNER JOIN prestamo PR on PR.CodPrestamo = DP.CodPrestamo
	INNER JOIN lector LE on LE.CodLector = PR.CodLector
	INNER JOIN estado ES on ES.CodEstado = DP.CodEstado
	WHERE
	LE.CodLector = '$CodLector'
	AND
	ES.CodEstado = '2'
 ";


	$resultado = $cnmysql->query($query);

	$num_filas = mysqli_num_rows($resultado);

	if ($num_filas > 0) {

		echo "<style type='text/css'>

		table{

			color: #fff;
			width: 100%;
			border: 1px solid #fff;
		}
		table tr{
			padding: 5px;
			box-sizing: border-box;
		}
		table td{
			border: 1px solid #fff;
			text-align: center;
			
		}

		table td a{
			margin: 4px;
			display: block;
			background: #1B7A38;
			padding: 5px;
			box-sizing: border-box;
			border-radius: 5px;
		}

		table td a:hover{
			text-decoration: underline;
		}
		</style>
		";
		
		echo "   
			<table>
				<theader>
					<tr>
						<th>Titulo del Libro</th>			
						<th>Fecha Entrega</th>
						<th>Fecha de Devolución</th>
						<th>Fecha de Retorno</th>

					</tr>
				</theader>
				<tbody>
		";
		while ($fila = mysqli_fetch_array($resultado)) {
			echo "<tr height='20'>";
				echo "<td>" .$fila['Titulo del Libro'] ."</td>";			
				echo "<td>" .$fila['Fecha Entrega'] ."</td>";
				echo "<td>" .$fila['Fecha de Devolución'] ."</td>";
				echo "<td>" .$fila['Fecha de Retorno'] ."</td>";



			echo "</tr>";
		}

		echo "</tbody></table>";


	}else{
		echo "No Se Encontraron resultados...";
	}


?>