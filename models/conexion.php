<?php

class Conexion{

	public function conectar(){

		try {
			 $link = new PDO("mysql:host=107.180.51.82;dbname=rioPisuena","riop","TiCDWem_1986", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

		 	// $link = new PDO("mysql:host=localhost;dbname=riopisuena","root","", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\'')); 
		return $link;
		} catch (Exception $e) {
			die("error Conexting to Mysql Server:". $e->getMessage());
		}

		return $link;
			
	}

}
