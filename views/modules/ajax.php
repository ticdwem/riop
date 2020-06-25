<?php 
require_once "../../controllers/articulosController.php";
require_once "../../controllers/productoscontrollers.php";
require_once "../../controllers/CatalogoController.php";
require_once "../../controllers/updateCatalogo.php";
require_once "../../controllers/categorias.php";
require_once '../../controllers/validacion.php';
require_once '../../models/catLineaSub.php';
require_once '../../models/carrito.php';
require_once '../../models/crudProducto.php';
require_once '../../models/updateWithExcel.php';
require_once '../../helpers/utils.php';
require_once "../../vendor/box/spout/src/Spout/Autoloader/autoload.php";

class Ajax{
	public $arraySent;
	public $arrayLinea;
	private $dato;
	public $producto;

public function getDato()
{
    return $this->dato;
}

public function setDato($archivo)
{
    $this->dato = $archivo;
    return $this;
}


	public function enviarCorreo(){
		$sent = $this->arraySent;
		$sent = Articulo::enviarEmail($sent);

		echo $sent;
	}

	public function consultaDato(){
		$datosArt = $this->arrayLinea;
		$descomprimir = json_decode($datosArt,true);
		$validarDatos = new Validacion();
		$valTabla = $validarDatos->valornumerico($descomprimir["datosS"][0]["tabla"]);
		$valTablaDos = $validarDatos->valornumerico($descomprimir["datosS"][0]["tabla2"]);
		$valIdLn = $validarDatos->validarNumero($descomprimir["datosS"][0]["valorrb"]);
		if($valTabla != -1 || $valTabla != 0 && $valTablaDos != -1 || $valTablaDos != 0 && $valIdLn != -1 || $valIdLn != 0){
			$verDatos = LineaSublinea::mostrarSublineas($valTabla,$valTablaDos,$valIdLn);
		}else{
			echo 0;
		}

	}

	public function carrito(){
		$idProducto = $this->producto;

		$guardarCarrito = new CatalogoController();
		$guardarCarrito->add($idProducto);
	}

	public function updateMasivo(){
		$ar = $this->getDato();
		
		$generar = new datosBack();
		$generar->readexcel($ar);

	}

	public function createQuery(){
		$query = $this->getDato();

		$generarQuery = new datosBack();
		$generarQuery->gnerateQuery($query);
	}

	public function deleteId(){
		$query = $this->getDato();

		$generarQuery = new CatalogoController();
		$generarQuery->remove($query);
	}
	public function vaciarCatalogo(){
		$query = $this->getDato();

		$generarQuery = new CatalogoController();
		$generarQuery->delete_all($query);
	}
	
}


if(isset($_POST["correoHaciaAjax"])){
	$sent = new Ajax();
	$sent -> arraySent = $_POST["correoHaciaAjax"];
	$sent -> enviarCorreo();
}

if(isset($_POST['valor'])){
	$consulta = new Ajax();
	$consulta -> arrayLinea=$_POST['valor'];
	$consulta -> consultaDato();
 
}
 if(isset($_POST["idProducto"])){
	 $id = new Ajax();
	 $id -> producto = $_POST["idProducto"];
	 $id->carrito();
 }
 if(isset($_FILES["fileContacts"])){
 	$ph = new Ajax();
 	$ph->setDato($_FILES["fileContacts"]);
 	$ph->updateMasivo();
 }

 if (isset($_POST['chek'])) {
 	$checks  = new Ajax();
 	$checks->setDato($_POST['chek']);
 	$checks->createQuery();
 }

 if (isset($_POST['idPRoducto'])) {
 	$checks  = new Ajax();
 	$checks->setDato($_POST['idPRoducto']);
 	$checks->deleteId();
 }

 if (isset($_POST['emoryy'])) {
 	$checks  = new Ajax();
 	$checks->setDato($_POST['emoryy']);
 	$checks->vaciarCatalogo();
 }
?>
