<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/vistas.js"></script>
	<link rel="stylesheet" href="css_l/hoja_inicio.css">
	<title></title>
</head>
<body>


	<div id="ContInicio">
		

			<div id="tituloContenido">
				<h1>Te Damos La Bienvenida</h1>
			</div>
		
			<div id="slider">
				<div><img src="img_l/bimg1.jpg" width="900" height="200"></div>
				<div><img src="img_l/bimg3.jpg" width="900" height="200"></div>
				<div><img src="img_l/bimg4.jpg" width="900" height="200"></div>
			</div>

			<div id="section">
				<div id="article1">
					<img src="img_l/bimg5.jpg" width="200" height="200">
					<h1>Los beneficios de Leer</h1>
					<p>
						La lectura aumenta la capacidad de las personas para concentrarse, favorece las conexiones neuronales y, si se realiza con frecuencia, es un ejercicio muy útil para evitar la pérdida de algunas funciones cognitivas. Leer mantiene activa la mente y esto, según estudios científicos, incrementa la rapidez de respuesta de las personas dado que la lectura entrena al cerebro para ordenar ideas.
					</p>
				</div>

				<div id="article2">
					<img src="img_l/bimg6.jpg" width="200" height="200">
					<h1>Bibliotecas Virtuales</h1>
					<p>
						Es importante considerar que en el concepto de biblioteca virtual está presente el efecto de la integración de la informática y las comunicaciones cuyo exponente esencial es Internet. No se trata solamente de que los contenidos estén en formato digital lo que prevalece en el concepto de biblioteca digital.  Los contenidos digitales son una parte necesaria pero no suficiente.
					</p>
				</div>
			</div>


	</div>


	
	<script type="text/javascript">
		$(function(){

			$("#slider div:gt(0)").hide();

			setInterval(function(){
				$("#slider div:first-child").fadeOut(1000)
				.next("div").fadeIn(1000)
				.end().appendTo("#slider");
			},3000);

		})

	</script>
</body>
</html>