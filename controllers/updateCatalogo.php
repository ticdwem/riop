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
	
	public function gnerateQuery($argument)
	{
		$data = json_decode($_POST['chek'],true);
		$last = end($data);

		$table = new Validacion();
		$id = $table->pregmatchletras($last['id']);
		$tbl = $table->pregmatchletras($last['tabla']);

		if($id != 1 || $tbl != 1){

			var_dump($data);
			$delete = array_pop($data);
			$datos = implode(",", $data);
		}

		// var_dump($last['tabla']);
		// var_dump($last['id']);
		
	}
}