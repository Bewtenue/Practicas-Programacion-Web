<?php
    
	/**
	 * @autor Jesús Alberto Ley Ayón
	 */
	
	 
	 class alumnoCtrl{
	 	public $modelo;
	 	
		function __construct(){
			//Cuando se construye se desea crear el modelo
			require ('mdl/alumnoMdl.php');
			$this->modelo=new alumnoMdl();
		}
		 
	 
		/**
		 * @return void
		 * Execute the controller
		 */
		 
		 
		function ejecutar(){
			//Validar la accion
			var_dump($_POST);
			if(isset($_POST['act'])){
				if(preg_match("/[a-zA-Z]*/",$_POST['act'])){
				echo 'ejecutando accion<br />';
					
			/**
			 * 
			 * Practica 7 Validating the parameters from _POST
			 * 04/03/2014
			 */
				
						
					switch ($_POST['act']) {
						case 'alta':
							echo'dando alta<br />';
							//validar que tenga permisos
								
							if(preg_match("/^[a-zA-Z ñÑáéíóúâêîôûàèìòùäëïöü]*/",$_POST['nombre'])){}
							else{
								echo'error en el nombre';
							} if(preg_match("/([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/", $_POST['correo'])){}
							else{
								echo'error en el correo';
							} if (preg_match("/([0-9]|[A-Z]{1})\d{8}/", $_POST['codigo'])) {}
							else{
								echo'error en el codigo';
							} if (preg_match("/[1-9]+/",$_POST['carrera'])){}
							else{
								echo'error en la carrera';
							} if (preg_match("/(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \?=.-]*)*\//", $_POST['url'])){}
							else{
								echo'error en la url';
							} if (preg_match("/[a-z\d_]{4,28}/",$_POST['gituser'])){}
							else{
								echo'error en el gituser';
							} if (preg_match("/\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d/",$_POST['telefono'])){}
							else{
								echo'error en el telefono';
							} if (preg_match("/(C{2}|i)([0-9]{3,4})/",$_POST['grupo'])){}
							else{
								echo'error en el grupo';
							} if (preg_match("/[a-zA-Z\d]{0,28}/",$_POST['equipo'])){
								$status = $this -> modelo -> alta ();
								if($status){
									echo'completado <br/ >';
									//Cargar la vista de alumno insertado
									//include('vistas/alumnoInsertado.html');
									include('vistas/alumnoInsertado.php');
								}
								else{
									include('vistas/error.php');
								}
							}
							
							//validar las entradas
					//		$this->validarTexto($_POST['nombre']);
						//	$this->validarCorreo($_POST['correo']);
							
							//$status = $this -> alta($nombre,$correo);
							
							
							break;
						case 'listar':
							if(preg_match("/(C{2}|i)[0-9]{3,4}/",$_POST['grupo'])){
								$status = $this ->modelo-> listar($_POST['grupo']);
								//echo 'listando';
								if($status){
									include('vistas/materiasListas.php');
									
								}else{
									include('vistas/error.php');
								}
							}else{
								echo "Intente con otro grupo";
							}
							
							break;
							default:
							break;
					}
				
				
				}
				else{
					echo "Error de controlador y/o accion";
				}
			}
			
		}

		
	 }
?>