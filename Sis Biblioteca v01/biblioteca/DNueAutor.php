<?php
include('../dbconexion.php');



$dautor = $_POST['vautor'];


if (!empty($dautor)) 
{



	$query = "  
	INSERT INTO autor
	(Descripcion)
	VALUES
	('$dautor')
	";

	$resultado = $cnmysql->query($query);

	if ($resultado) {




		echo "<p
		style='	background-color: #8FE397;
				padding: 10px;
				box-sizing: border-box;
				color: #1D7034;
				border:2px dotted #4DA459;'
		><strong>Exito!</strong> Autor Agregado exitosamente</p>";
	}else{
		echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>Error!</strong> Autor No Fue Agregado</p>";
	}


}else{
	echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>Error!</strong> Ingrese un Autor para Agregar</p>";
}




?>