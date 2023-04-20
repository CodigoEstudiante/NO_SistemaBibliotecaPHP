<?php
include('../dbconexion.php');



$deditorial = $_POST['veditorial'];


if (!empty($deditorial)) 
{



	$query = "  
	INSERT INTO editorial
	(Descripcion)
	VALUES
	('$deditorial')
	";

	$resultado = $cnmysql->query($query);

	if ($resultado) {




		echo "<p
		style='	background-color: #8FE397;
				padding: 10px;
				box-sizing: border-box;
				color: #1D7034;
				border:2px dotted #4DA459;'
		><strong>Exito!</strong> Editorial Agregada exitosamente</p>";
	}else{
		echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>Error!</strong> Editorial No Fue Agregada</p>";
	}


}else{
	echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>Error!</strong> Ingrese una Editorial para Agregar</p>";
}




?>