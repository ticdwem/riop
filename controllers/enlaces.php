<?php

class Enlaces{

	public function enlacesController(){

		if(isset($_GET["p"])){

			$enlaces = $_GET["p"];

		}

		else{

			$enlaces = "index";

		}

		$respuesta = EnlacesModels::enlacesModel($enlaces);

		include $respuesta;

	}


}