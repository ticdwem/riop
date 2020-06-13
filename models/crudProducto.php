<?php 
 require_once 'conexion.php';
/**
 * 
 */
class Crud extends Conexion
{
	private $codigoProducto;
	private $nombreProducto;
	private $descripcionProducto;
	private $modeloProducto;
	private $skuProducto;
	private $codigoSatProductos;
	private $precio;
	private $idMarcaProdcuto;
	private $unidadBaseProducto;
	private $idProveedorProducto;
	private $idSublineaProducto;
	private $fotoProdcuto;

	public $db;
	function __construct()
	{
		$this->db = Conexion::conectar();
	}

    public function getCodigoProducto()
    {
        return $this->codigoProducto;
    }

    public function setCodigoProducto($codigoProducto)
    {
        $this->codigoProducto = $codigoProducto;

        return $this;
    }

    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;

        return $this;
    }

    public function getDescripcionProducto()
    {
        return $this->descripcionProducto;
    }

    public function setDescripcionProducto($descripcionProducto)
    {
        $this->descripcionProducto = $descripcionProducto;

        return $this;
    }

    public function getModeloProducto()
    {
        return $this->modeloProducto;
    }

    public function setModeloProducto($modeloProducto)
    {
        $this->modeloProducto = $modeloProducto;

        return $this;
    }

    public function getSkuProducto()
    {
        return $this->skuProducto;
    }

    public function setSkuProducto($skuProducto)
    {
        $this->skuProducto = $skuProducto;

        return $this;
    }

    public function getCodigoSatProductos()
    {
        return $this->codigoSatProductos;
    }

    public function setCodigoSatProductos($codigoSatProductos)
    {
        $this->codigoSatProductos = $codigoSatProductos;

        return $this;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    public function getIdMarcaProdcuto()
    {
        return $this->idMarcaProdcuto;
    }

    public function setIdMarcaProdcuto($idMarcaProdcuto)
    {
        $this->idMarcaProdcuto = $idMarcaProdcuto;

        return $this;
    }

    public function getUnidadBaseProducto()
    {
        return $this->unidadBaseProducto;
    }

    public function setUnidadBaseProducto($unidadBaseProducto)
    {
        $this->unidadBaseProducto = $unidadBaseProducto;

        return $this;
    }

    public function getIdProveedorProducto()
    {
        return $this->idProveedorProducto;
    }

    public function setIdProveedorProducto($idProveedorProducto)
    {
        $this->idProveedorProducto = $idProveedorProducto;

        return $this;
    }

    public function getIdSublineaProducto()
    {
        return $this->idSublineaProducto;
    }

    public function setIdSublineaProducto($idSublineaProducto)
    {
        $this->idSublineaProducto = $idSublineaProducto;

        return $this;
    }

    public function getFotoProdcuto()
    {
        return $this->fotoProdcuto;
    }

    public function setFotoProdcuto($fotoProdcuto)
    {
        $this->fotoProdcuto = $fotoProdcuto;

        return $this;
    }

    public function insertProd(){
    	$insertCod = "INSERT INTO productosPrueba
	(codigoProducto, nombreProducto, descripcionProducto, modeloProducto, skuProducto, codigoSatProductos, precio, idMarcaProdcuto, unidadBaseProducto, idProveedorProducto, idSublineaProducto, fotoProdcuto)
	VALUES ('{$this->getCodigoProducto()}', '{$this->getNombreProducto()}', '{$this->getDescripcionProducto()}', '{$this->getModeloProducto()}', '{$this->getSkuProducto()}', {$this->getCodigoSatProductos()}, {$this->getPrecio()}, {$this->getIdMarcaProdcuto()}, '{$this->getUnidadBaseProducto()}', '{$this->getIdProveedorProducto()}', {$this->getIdSublineaProducto()}, '{$this->getFotoProdcuto()}')";
 //    	$insertCod = "UPDATE productosprueba
	// SET		
	// 	nombreProducto='{$this->getNombreProducto()}',
	// 	descripcionProducto='{$this->getDescripcionProducto()}',
	// 	modeloProducto='{$this->getModeloProducto()}',
	// 	skuProducto='{$this->getSkuProducto()}',
	// 	codigoSatProductos={$this->getCodigoSatProductos()},
	// 	precio={$this->getPrecio()},
	// 	idMarcaProdcuto={$this->getIdMarcaProdcuto()},
	// 	unidadBaseProducto='{$this->getUnidadBaseProducto()}',
	// 	idProveedorProducto='{$this->getIdProveedorProducto()}',
	// 	idSublineaProducto={$this->getIdSublineaProducto()},
	// 	fotoProdcuto='{$this->getFotoProdcuto()}'
	// WHERE 
	// codigoProducto='{$this->getCodigoProducto()}'";
		$insert = $this->db->prepare($insertCod);
		$insert->execute();
		 if($insert){
            return "0";
        }else{
            return "1";
        }
        $insert->close();
    }
    
}



