<?php
include('../dbconexion.php');

/*

$dtitulo = $_POST['vtitulo'];

$dimagen = addslashes(file_get_contents($_FILES['vimagen']['tmp_name']));

$dautor = $_POST['vautor'];
$dgenero = $_POST['vgenero'];
$deditorial = $_POST['veditorial'];
$dubicacion = $_POST['vubicacion'];
$dejemplar = $_POST['vejemplar'];


*/
$dtitulo = $_POST['txttitulo'];

$dimagen = addslashes(file_get_contents($_FILES['picimagen']['tmp_name']));

$dautor = $_POST['cboautor'];
$dgenero = $_POST['cbogenero'];
$deditorial = $_POST['cboeditorial'];
$dubicacion = $_POST['txtubicacion'];
$dejemplar = $_POST['txtejemplar'];


if (!empty($dtitulo) && !empty($dimagen) && !empty($dautor)	&& !empty($dgenero) && $deditorial != '0'  && !empty($dubicacion) && !empty($dejemplar)
	) 
{


	$query = "  
	INSERT INTO libros(
	Titulo,
	Portada,
	CodAutor,
	CodGenero,
	CodEditorial,
	Ubicacion,
	Ejemplar)
	VALUES(
	'$dtitulo',
	'$dimagen',
	'$dautor',
	'$dgenero',
	'$deditorial',
	'$dubicacion',
	'$dejemplar')
	";

	$resultado = $cnmysql->query($query);

	if ($resultado) {

		include('Vlibro.php');


		
	}else{
		echo "<h1 style='color:#fff;'>Error al Agregar Libro</h1>";
	}


}else{
	echo "<h1 style='color:#fff;'>Rellene todos los datos porfavor</h1>";
}




?>