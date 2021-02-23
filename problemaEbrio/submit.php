<?php
	//VARIABLES INICIADAS EN 0
    $N = 0;
	$R = 0;
	$d = 0; //distancia
	$aciertos = 0;
	$p = 0;
	//variable obtenida del FORM
	$S = $_POST['simulaciones'];
	//VALIDACIONES
	$number_check = preg_match("/^[0-9]+$/", $S);
	if(!$number_check || $S == 0){
		echo '<script>alertify.alert("Error :(", "El campo solo debe contener un número positivo y debe ser mayor a 0");</script>';	
	}else{
		// ADORNAMOS LA SALIDA
		echo'
			<hr>
			<div class="page-header" style="margin:0px 0 20px!important;"><span style="font-size:20px;">&nbsp;Resultados de la <b>simulación</b></span>
			</div>
			<div class="table-responsive">
				<table class="table table-condensed" id="table table-bordered">
					<tr class="info">
						<td><strong>Simulación</strong></td>
						<td><strong>Resultado</strong></td>
					</tr>
		';
		//CALCULOS
		for($i=0;$i<$S;$i++){
			$x = 0;
			$y = 0;
			for($j=0;$j<10;$j++){
				$R = mt_rand(1,100);
                if ($R >= 0 && $R < 25) {
                    $y = $y + 1;
                } elseif ($R >= 25 && $R < 50) {
                    $y = $y - 1;
                } elseif ($R >= 50 && $R < 75) {
                    $x = $x + 1;
                } elseif ($R >= 75 && $R < 100) {
                    $x = $x - 1;
                }
			}
			$d = abs($x+$y);
			if ($d == 2) {
                $aciertos++;
            }
			
			if($i % 2 == 0){
				$even = "style='background-color: rgb(245, 245, 245);'";
			}else{
				$even = "";
			}
			//MOSTRAMOS LOS RESULTADOS EN UNA TABLA
			echo '
			<tr '.$even.'>
				<td># '.($i+1).'</td>
				<td>El sujeto recorrió <strong>'.$d.'</strong> calles</td>
			</tr>
			';
		}
		//ecuación para sacar la probabilidad
		$p = ($aciertos / $S) * 100;
		// MOSTRAMOS EL RESTO DE LA SALIDA
		echo '
				</table>
			</div>
			<div style="background-color: #d9edf7;padding: 23px;border-radius: 4px;">
				<div class="row">
					<div class="texto">
						<div style="margin:14px;">
							<span style="font-size:18px;"><strong>Probabilidad:</strong> '.$p.'% de que el sujeto termine su recorrido a dos cuadras de donde lo empezó</span><br>
							<span style="font-size:18px;"><strong>Simulaciones:</strong> '.$S.'</span><br>
							<span style="font-size:18px;"><strong>Aciertos:</strong> '.$aciertos.'</span>
						</div>
					</div>
				</div>
			</div>
		';
	}
?>