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
	 $_POST['ctrl']='alumno';
	 $_POST['act']='listar';
	 $_POST['grupo']='CC001';
	 $_POST['ord']='1';
	 $_POST['nombre']='Jesus Alberto Ley Ayon';
	 $_POST['correo']='jesus_ayon@hotmail.com';
	 $_POST['codigo']='206587305';
	 $_POST['carrera']='01';
	 $_POST['url']='https://bewtenue.net/index.php';
	 $_POST['gituser']='bewtenue123';
	 $_POST['telefono']='3313845969';
	 $_POST['equipo'] = 'J&J';
	 $_POST['fechaInicial'] = '18/03/2014';
	 $_POST['fechaFinal'] = '29/05/2014';
	 $_POST['dias'][0] = '2';
	 $_POST['dias'][1] = '4';
	 $_POST['user']='alumno';
	 $_POST['type']='maestro';
	 $_POST['username']='jesus';
	 $_POST['pass']='123';
	 
	 if(isset($_POST['ctrl'])){
	 	switch ($_POST['ctrl']) {
			 case 'alumno':
				 
				 require('ctrl/alumnoCtrl.php');
				 $ctrl = new alumnoctrl();
				 break;
			 case 'practnum':
				 requiere('ctrl/numeroCtrl.php');
				 $ctrl = new numeroctrl();
				 break;
			 default:
				 
				 break;
		 }	
		$ctrl -> ejecutar();
	 }
	 
?>