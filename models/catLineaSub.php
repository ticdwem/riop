<?php 
 require_once 'conexion.php';

 /**
  * 
  */
 class CatLineaSub extends Conexion
 {
	 public $db;
	 public $tabla1;
	 public $tabla2;
	 public $tabla3;

 	public function __construct()
 	{
 		$this->db = Conexion::conectar();
	 }
	 
	function getTabla1() {
		return $this->tabla1;
	}

	function getTabla2() {
		return $this->tabla2;
	}

	function getTabla3() {
		return $this->tabla3;
	}

	function setTabla1($t1) {
		$this->tabla1 = $t1;
	}

	function setTabla2($t2) {
		$this->tabla2 = $t2;
	}

	function setTabla3($t3) {
		$this->tabla3 = $t3;
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
 		$innerPAg = "SELECT tbl1.codigoProducto,tbl1.nombreProducto,tbl1.modeloProducto,tbl1.fotoProdcuto 
						FROM $tabla2 as tbl2 
						INNER JOIN $tabla as tbl1 
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

 	public function getProductSpecifict($productoName){
		$innerPAg = "SELECT p.codigoProducto,p.nombreProducto,p.descripcionProducto,p.modeloProducto,
							p.skuProducto,p.unidadBaseProducto,p.fotoProdcuto,mr.nombreMarca,mr.fotoMarca,
							sb.nombreSublinea 
					FROM ".$this->getTabla1()." p
					INNER JOIN ".$this->getTabla2()." mr
					ON p.idMarcaProdcuto = mr.idMarca
					INNER JOIN ".$this->getTabla3()." sb
					ON p.idSublineaProducto = sb.idSublinea
					WHERE p.codigoProducto = :nompr";
		$paginationInner = $this->db->prepare($innerPAg);
		$paginationInner->bindParam(':nompr',$productoName,PDO::PARAM_STR);
		$paginationInner->execute();
		return $paginationInner->fetchAll();
		$paginationInner->close();
	}

 }