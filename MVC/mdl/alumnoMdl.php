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
		function listar($grupo){
			if($grupo == 1){
				return $a = array ("Juanito","Fulanito","Manganito","Perenganito");
			}
			else if($grupo == 2){
				return $b = array ("Pedro","Lalo","Francisco","Ignacio");
				}			
			else if($grupo == 3){
				return $c = array ("Javier","Ivan","Lucio","Irma","Victor");
			}
			else return false;
				
		}
	 }
	 
?>