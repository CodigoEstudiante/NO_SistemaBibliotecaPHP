<?php

	include('../dbconexion.php');
	$dcod = $_POST['vcod'];



if (!empty($dcod)) {

	

		$query = "  
		DELETE FROM autor
		WHERE
		CodAutor = '$dcod'
		";

		$resultado = $cnmysql->query($query);

		if ($resultado){

			echo "<p
			style='	background-color: #8FE397;
					padding: 10px;
					box-sizing: border-box;
					color: #1D7034;
					border:2px dotted #4DA459;'
			><strong>Exito!</strong> Autor Fue Eliminado</p>";

		}else{

			echo "<p
			style='	background-color: #EE9393;
					padding: 10px;
					box-sizing: border-box;
					color: #E33E3E;
					border:2px dotted #E33E3E;'
			><strong>Error!</strong> Autor No Fue Eliminado</p>";

		}


}else{

	echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>Error!</strong> Ingrese un Codigo de Autor para Eliminar</p>";
}



?>