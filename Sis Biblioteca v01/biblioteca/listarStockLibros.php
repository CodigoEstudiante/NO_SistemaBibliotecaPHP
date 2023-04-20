<?php


include('../dbconexion.php');

	$vbusqueda = $_POST["dbusqueda"];

	$query= "

SELECT LI.CodLibro AS Codigo, LI.Titulo AS Titulo, AU.Descripcion AS Autor,ED.Descripcion AS Editorial, GE.Descripcion AS Genero, SL.Descripcion AS Disponibles
FROM stocklibros SL
INNER JOIN libros LI ON LI.CodLibro = SL.CodLibro
INNER JOIN autor AU ON AU.CodAutor = LI.CodAutor
INNER JOIN editorial ED ON ED.CodEditorial = LI.CodEditorial
INNER JOIN genero GE ON GE.CodGenero = LI.CodGenero
WHERE
LI.Titulo LIKE '$vbusqueda%' OR
AU.Descripcion LIKE '$vbusqueda%' OR
ED.Descripcion LIKE '$vbusqueda%' OR
GE.Descripcion LIKE '$vbusqueda%'
ORDER BY LI.CodLibro DESC; 
";

	$resultado = $cnmysql->query($query);

	$num_filas = mysqli_num_rows($resultado);

	if ($num_filas > 0) {

		echo "<style type='text/css'>

		table{
			color: #000;
			width: 100%;
			border: 1px solid #000;

		}

		table td{
			border: 1px solid #000;
			text-align: center;
			font-size: 10pt;
		}

		</style>
		";
		
		echo "   
			<table>
				<theader>
					<tr>
						<th>Cod Libro</th>
						<th>Titulo</th>
						<th>Autor</th>
						<th>Editorial</th>
						<th>Genero</th>
						<th>Disponibles</th>
					</tr>
				</theader>
				<tbody>
		";
		while ($fila = mysqli_fetch_array($resultado)) {
			echo "<tr>";
				echo "<td>" .$fila['Codigo'] ."</td>";
				echo "<td>" .$fila['Titulo'] ."</td>";
				echo "<td>" .$fila['Autor'] ."</td>";
				echo "<td>" .$fila['Editorial'] ."</td>";
				echo "<td>" .$fila['Genero'] ."</td>";		
				echo "<td>" .$fila['Disponibles'] ."</td>";

			echo "</tr>";
		}

		echo "</tbody></table>";


	}else{
		echo "No Se Encontraron resultados...";
	}


?>