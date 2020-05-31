<?php 
 require_once 'conexion.php';

 /**
  * 
  */
 class ProductosModels extends Conexion
 {
	 public $db;
	 private $inicioPag;
	 private $nomsb;
	 private $whereCTP;

	 public function __construct()
 	{
 		$this->db = Conexion::conectar();
	 }

	function getInicioPag() {
		return $this->inicioPag;
	}

	function getNomsb() {
		return $this->nomsb;
	}

	function getWhereCTP() {
		return $this->whereCTP;
	}

	function setInicioPag($inicioPag) {
		$this->inicioPag = $inicioPag;
	}	

	function setNomsb($nomsb) {
		$this->nomsb = $nomsb;
	}	

	function setWhereCTP($whereCTP) {
		$this->whereCTP = $whereCTP;
	}

	public function conseguirTodosPagination($tabla,$numElementospg){
 		$selectPagination = "select * from $tabla {$this->getWhereCTP()} LIMIT {$this->getInicioPag()},$numElementospg";
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

	public function getRandom($tabla){
		$randQuery = "SELECT codigoProducto,nombreProducto,fotoProdcuto,skuProducto FROM $tabla ORDER BY RAND() LIMIT {$this->getInicioPag()}";
		$rand = $this->db->prepare($randQuery);
		$rand->execute();
		return $rand->fetchAll();
		$rand->close();
	}

 }

