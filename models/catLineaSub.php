<?php 
 require_once 'conexion.php';

 /**
  * 
  */
 class CatLineaSub extends Conexion
 {
 	public $db;
 	public function __construct()
 	{
 		$this->db = Conexion::conectar();
 	}

	public function conseguirSublinea($tabla,$tabla2,$idSublinea){
 		$selectPagination = "SELECT * FROM $tabla tbl2
							INNER JOIN $tabla2 tbl1
							ON tbl2.idLinea = tbl1.idLinea
							WHERE tbl2.idLinea = :id
							ORDER BY tbl2.nombreSublinea asc";
 		$pagination = $this->db->prepare($selectPagination);
 		$pagination->bindParam(':id',$idSublinea,PDO::PARAM_INT);
 		$pagination->execute();
 		return $pagination->fetchAll();
 		$pagination->close();
 	}

 	public function getPersonalizado($tabla,$tabla2,$nomSulinea,$page,$numeElements){
 		$innerPAg = "SELECT tbl1.codigoProducto,tbl1.nombreProducto,tbl1.modeloProducto,tbl1.fotoProdcuto FROM sublinea as tbl2 
							INNER JOIN productos as tbl1 
							ON tbl2.idSublinea = tbl1.idSublineaProducto
							WHERE tbl2.nombreSublinea = :ns
							ORDER BY tbl2.nombreSublinea asc
							LIMIT $page,$numeElements";
 		$paginationInner = $this->db->prepare($innerPAg);
 		$paginationInner->bindParam(':ns',$nomSulinea,PDO::PARAM_STR);
 		$paginationInner->execute();
 		return $paginationInner->fetchAll();
 		$paginationInner->close();
 	}

 }