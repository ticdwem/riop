<?php 
 require_once 'conexion.php';

 /**
  * 
  */
 class ModeloBase extends Conexion
 {
 	public $db;
 	public function __construct()
 	{
 		$this->db = Conexion::conectar();
 	}

	public function conseguirTodos($tabla,$where){
 		$selectAll = "select * from  $tabla $where";
 		$all = $this->db->prepare($selectAll);
 		$all->execute();
 		return $all->fetchAll();
 		$all->close();
 	}

 }

