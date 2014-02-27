<?php
    //phpinfo();
	/**
	 * @@autor Jesús Alberto Ley Ayón
	 * @sinc
	 * URL /index.php?ctrl=alumno&accion=listar&grupo=1
	 * 
	 */
	 
	 if(isset($_GET['ctrl'])){
	 	switch ($_GET['ctrl']) {
			 case 'alumno':
				 //Cargar el controlador
				 require('ctrl/alumnoCtrl.php');
				 $ctrl = new alumnoctrl();
				 break;
			 
			 default:
				 
				 break;
		 }	
		$ctrl -> ejecutar();
	 }
	 
?>