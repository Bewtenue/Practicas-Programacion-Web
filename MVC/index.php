<?php
    //phpinfo();
	/**
	 * @@autor Jesús Alberto Ley Ayón
	 * @since 2014 February 27
	 * this file define the controller to execute
	 * according to the parameters in the url
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