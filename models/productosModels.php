<?php 
 require_once 'conexion.php';

 /**
  * 
  */
 class ProductosModels extends Conexion
 {
 	public $db;
 	public function __construct()
 	{
 		$this->db = Conexion::conectar();
 	}

	public function conseguirTodosPagination($tabla,$page,$numElementospg,$where){
 		$selectPagination = "select * from $tabla $where LIMIT $page,$numElementospg";
 		$pagination = $this->db->prepare($selectPagination);
 		$pagination->execute();
 		return $pagination->fetchAll();
 		$pagination->close();
 	}

 	public function getTodos($tabla,$tabla2,$nomSulinea){
		$innerPAg = "SELECT * FROM sublinea as tbl2 
						INNER JOIN productos as tbl1 
						ON tbl2.idSublinea = tbl1.idSublineaProducto
						WHERE tbl2.nombreSublinea = :ns
						ORDER BY tbl2.nombreSublinea asc";
		$paginationInner = $this->db->prepare($innerPAg);
		$paginationInner->bindParam(':ns',$nomSulinea,PDO::PARAM_STR);
		$paginationInner->execute();
		return $paginationInner->fetchAll();
		$paginationInner->close();
	}

 }

