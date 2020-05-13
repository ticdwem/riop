<?php

class Conexion{

	public function conectar(){

		try {
			$link = new PDO("mysql:host=107.180.51.82;dbname=rioPisuena","riop","TiCDWem_1986", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
			
		} catch (Exception $e) {
			die("error Conexting to Mysql Server:". $exc->getMessage());
		}

		return $link;
			
	}

}