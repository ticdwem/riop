<?php


use Spipu\Html2Pdf\Html2Pdf;

class CatalogoController{
    private $idP;


    public function add($idProducto){

        $producto = $this->idP=$idProducto;
        if(strlen($producto)>1){
			$validar = new Validacion();
			$veamos = $validar->pregmatchletras($producto);
			if($veamos == '0'){
				echo 0; // este debe redirigir al inicio de la pagina, con un alert que diga que no fue agregado al carrito por que los datos estan mal
			}else{
				$producto_id = $veamos;
			}
		}
        if(isset($_SESSION['carrito'])){
            $fullCart = count($_SESSION['carrito']);
            $counter = 0;
           foreach ($_SESSION['carrito'] as $indice => $elmento) {
               if($elmento['idPRoducto'] == $producto_id){
                    // $_SESSION['carrito'][$indice]['unidades']++;
                    // $counter ++;
                    echo 4;
                    exit();
               }
           }
        }
        if(!isset($counter) || $counter == 0){
            if(!isset($_SESSION['carrito'])||$fullCart<10){ 
                // conseguir producto
                $addPro = new Carrito();
                $addPro->setPrivateid($producto_id);
                $addPro->setPrivatetabla('productos');
                $addPro->setPrivatetabla2('marca');
                $addPro->setPrivatetabla3('sublinea');
                $addPro = $addPro->getProductSpecifict();
                if(is_array($addPro)){
                    $_SESSION['carrito'][]=array(
                        "idPRoducto"=>$addPro[0]['codigoProducto'],
                        "sku"=>$addPro[0]['skuProducto'],
                        "precio" => $addPro[0]['precio'],
                        "unidades"=>1,
                        "producto"=>$addPro
                    );
                }else{
                    echo 0;
                    exit();
                }
            }else{
                echo 3;
                exit();
            }
        }
        echo 1;
        
    }
    
    public function remove(){

    }

    public function delete_all(){
        require_once 'helpers/utils.php';
        Utls::deleteSession('carrito');

    }

    public function generatePdf($datos){
require_once "../../vendor/autoload.php";


$html2pdf = new Html2Pdf();
$html = '<h1>HelloWorld</h1>This is my first test';
$html.="<p>este es unmaster en php</p>";
$html2pdf->writeHTML($html);
$html2pdf->output('juihihi.pdf');


    }
}