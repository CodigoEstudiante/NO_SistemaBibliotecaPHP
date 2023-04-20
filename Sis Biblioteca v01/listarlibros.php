
<?php


include('dbconexion.php');

$vbusqueda = $_POST["dbusqueda"];






$query= "

SELECT LI.CodLibro, LI.Titulo, LI.Portada, AU.Descripcion as Autor,GE.Descripcion as Genero , ED.Descripcion as Editorial, LI.Ubicacion, LI.Ejemplar FROM libros LI
INNER JOIN autor AU on AU.CodAutor = LI.CodAutor
INNER JOIN genero GE ON GE.CodGenero = LI.CodGenero
INNER JOIN editorial ED on ED.CodEditorial = LI.CodEditorial
WHERE
LI.Titulo like '$vbusqueda%' OR
AU.Descripcion like '$vbusqueda%' OR
GE.Descripcion like '$vbusqueda%' OR
ED.Descripcion like '$vbusqueda%' 
ORDER BY LI.CodLibro DESC;
"
;





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
			padding: 1%;
			box-sizing: border-box;
			border: 1px solid #fff;
			text-align: center;
		}

		</style>
		";
		
		echo "   
			<table>

				<tbody>
		";
		while ($fila = mysqli_fetch_array($resultado)) {
			echo "<tr>";

				echo "<td><img height='200' width='200' src='data:image/jpg;base64," .base64_encode($fila['Portada']) ."'/></td>";

				echo "<td>
					<strong><p style='color:green;'>Titulo: </p></strong>" .$fila['Titulo'] ."<br><br>
					<strong><p style='color:green;'>Autor: </p></strong>"  .$fila['Autor'] ."<br><br>
					<strong><p style='color:green;'>Género: </p></strong>" .$fila['Genero'] ."<br><br>
					<strong><p style='color:green;'>Editorial: </p></strong>" .$fila['Editorial'];
				echo "</td>";
		




			echo "</tr>";
		}

		echo "</tbody></table>";


	}else{
		echo "No Se Encontraron resultados... en libros";
	}


?>