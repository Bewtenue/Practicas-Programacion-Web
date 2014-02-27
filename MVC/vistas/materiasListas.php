<?php
    /**
	 * 
	 * @autor Jesús Alberto Ley Ayón
	 * buscar el foreach
	 */
	 
	 function lista($listado){
	 	for($numero = 0;$numero < 4 ; $numero++){
	 		echo'Alumno ',$numero+1,": ", $listado [$numero], " </br>";
	 	}
	 }
?>