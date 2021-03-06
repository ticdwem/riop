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
 		$innerPAg = "SELECT tbl1.codigoProducto,tbl1.nombreProducto,tbl1.modeloProducto,m.nombreMarca,tbl1.fotoProdcuto FROM sublinea as tbl2 
							INNER JOIN productos as tbl1 
							ON tbl2.idSublinea = tbl1.idSublineaProducto
							INNER JOIN marca as m
							ON tbl1.idMarcaProdcuto = m.idMarca
							WHERE tbl2.nombreSublinea = :ns
							ORDER BY tbl2.nombreSublinea asc
							LIMIT $page,$numeElements";
 		$paginationInner = $this->db->prepare($innerPAg);
 		$paginationInner->bindParam(':ns',$nomSulinea,PDO::PARAM_STR);
 		$paginationInner->execute();
 		return $paginationInner->fetchAll();
 		$paginationInner->close();
	 }
	 
	 public function getProductSpecifict($productoName,$tabla1,$tabla2,$tabla3){
		$innerPAg = "SELECT p.codigoProducto,p.nombreProducto,p.descripcionProducto,p.modeloProducto,
							p.skuProducto,p.unidadBaseProducto,p.fotoProdcuto,mr.nombreMarca,mr.fotoMarca,
							sb.nombreSublinea 
					FROM ".$tabla1." p 
					INNER JOIN ".$tabla2." mr
					ON p.idMarcaProdcuto = mr.idMarca
					INNER JOIN ".$tabla3." sb
					ON p.idSublineaProducto = sb.idSublinea
					WHERE p.codigoProducto = :nompr";
		$paginationInner = $this->db->prepare($innerPAg);
		$paginationInner->bindParam(':nompr',$productoName,PDO::PARAM_STR);
		$paginationInner->execute();
		return $paginationInner->fetchAll();
		$paginationInner->close();
	}


 }