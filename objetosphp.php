<?php
    
////Practica PHP Tablas de multiplicar hasta la direccion URL
//Jesus Alberto Ley Ayon
	class ObjetosPhp{
		public $num1;
		public $num2;
		public $numf1;
		public $numf2;
		
		function __construct(){
			$this->num1 =1;
			$this->num2 =1;
			//$this->$numf1 = $_GET['numf1'];
			//$this->$numf2 = $_GET['numf2']; 
		}		
		
		/*public function multiplicar(){	
			if(isset($numf1)&isset($numf2)){
				//echo $num1, $num2,$numf1,$numf2;
				for($num1 = 1; $num1 <= $numf1; $num1++){
					echo  'Tabla del  ', $num1, '<br/><br/> ';
					for($num2 = 1 ; $num2 <= $numf2; $num2++){
						echo  $num1, 'x' ,$num2, ' = ' , $num1 * $num2, '<br/>'; 	
					}
					echo '<br/>';
				}
			}
			else{
				echo 'Valor no valido de fin';
				//echo $numf1, $numf2;
			}
		}*/
		
		public function multiplicar(){	
			if(isset($_GET)){
				//echo $num1, $num2,$numf1,$numf2;
				for($num1 = 1; $num1 <= $_GET['numf1']; $num1++){
					echo  'Tabla del  ', $num1, '<br/><br/> ';
					for($num2 = 1 ; $num2 <= $_GET['numf2']; $num2++){
						echo  $num1, 'x' ,$num2, ' = ' , $num1 * $num2, '<br/>'; 	
					}
					echo '<br/>';
				}
			}
			else{
				echo 'Valor no valido de fin';
			}
		}
	}
	
	$x = new ObjetosPhp();
	$x -> multiplicar();
	
?>