<?php
include('../dbconexion.php');



$dgenero = $_POST['vgenero'];


if (!empty($dgenero)) 
{



	$query = "  
	INSERT INTO genero
	(Descripcion)
	VALUES
	('$dgenero')
	";

	$resultado = $cnmysql->query($query);

	if ($resultado) {




		echo "<p
		style='	background-color: #8FE397;
				padding: 10px;
				box-sizing: border-box;
				color: #1D7034;
				border:2px dotted #4DA459;'
		><strong>Exito!</strong> Género Agregado exitosamente</p>";
	}else{
		echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>Error!</strong> Género No Fue Agregado</p>";
	}


}else{
	echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>Error!</strong> Ingrese un Género para Agregar</p>";
}




?>