<?php

class EnlacesModels{

	public function enlacesModel($enlaces){

		if($enlaces == "inicio"||
		   $enlaces == "conocenos"||
		   $enlaces == "catalogo-productos"||
		   $enlaces == "producto"||
		   $enlaces == "encuentranos"||
		   $enlaces == "contacto"){

			$module = "views/modules/".$enlaces.".php";
		}	

		else if($enlaces == "index"){
			$module = "views/modules/inicio.php";
		}else{
			//$module = "views/modules/inicio.php";	
			echo "nopo";	
		}

		return $module;

	}


}