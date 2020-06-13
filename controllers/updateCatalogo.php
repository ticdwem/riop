<?php 
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
class datosBack
{

	public function readexcel($argument){
	
		if (!empty($_FILES['fileContacts']['name'])) {
			$archivo = $_FILES["fileContacts"]["name"];
			$archivoCopiado = $_FILES["fileContacts"]["tmp_name"];
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
					$insert -> setIdMarcaProdcuto($cells[7]->getValue());
					$insert -> setUnidadBaseProducto($cells[8]->getValue());
					$insert -> setIdProveedorProducto($cells[9]->getValue());
					$insert -> setIdSublineaProducto($cells[10]->getValue());
					$insert -> setFotoProdcuto ($cells[11]->getValue());
					$insert -> insertProd();
				}
			}
			$reader->close();
			echo 3;
		} else {
			echo 2;
		}
	}
	
	/*public function actualizarTodo($argument)
	{

		$archivo = $_FILES["fileContacts"]["name"];
		$archivoCopiado = $_FILES["fileContacts"]["tmp_name"];
		$archivo_guardado = "../../guardarExcel/copia_".$archivo;
		$copi = copy($archivoCopiado,$archivo_guardado );

		if(file_exists($archivo_guardado)){
			try{
			set_time_limit(360);
			$fp = fopen($archivo_guardado, "r");
			$fila = 0;
				while ($datos = fgetcsv($fp,0,",")) {
					$fila ++;

					if($fila > 1){
						$insert = new Crud();
						$insert -> setCodigoProducto($datos[0]);
						$insert -> setNombreProducto($datos[1]);
						$insert -> setDescripcionProducto($datos[2]);
						$insert -> setModeloProducto($datos[3]);
						$insert -> setSkuProducto($datos[4]);
						$insert -> setCodigoSatProductos($datos[5]);
						$insert -> setPrecio($datos[6]);
						$insert -> setIdMarcaProdcuto($datos[7]);
						$insert -> setUnidadBaseProducto($datos[8]);
						$insert -> setIdProveedorProducto($datos[9]);
						$insert -> setIdSublineaProducto($datos[10]);
						$insert -> setFotoProdcuto ($datos[11]);
						$insert -> insertProd();
						
					}
				}
			fclose($fp);
			}catch(PathException $e){
				echo 'Exception';
			}
		}else{
			echo "2";
		}
	}*/
}