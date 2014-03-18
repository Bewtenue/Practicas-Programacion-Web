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
			if(isset($_POST['act'])){
				if(preg_match("/[a-zA-Z]*/",$_POST['act'])){
					
						
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
							/////////modificado para el uso de sesiones
						case 'listar':
							session_start();
							if(!$this->isLogged()){
								$this->login('01','123');
							if($this->isAlumno()){
								if(preg_match("/(C{2}|i)[0-9]{3,4}/",$_POST['grupo'])){
									$status = $this ->modelo-> listar($_POST['grupo']);
									//echo 'listando';
									if($status){
										include('vistas/materiasListas.php');
										$this->logout();
									}else{
										include('vistas/error.php');
									}
								}else{
									echo "Intente con otro grupo";
								}
							}	
							
							} else{
								include('Vistas/errorSesion.php');
								$this->logout();
							}
							break;
							//Practica 8 Manejo de Fechas en PHP//////////
						case 'fechas'://///recomendaciones de la maestra funciones "dates" "datecreate" "strtotime"
						echo 'ejecutando accion de fechas </br>';
							if(isset($_POST['fechaInicial']) && isset($_POST['fechaFinal']) && isset($_POST['dias'])){//Check if in  the POST exists the date. Date format is dd/mm/yyyy
								$fechaInicial = $_POST['fechaInicial'];
								$fechaFinal = $_POST['fechaFinal'];
								$dias = $_POST['dias'];
								
								$validaciones[] = $this->validaFecha($fechaInicial);
								$validaciones[] = $this->validaFecha($fechaFinal);
								$validaciones[] = $this->validaDias($dias);
								if($validaciones[0] && $validaciones[1] && $validaciones[2]){
									$validaFechas = $this->comparaFechas($fechaInicial, $fechaFinal);
									if($validaFechas){//We begin to extract the days selected and compare with the begin and end to give the days of class
										$diasCurso = $this->dameDiasCurso($fechaInicial, $fechaFinal, $dias);
										if(is_array($diasCurso)){
											include('Vistas/listaCursos.php');
											muestraFechas($diasCurso);
										}
									}
								}
							}
							else{
								$this->muestraErrores();
							}
							break;
						case 'logout':
							$this->logout();
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


		 public function validaFecha($fecha){ //Function to validate the date
			$expresion = "/([123]0|[012][1-9]|31)\/(0[1-9]|1[012])\/(19[0-9]{2}|2[0-9]{3})/";
			if(preg_match($expresion, $fecha)){
				$piezasFecha = explode("/",$fecha);
				if(checkdate($piezasFecha[1], $piezasFecha[0], $piezasFecha[2])) //MM/DD/YYYY
					return true;
				else
					return false;
			}	
				else
					return false;
		 }
		 
		 public function validaDias($dias){//Function to validate the day of the array
			$expresion = "/[123456]/";
			foreach($dias as $dia){
				if(!preg_match($expresion, $dia))
					return false;
			}
			return true; //That means the array is correct
		 }
		 
		 public function comparaFechas($fechaIn, $fechaFin){//Function to verify the date is correct with the other dates
			$fechaIn = str_replace('/', '-', $fechaIn);
			$fechaFin = str_replace('/', '-', $fechaFin);
			$fechaIn = strtotime(date("d-m-Y",strtotime($fechaIn)));
			$fechaFin = strtotime(date("d-m-Y",strtotime($fechaFin)));
			
			$fechaActual = strtotime(date("d-m-Y",strtotime("now")));
			if($fechaIn > $fechaFin){
				include('Vistas/erroresCurso.php');
				errorFecha(1);
				return false;
			}
			else if($fechaIn < $fechaActual){
				include('Vistas/erroresCurso.php');
				errorFecha(2);
				return false;
			}
			else if($fechaFin < $fechaActual){		
				include('Vistas/erroresCurso.php');
				errorFecha(3);
				return false;
			}
			return true;
		 }
		
		public function dameDiasCurso($fechaInicial, $fechaFinal, $dias){
			$fechasClase = array();
			$encuentroPrimerClase = false;
			$clases = array();
			$fechaInicial = str_replace('/', '-', $fechaInicial); //Change the format to adapt the string
			$fechaFinal = str_replace('/','-',$fechaFinal);//Change the format too
			$fechaFinal = date("d-m-Y",strtotime($fechaFinal));//We use to compare with the dates
	
				for($i = 0; $i < count($dias); $i++){
					$fechaInicial1 = date("d-m-Y",strtotime($fechaInicial));
					while(!$encuentroPrimerClase){
						if(date("N", strtotime($fechaInicial1)) == $dias[$i]){
							$encuentroPrimerClase = true;
							break;
						}
						else
							$fechaInicial1 = date("d-m-Y",strtotime($fechaInicial1." +1 days"));
					}
					if($encuentroPrimerClase){
						$fechasClase[] = $fechaInicial1;
						$encuentroPrimerClase = false;
					}
				}
				
			for($i = 0; $i < count($fechasClase); $i++){
				if(strtotime($fechasClase[$i]) <= strtotime($fechaFinal))
					$clases[] = $fechasClase[$i];
			}
			
			if(count($clases) == 0){//The date of beginning is not enough to create dates of class until the end
				include('Vistas/erroresCurso.php');
				errorFecha(4);
				return false;
			}
			else{//We begin to give the rest of classes
				for($i = 0, $j = count($clases); $i < $j; $i++){//We use j instead of count to be a little more faster and not count each time
					$nuevo = $clases[$i];
					$nuevo = date("d-m-Y",strtotime($nuevo." +1 week"));
					if(strtotime($nuevo) <= strtotime($fechaFinal)){
						$clases[] = $nuevo;
						$j++;//We add to j to follow the array
					}
					else
						break;
				}
				return $clases;
			}
		 }

		public function muestraErrores(){
			if(!isset($_POST['fechaInicial']))
				echo "Falto la informacion de la fecha Inicial </br>";
			if(!isset($_POST['fechaFinal']))
				echo "Falto la informacion de la fecha Final </br>";
			if(!isset($_POST['dias']))
				echo "Faltaron los dias de clases </br>";
		}
		
		/////Practica de uso de sessiones en PHP 18/03/2014
		
		public function login($id_user,$pass){
			//se verifica que el usuario este en la base de datos
			$_SESSION['user']= $_POST['user'];
			$_SESSION['type']= $_POST['type'];
			$_SESSION['username']=$_POST['username'];
			
			return true;
		}
		
		public function logout(){
			session_unset();
			session_destroy();
			setcookie(session_name(),'',time()-3600);
		}
		
		public function isAlumno(){
			if(isset($_SESSION['user']) && isset($_SESSION['user'])=='alumno'){
				return true;
			}
			else return false;
		}
		
		public function isLogged(){
			if(isset($_SESSION['user'])&& isset($_SESSION['type'])&& isset($_SESSION['username'])){
				return true;
			} else {
				return false;
			}
		}
	}
?>