<?php 
 require_once 'conexion.php';

 /**
  * 
  */
 class ModeloBase extends Conexion
 {
	 public $db;
	 public $where;

 	public function __construct()
 	{
 		$this->db = Conexion::conectar();
	}
	 
	function getWhere(){
		return $this->where;
	}

	function setWhere($wComplemet){
		$this->where = $wComplemet;
	 }

	public function conseguirTodos($tabla){
 		$selectAll = "select * from  $tabla {$this->getWhere()}";
 		$all = $this->db->prepare($selectAll);
		$all->execute();
 		return $all->fetchAll();
 		$all->close();
 	}

 }

