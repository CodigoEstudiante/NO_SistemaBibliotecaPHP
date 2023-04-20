
<?php


include('../dbconexion.php');

	$vbusqueda = $_POST["dbusqueda"];






	$query= "


	SELECT DP.Cod_Det_Prestamo AS 'CodDp', LI.Titulo AS 'Titulo del Libro',LE.Nro_Carnet, CONCAT(LE.Nombres,' ',LE.Apellidos) AS 'Lector', PR.Fec_Entrega AS 'Fecha Entrega',PR.Fec_Devolucion AS 'Fecha de Devolución', ES.Descripcion AS 'Estado'
	FROM detalle_prestamo DP
	INNER JOIN libros LI on LI.CodLibro = DP.CodLibro
	INNER JOIN prestamo PR on PR.CodPrestamo = DP.CodPrestamo
	INNER JOIN lector LE on LE.CodLector = PR.CodLector
	INNER JOIN estado ES on ES.CodEstado = DP.CodEstado
	WHERE
	(LI.Titulo LIKE '$vbusqueda%' OR
	LE.Nro_Carnet LIKE '$vbusqueda%' OR
	LE.Nombres LIKE '$vbusqueda%' OR
	LE.Apellidos LIKE '$vbusqueda%')
	AND (ES.CodEstado = 1)
	ORDER BY DP.Cod_Det_Prestamo DESC;

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
						<th>Lector</th>
						<th>Fecha Entrega</th>
						<th>Fecha de Devolución</th>
						<th>Estado</th>
						<th colspan='2'>Operaciones</th>
					</tr>
				</theader>
				<tbody>
		";
		while ($fila = mysqli_fetch_array($resultado)) {
			echo "<tr>";
				echo "<td>" .$fila['Titulo del Libro'] ."</td>";
				echo "<td>" .$fila['Lector'] ."</td>";
				echo "<td>" .$fila['Fecha Entrega'] ."</td>";
				echo "<td>" .$fila['Fecha de Devolución'] ."</td>";
				echo "<td>" .$fila['Estado'] ."</td>";


				echo "<td>";
				echo "<a style='cursor:pointer' onclick ='VRetornarLibro(" .$fila['CodDp'] .");'>Retornar</a>";
				echo "</td>";




			echo "</tr>";
		}

		echo "</tbody></table>";


	}else{
		echo "No Se Encontraron resultados...";
	}


?>