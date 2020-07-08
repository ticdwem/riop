<?php 

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Common\Entity\Style\CellAlignment;
use Box\Spout\Common\Entity\Style\Color;
class datosBackIn
{

	public function readexcel($argument){
	echo "*/*/*/*/**/*/*/*/*/*/*/*/*/*";
	var_dump($argument);
	exit();
		if (!empty($_FILES['fileContacts']['name'])) {
			$archivo = $_FILES["fileContacts"]["name"];
			$archivoCopiado = $_FILES["fileContacts"]["tmp_name"];
			// $archivo_guardado =  url_home."\AppData\Local\Temp".$archivo;
			$archivo_guardado = "../../guardarExcel/copia_".$archivo;
			$copi = copy($archivoCopiado,$archivo_guardado );

			$reader = ReaderEntityFactory::createXLSXReader();
			$reader->open($archivo_guardado);
			
			set_time_limit(360);
			foreach ($reader->getSheetIterator() as $Sheet) {
				foreach ($Sheet->getRowIterator() as $row) {
					$cells = $row->getCells();
					 $insert = new Crud();
					 $insert -> setCodigoProducto($cells[0]->getValue());
					 $insert -> setNombreProducto($cells[1]->getValue());
					 $insert -> setDescripcionProducto($cells[2]->getValue());
					 $insert -> setModeloProducto($cells[3]->getValue());
					 $insert -> setSkuProducto($cells[4]->getValue());
					 $insert -> setCodigoSatProductos($cells[5]->getValue());
					 $insert -> setPrecio($cells[6]->getValue());
					 //$insert -> setIdMarcaProdcuto($cells[7]->getValue());
					 $insert -> setUnidadBaseProducto($cells[7]->getValue());
					 $insert -> setIdProveedorProducto($cells[8]->getValue());
					// $insert -> setIdSublineaProducto($cells[10]->getValue());
					 //$insert -> setFotoProdcuto ($cells[11]->getValue());
					 $insert -> insertProd();
				}
			}
			$reader->close();
			echo 3;
		} else {
			echo 2;
		}
	}
}

// if(isset($_GET["upDatos"])){
// 	echo "*/*/*//*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/";
// 	$archivo = $_FILES["fileContacts"]["name"];
// 	var_dump($_GET["upDatos"]);
// 	var_dump($_GET["upDatos"]);
// }