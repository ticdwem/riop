<?php


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
            $counter = 0;
           foreach ($_SESSION['carrito'] as $indice => $elmento) {
               if($elmento['idPRoducto'] == $producto_id){
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter ++;
               }
           }
        }
        if(!isset($counter) || $counter == 0){
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
}