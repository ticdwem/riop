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
    
    public function remove($idPrd){
        $validar = new Validacion();
        $veamos = $validar->validarNumero($idPrd);
        if($veamos == '0'){
            echo 0; // este debe redirigir al inicio de la pagina, con un alert que diga que no fue agregado al carrito por que los datos estan mal
        }else{
            $producto_id = $veamos;
            //var_dump($_SESSION['carrito']);
            // var_dump ($_SESSION['carrito'][$idPrd]);
            unset($_SESSION['carrito'][$producto_id]);
        }


    }

    public function delete_all($sesionName){
        // require_once 'helpers/utils.php';
        Utls::deleteSession($sesionName);

    }
}