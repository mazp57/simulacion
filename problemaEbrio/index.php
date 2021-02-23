<!DOCTYPE html>
<html>
<head>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Problema del Ebrio</title>

<link rel="stylesheet" href="resources/css/alertify/alertify.min.css"/>
<link rel="stylesheet" href="resources/css/alertify/default.min.css"/>
<link rel="stylesheet" href="resources/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="resources/css/fonts.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" type="text/css" href="resources/css/estilo.css">
<script src="resources/js/jquery-2.1.3.min.js"></script>
<script src="resources/js/bootstrap.min.js"></script>
<script src="resources/js/alertify.min.js"></script>
<script>
$(function() {
	//AJAX
	jQuery('#button').click(function (e) {
		var simulaciones = jQuery("#simulaciones").val();
		jQuery.ajax({
			type: "POST",
			url: "submit.php",
			data: "simulaciones=" + simulaciones,
			success: function (data) {
				$('#resultado').html(data);
			}
		});				
		return false;
	});
});
</script>
</head>
<body style="background-color:#B7CFDE;font-family:Open Sans;">

	<div class="container">
	<div class="row">
	<div class="col-md-16">
	<div class="panel panel-boon">
	<div class="panel-body">
	<div class="page-header" style="margin:0px 0 20px!important;">FORMULACION DEL PROBLEMA-MARIEN ZAMBRANO</span>
	</div>
	<p><b style="font-size:20px;">Problema:</b></p>
	<p style="text-align: justify;">Supongamos que un ebrio está parado en una esquina, cuando decide caminar para 
	que le pase el efecto “ya ustedes saben cuál”. Supongamos que existe una probabilidad
	igual de que se dirija al norte, sur, este u oeste al llegar a cada esquina. Si camina 10 calles, ¿Cuál es la probabilidad de que termine su recorrido a dos calles de donde lo empezó?</p>
	<hr><p><b style="font-size:20px;">Solución</b></p>
	<ol>
	<li>Inicializar X, Y y N (número de cuadras caminadas) en cero.</li>
	<li>Obtener un número aleatorio R (probabilidad de la dirección)</li>
	<li>Evaluar el valor de R:
	<ul>
	<li>Si R es mayor o igual a 0 y menor que 25, incrementar Y en uno.</li>
	<li>Si R es mayor o igual a 25 y menor que 50, decrementar Y en uno.</li>
	<li>Si R es mayor o igual a 50 y menor que 75, incrementar X en uno.</li>
	<li>Si R es mayor o igual a 75 y menor que 100, decrementar X en uno.</li>
	</ul>
	</li>
	<li>Incrementar el número de cuadras caminadas (N)</li>
	<li>Imprimir los valores X y Y</li>
	<li>Repetir los pasos 2 a 5 hasta que N sea igual a 10</li>
	<li>Sumar X y Y, para obtener la posición en donde se encuentra después de caminar 10 cuadras</li>
	<li>Si el valor absoluto de la suma resulta igual a 2, entonces se toma como éxito. En caso contrario se toma como fracaso.</li>
	</ol>
	</div>
	</div>
	</div>



	<div class="col-md-16">
	<div class="panel panel-boon">
	<div class="panel-body">
	<div class="page-header" style="margin:0px 0 20px!important;"><span style="font-size:20px;"><b>Iniciar simulación</b></span></div>
	<p><b style="font-size:17px;text-transform: uppercase;">Inserte numero de simulaciones</b></p>
	<div class="row">
	<form action="#" method="post">
	<div class="col-md-12">
	<input type="text" id="simulaciones" name="simulaciones" placeholder="Número de simulaciones" autocomplete="off"><br><br>
	</div>
	</div>
	<div class="row">
	<div class="col-sm-7 ">
	<input id="button" class="btn btn-info" type="submit" value="Iniciar">
		</div>
	</form>
	</div>

	<div id="resultado"></div>

	</div>
	</div>
	</div>
	</div>
	</div>
	<footer class="footer">
	<div class="container">
	<p class="text-muted"> MARIEN ZAMBRANO-SIMULACION DE SISTEMA </p>
	</div>
	</footer>


</body>
</html>