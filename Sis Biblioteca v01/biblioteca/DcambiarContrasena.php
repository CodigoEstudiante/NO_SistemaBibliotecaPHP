<?php

$Aclve = $_POST['Aclve'];
$Nclve = $_POST['Nclve'];
$Cclve = $_POST['Cclve'];


if (!empty($Aclve) && !empty($Nclve) && !empty($Cclve)) {

	if ($Nclve == $Cclve) {

		
		include('../dbconexion.php');
		session_start();
		$CodLector = $_SESSION["idl"];


		$query = "
		SELECT CodLector FROM lector 
		WHERE CodLector = '$CodLector'
		AND Contrasena = '$Aclve'";

		$resultado = $cnmysql->query($query);

		$numFilas = mysqli_num_rows($resultado);

		if ($numFilas > 0) {


			$dato = mysqli_fetch_array($resultado);
			$codle = $dato['CodLector'];

			$query1 = "  
			UPDATE lector 
			SET Contrasena = '$Cclve' 
			WHERE CodLector = '$codle'
			";

			$resultado1 = $cnmysql->query($query1);

			if($resultado1){
				echo "<p
				style='	background-color: #8FE397;
						padding: 10px;
						box-sizing: border-box;
						color: #1D7034;
						border:2px dotted #4DA459;'
				><strong>Exito! </strong> Contraseña Cambiada</p>
				<script>
				document.forms['formingreso'].reset();
				$('#formdatos').slideUp('fast');
				</script>
				";

			}else{
				echo "<p
				style='	background-color: #EE9393;
						padding: 10px;
						box-sizing: border-box;
						color: #E33E3E;
						border:2px dotted #E33E3E;'
				><strong>Error! </strong>Error al Cambiar Contraseña</p>";
			}

			
		}else{
		echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>Error! </strong>Tu contraseña no coincide</p>";

		}
 

		
	}else{
		echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>Error! </strong>Las contraseñas no coinciden</p>";
	}
	
}else{
		echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>Error! </strong>Ingrese todos los datos</p>";
}



?>