<?php
    class numeroCtrl{
    	public $modelo;
    	
		function __construct() {
			require('mdl/numeroMdl.php');
			$this->modelo = new numeroMdl();
		}
		
		
		function ejecutar(){
			if(isset($_POST['usarnum'])){
				if(preg_match("/[0-9]+/",$_POST['numero'])){
					switch($_POST['numero']){
						
					}
				}
			}
			
		}
    }
?>