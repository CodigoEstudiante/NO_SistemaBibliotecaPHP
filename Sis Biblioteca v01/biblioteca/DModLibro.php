<?php
include('../dbconexion.php');


$dcod = $_POST["txtcod"];
$dtitulo = $_POST['txttitulo'];

$dautor = $_POST['cboautor'];
$dgenero = $_POST['cbogenero'];
$deditorial = $_POST['cboeditorial'];
$dubicacion = $_POST['txtubicacion'];
$dejemplar = $_POST['txtejemplar'];


$sql = "SELECT * FROM detalle_prestamo WHERE CodLibro = '$dcod' and CodEstado = 1";
$resultado = $cnmysql->query($sql);
$cantidad = mysqli_num_rows($resultado);
	
if ($dejemplar < $cantidad) {
	echo "<p
	style='	background-color: #EE9393;
			padding: 10px;
			box-sizing: border-box;
			color: #E33E3E;
			border:2px dotted #E33E3E;'
	><strong>Error!</strong> No puede ingresar menor número de ejemplares, porque el número de prestados execede a este.</p>";
	exit();
}








if (!empty($_FILES['picimagen']['tmp_name']) ) {


	$dimagen = addslashes(file_get_contents($_FILES['picimagen']['tmp_name']));

	$query = "
	 UPDATE libros
	 SET 
	 Titulo = '$dtitulo',
	 Portada = '$dimagen',
	 CodAutor = '$dautor',
	 CodGenero = '$dgenero',
	 CodEditorial = '$deditorial',
	 Ubicacion = '$dubicacion',
	 Ejemplar = '$dejemplar'
	 WHERE 
	 CodLibro = '$dcod'
	";


}else{
	$query = "
	 UPDATE libros
	 SET 
	 Titulo = '$dtitulo',
	 CodAutor = '$dautor',
	 CodGenero = '$dgenero',
	 CodEditorial = '$deditorial',
	 Ubicacion = '$dubicacion',
	 Ejemplar = '$dejemplar'
	 WHERE 
	 CodLibro = '$dcod'
	";


}




$resultado = $cnmysql->query($query);



if ($resultado) {





	$nuevaCantidad = $dejemplar - $cantidad;

	$consult = "UPDATE stocklibros SET Descripcion = '$nuevaCantidad' WHERE CodLibro = '$dcod'";

	$result = $cnmysql->query($consult);


	
	include('Vlibro.php');
}else{
		echo "Error al Modificar";

}
?>