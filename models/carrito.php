<?php 
 require_once 'conexion.php';
class Carrito 
{
    private $id;
    private $tabla1;
    private $tabla2;
    private $tabla3;
    private $db;

    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    
	function getPrivateid() { 
        return $this->privateid; 
   } 

   function setPrivateid($privateid) {  
       $this->privateid = $privateid; 
   } 

   function getPrivatetabla() { 
        return $this->privatetabla1; 
   } 

   function setPrivatetabla($privatetabla) {  
       $this->privatetabla1 = $privatetabla; 
   } 

   function getPrivatetabla2() { 
        return $this->privatetabla2; 
   } 

   function setPrivatetabla2($privatetabla) {  
       $this->privatetabla2 = $privatetabla; 
   } 

   function getPrivatetabla3() { 
        return $this->privatetabla3; 
   } 

   function setPrivatetabla3($privatetabla) {  
       $this->privatetabla3 = $privatetabla; 
   } 


    public function getProductSpecifict(){
		$innerPAg = "SELECT p.codigoProducto,p.nombreProducto,p.descripcionProducto,p.modeloProducto,
							p.skuProducto,p.precio,p.unidadBaseProducto,p.fotoProdcuto,mr.nombreMarca,mr.fotoMarca,
							sb.nombreSublinea 
					FROM {$this->getPrivatetabla()} p
					INNER JOIN {$this->getPrivatetabla2()} mr
					ON p.idMarcaProdcuto = mr.idMarca
					INNER JOIN {$this->getPrivatetabla3()} sb
					ON p.idSublineaProducto = sb.idSublinea
					WHERE p.codigoProducto = '{$this->getPrivateid()}'";
        $paginationInner = $this->db->prepare($innerPAg);
        $paginationInner->execute();
		return $paginationInner->fetchAll();
		$paginationInner->close();
	}
    
}
