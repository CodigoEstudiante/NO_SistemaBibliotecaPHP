<?php
	
	include('../dbconexion.php');



 	$resultado = $cnmysql->query('CALL NroCarnetBibliotecario;');
    $fila = mysqli_fetch_array($resultado);

    echo $fila["0"]."|".$fila["0"];



?>