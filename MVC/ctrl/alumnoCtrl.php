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
			if(isset($_GET['act'])){
				switch ($_GET['act']) {
					case 'alta':
						echo'dando alta';
						//validar que tenga permisos
						
						//validar las entradas
				//		$this->validarTexto($_POST['nombre']);
					//	$this->validarCorreo($_POST['correo']);
						
						//$status = $this -> alta($nombre,$correo);
						$status = $this -> alta ();
						if($status){
							//Cargar la vista de alumno insertado
							//include('vistas/alumnoInsertado.html');
							include('vistas/alumnoInsertado.php');
						}
						else{
							include('vistas/error.php');
						}
						
						break;
					case 'listar':
							$status = $this ->modelo-> listar($_GET['grupo']);
							//echo 'listando';
							if($status){
								include('vistas/materiasListas.php');
								
							}else{
								include('vistas/error.php');
							}
						break;
						default:
						break;
				}
			}
			
		}
	 }
?>