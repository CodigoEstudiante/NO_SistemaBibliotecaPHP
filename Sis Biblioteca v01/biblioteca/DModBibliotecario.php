<?php
include('../dbconexion.php');


$dcod = $_POST['vcod'];
$dnombres = $_POST['vnombres'];
$dapellidos = $_POST['vapellidos'];
$ddireccion = $_POST['vdireccion'];
$demail = $_POST['vemail'];
$dtelefono = $_POST['vtelefono'];
$ddni = $_POST['vdni'];

$query = "  
UPDATE bibliotecario 
SET
Nombres = '$dnombres',
Apellidos = '$dapellidos',
Direccion = '$ddireccion',
Email = '$demail',
Telefono = '$dtelefono',
Dni = '$ddni'
WHERE
CodBibliotecario = '$dcod'

";

$resultado = $cnmysql->query($query);

if ($resultado) {
	include('Vbibliotecario.php');
}else{
		echo "Error al Modificar";

}
?>