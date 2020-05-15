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
	 
	function setWhere($wComplemet){
		$this->where = $wComplemet;
	 }

	public function conseguirTodos($tabla){
 		$selectAll = "select * from  $tabla {$this->where}";
 		$all = $this->db->prepare($selectAll);
		$all->execute();
 		return $all->fetchAll();
 		$all->close();
 	}

 }

