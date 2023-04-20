<?php
	
	include('../dbconexion.php');



 	$resultado = $cnmysql->query('CALL NroCarnetLector;');
    $fila = mysqli_fetch_array($resultado);

    echo $fila["0"]."|".$fila["0"];



?>