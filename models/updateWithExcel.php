<?php 
 require_once 'conexion.php';

 /**
  * 
  */
 class GetAndSetFilas extends Conexion
 {
	 public $db;
	 private $tabla;
	 private $datos;
	 private $where;
	 private $idCategoria;

	 public function __construct()
 	{
 		$this->db = Conexion::conectar();
	}

	public function getTabla()
    {
        return $this->tabla;
    }

    public function setTabla($tabla)
    {
        $this->tabla = $tabla;

        return $this;
    }
    public function getDatos()
    {
        return $this->datos;
    }
    public function setDatos($datos)
    {
        $this->datos = $datos;

        return $this;
    }

    public function getWhere()
    {
        return $this->where;
    }

    public function setWhere($where)
    {
        $this->where = $where;

        return $this;
    }

     public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;

        return $this;
    }
	

	 public function getDinamico(){
	 	$query = "SELECT {$this->getDatos()} from {$this->getTabla()} WHERE {$this->getWhere()} = '{$this->getIdCategoria()}' ";
	 	$dinamico = $this->db->prepare($query);
	 	$dinamico->execute();
	 	return $dinamico->fetchAll(PDO::FETCH_ASSOC);
	 	$dinamico->close();

	 }



}

