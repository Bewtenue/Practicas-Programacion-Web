<?php

	function muestraFechas($arregloDias){
		for($i = 0, $j = count($arregloDias); $i < $j; $i++){
			echo $arregloDias[$i]. " </br>";
		}
	}