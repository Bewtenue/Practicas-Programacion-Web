<?php
////Practica PHP Tablas de multiplicar hasta el 12
//Jesus Alberto Ley Ayón
	
	$num1 = 1;
	$num2 = 1;
	for($num1 = 1 ; $num1 <= 12; $num1++){
	echo  'Tabla del  ', $num1, '<br/><br/> ';
	for($num2 = 1; $num2 <= 12; $num2++){
		echo  $num1, 'x' ,$num2, ' = ' , $num1 * $num2, '<br/>'; 	
	}
	echo '<br/>';
	}
?>