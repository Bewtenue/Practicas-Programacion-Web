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
	 $control = $_POST['ctrl']='alumno';
	 $accion = $_POST['act']='alta';
	 $grupo = $_POST['grupo']='CC001';
	 $ordenamiento = $_POST['ord']='1';
	 $nombre = $_POST['nombre']='Jesus Alberto Ley Ayon';
	 $correo = $_POST['correo']='jesus_ayon@hotmail.com';
	 $codigo = $_POST['codigo']='206587305';
	 $carrera = $_POST['carrera']='01';
	 $url = $_POST['url']='https://bewtenue.net/index.php';
	 $gituser = $_POST['gituser']='bewtenue123';
	 $telefono = $_POST['telefono']='3313845969';
	 $equipo = $_POST['equipo'] = 'J&J';
	 
	 
	 
	 if(isset($_POST['ctrl'])){
	 	switch ($_POST['ctrl']) {
			 case 'alumno':
				 echo 'Cargar el controlador Alumno<br />';
				 require('ctrl/alumnoCtrl.php');
				 $ctrl = new alumnoctrl();
				 break;
			 
			 default:
				 
				 break;
		 }	
		$ctrl -> ejecutar();
	 }
	 
?>