<?php 
require_once "../../controllers/articulosController.php";
require_once "../../controllers/productoscontrollers.php";
require_once "../../controllers/CatalogoController.php";
require_once "../../controllers/updateCatalogo.php";
require_once "../../controllers/categorias.php";
require_once '../../controllers/validacion.php';
require_once '../../controllers/usuario.php';
require_once '../../models/catLineaSub.php';
require_once '../../models/carrito.php';
require_once '../../models/crudProducto.php';
require_once '../../models/updateWithExcel.php';
require_once '../../models/crypt.php';
require_once '../../helpers/utils.php';
require_once "../../config/parameters.php";
// require_once "../../vendor/box/spout/src/Spout/Autoloader/autoload.php";


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
		
		$archivo = $_FILES["media"]["name"];
		$archivoCopiado = $_FILES["media"]["tmp_name"];
		
		$arrayDatos = array('archivo' => $archivo, 'temp' => $archivoCopiado );
		// var_dump($arrayDatos);
		// exit();
		//$excelRegreso = json_encode($arrayDatos);
		echo json_encode($arrayDatos);
		// $generar = new datosBackIn();
		// $generar->readexcel($ar);


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

	public function sumarProducto(){
		$query = $this->getDato();

		$generarQuery = new CatalogoController();
		$generarQuery->upPr($query);
	}

	public function restarPrProducto(){
		$query = $this->getDato();

		$generarQuery = new CatalogoController();
		$generarQuery->downPr($query);
	}
	public function starSessionUser(){
		$query = $this->getDato();

		$generarQuery = new Saveuser();
		$generarQuery->entrarSistema($query);
	}
	public function verifUser(){
		$query = $this->getDato();

		$generarQuery = new Saveuser();
		$generarQuery->verifUsuario($query);
	}
	public function closeSession(){
		$query = $this->getDato();
		$sesion = SED::decryption($query);

			Utls::deleteSession($sesion);
			return 0;
	}
	
}
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
// exit();

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
 if(isset($_FILES["media"])){
 	$ph = new Ajax();
 	$ph->setDato($_FILES["media"]);
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

  if (isset($_POST['sumarPr'])) {
 	$checks  = new Ajax();
 	$checks->setDato($_POST['sumarPr']);
 	$checks->sumarProducto();
 }  

 if (isset($_POST['restarPr'])) {
 	$checks  = new Ajax();
 	$checks->setDato($_POST['restarPr']);
 	$checks->restarPrProducto();
 }

  if (isset($_POST['loginUser'])) {
 	$checks  = new Ajax();
 	$checks->setDato($_POST['loginUser']);
 	$checks->starSessionUser();
 }  

 if (isset($_POST['user'])) {
 	$checks  = new Ajax();
 	$checks->setDato($_POST['user']);
 	$checks->verifUser();
 }
  if (isset($_POST['close'])) {
 	$checks  = new Ajax();
 	$checks->setDato($_POST['close']);
 	$checks->closeSession();
 }
?>
