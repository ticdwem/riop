<?php 
 require_once 'conexion.php';

 /**
  * 
  */
 class ModeloBase extends Conexion
 {
	 public $db;
	 // private $datosConuslta;
	 public $where;

 	public function __construct()
 	{
 		$this->db = Conexion::conectar();
	}
	 
	function getWhere(){
		return $this->where;
	}

	function setWhere($wComplemet){
		$this->where = $wComplemet;
	 }

  /*  public function getDatosConuslta()
    {
        return $this->datosConuslta;
    }

    public function setDatosConuslta($datosConuslta)
    {
        $this->datosConuslta = $datosConuslta;

        return $this;
    }*/



	public function conseguirTodos($tabla){
 		$selectAll = "select * from  $tabla {$this->getWhere()}";
 		$all = $this->db->prepare($selectAll);
		$all->execute();
 		return $all->fetchAll();
 		$all->close();
 	}

 	/*public function queryDinamico($tabla){
 		$query = "select {$this->getDatosConuslta()"
 	}*/
}

