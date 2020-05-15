<?php 
 require_once 'conexion.php';

 /**
  * 
  */
 class ProductosModels extends Conexion
 {
	 public $db;
	 public $inicioPag;
	 protected $nomsb;
	 private $whereCTP;

 	public function __construct()
 	{
 		$this->db = Conexion::conectar();
	 }
	 
	function setelementos($numRows){
		$this->inicioPag = $numRows;
	}

	function setnomsb($nomSublinea){
		$this->nomsb = $nomSublinea;
	}

	function setWhere($where){
		$this->whereCTP = $where;
	}

	public function conseguirTodosPagination($tabla,$numElementospg){
 		$selectPagination = "select * from $tabla {$this->whereCTP} LIMIT {$this->inicioPag},$numElementospg";
 		$pagination = $this->db->prepare($selectPagination);
 		$pagination->execute();
 		return $pagination->fetchAll();
 		$pagination->close();
 	}

 	public function getTodos($tabla,$tabla2){
		$innerPAg = "SELECT tbl1.idProducto,tbl1.nombreProducto,tbl1.modeloProducto,tbl1.fotoProdcuto 
					FROM sublinea as tbl2 
					INNER JOIN productos as tbl1 
					ON tbl2.idSublinea = tbl1.idSublineaProducto
					WHERE tbl2.nombreSublinea = :ns
					ORDER BY tbl2.nombreSublinea asc";
		$paginationInner = $this->db->prepare($innerPAg);
		$paginationInner->bindParam(':ns',$this->nomsb,PDO::PARAM_STR);
		$paginationInner->execute();
		return $paginationInner->fetchAll();
		$paginationInner->close();
	}

 }

