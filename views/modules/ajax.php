<?php 
require_once "../../controllers/articulosController.php";
require_once "../../controllers/productoscontrollers.php";
require_once "../../controllers/categorias.php";
require_once '../../controllers/validacion.php';
require_once '../../models/catLineaSub.php';

class Ajax{
	public $arraySent;
	public $arrayLinea;

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

?>
