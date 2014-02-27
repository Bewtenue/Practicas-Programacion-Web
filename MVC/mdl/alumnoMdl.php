<?php
    /**
	 * @autor Jesús Alberto Ley Ayón
	 * 
	 */
	 class alumnoMdl{
	 	public $conexion;
		
		function __construct(){
			//Crea la conexion a la base de datos
		}
		
		function alta(){
			///Mandar a la base de datos
			//si se pudo insertar
			return true;
			//sino
			return false;
		}
		/**
		 * @param int grupo
		 */
		function listar($grupo){
			/**
			 * Practice 6 : in this function you recieve a parameter called grupo wich have the number of the group
			 * 				there are 3 arrays wich represents the groups
			 * 				if you want it sorted, add the ord parameter in the url with the value of 1
			 * 				
			 * 
			 */
			 switch ($grupo) {
				 case 1 :
					 $a = array ("Juanito","Fulanito","Manganito","Perenganito");
					 //if(isset($_GET['ord'])){
					 	if($_GET['ord']==1){
					 		sort($a);
							return $a;
					 //	}		
					 }else
					 	return $a;
					 
					 break;
				 case 2:
					 $b = array ("Pedro","Lalo","Francisco","Ignacio");
					 if(isset($_GET['ord'])){
					 	if($_GET['ord']==1){
					 		sort ($b);
							return $b;
						}
					 }else
					 	return $b;
					 break;
				 case 3:
					 $c = array ("Javier","Ivan","Lucio","Irma","Victor");
					 if (isset ($_GET['ord'])){
					 	if($_GET['ord']==1){
					 		sort($c);
						 	return $c;
					 	}
					 } 
					 else
					 	return $c;
					 break;
				 default:
					 
					 break;
			 } 
			 
			 /*if($grupo == 1){
				return $a = array ("Juanito","Fulanito","Manganito","Perenganito");
			}
			else if($grupo == 2){
				return $b = array ("Pedro","Lalo","Francisco","Ignacio");
				}			
			else if($grupo == 3){
				return $c = array ("Javier","Ivan","Lucio","Irma","Victor");
			}
			else return false;*/
				
		}
	 }
	 
?>