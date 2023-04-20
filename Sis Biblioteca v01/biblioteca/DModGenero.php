<?php
include('../dbconexion.php');


$dcod = $_POST['vcod'];
$dgenero = $_POST['vgenero'];



if (!empty($dgenero) && !empty($dcod)) {

	

		$query = "  
		UPDATE genero
		SET
		Descripcion = '$dgenero'
		WHERE
		CodGenero = '$dcod'
		";

		$resultado = $cnmysql->query($query);

		if ($resultado){

			echo "<p
			style='	background-color: #8FE397;
					padding: 10px;
					box-sizing: border-box;
					color: #1D7034;
					border:2px dotted #4DA459;'
			><strong>Exito!</strong> Género Fue Modificado</p>";

		}else{

			echo "<p
			style='	background-color: #EE9393;
					padding: 10px;
					box-sizing: border-box;
					color: #E33E3E;
					border:2px dotted #E33E3E;'
			><strong>Error!</strong> Género No Fue Modificado</p>";

		}


}else{

	echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>Error!</strong> Ingrese un Codigo y un Género para Modificar</p>";
}


?>