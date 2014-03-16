<?php

function errorFecha($valor){//Automate to give the error of date
	switch($valor){
		case 1: //Date of begininig is bigger than the date of end
		echo "La fecha de Inicio es mayor que la de fin </br>";
		break;
		
		case 2: //Date of beginning is less of the date of now
		echo "La fecha de inicio es menor que la de ahora </br>";
		break;
		
		case 3://Date of end is less of the date of now
		echo "La fecha de  fin es menor que la actual </br>";
		break;
		
		case 4://Date of beginning is not enough to create dates of class
		echo "La fecha de inicio es corta para crear los dias de clase que pidio </br>";
		break;
	
	}
}