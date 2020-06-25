<?php 
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Common\Entity\Style\CellAlignment;
use Box\Spout\Common\Entity\Style\Color;
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
	require_once "../../vendor/autoload.php";
		$categoria;
		$tabla;
		$data = json_decode($_POST['chek'],true);
		$last = end($data);
		$contar = count($data);
		unset($data[$contar-1]);

		$table = new Validacion();
		$id = $table->validarNumero($last['id']);
		$tbl = $table->pregmatchletras($last['tabla']);
		if($id != 0 || $tbl != 0){
			for ($i=0; $i <$contar-1 ; $i++) { 
				$dato = $table->pregmatchletras($data[$i]);
				if($dato == '0'){
					echo '100';
					break;
				}
			}

			$datos = implode(",", $data);
			switch ($last['tabla']) {
				case 'marca':
					$categoria = "idMarcaProdcuto";
					$tabla = "productos";
					break;
				case 'sublinea':
					$categoria = "idSublineaProducto";
					$tabla = "productos";
					break;	
				case 'proveedor':
					$categoria = "idProveedorProducto";
					$tabla = "productos";
					break;
				case 'linea':
					$categoria = "linea.idLinea";
					$tabla = "productos 
								INNER JOIN sublinea 
								ON idSublineaProducto = idSublinea 
								INNER JOIN linea 
								ON sublinea.idLinea = linea.idLinea";
					break;				
				default:
					# code...
					break;
			};

			$get = new GetAndSetFilas();
			$get ->setDatos($datos);
			$get ->setTabla($tabla);
			$get ->setWhere($categoria);
			$get ->setIdCategoria($last['id']);
			$filas = $get->getDinamico();
			
			$writer = WriterEntityFactory::createXLSXWriter();
			$filePath = url_home."\Downloads\modificar".ucfirst($last['tabla']).date('i_s').".xlsx";
			$writer->openToFile($filePath);
			//agregamos encabezado
			$row = WriterEntityFactory::createRowFromArray($data);
			$writer->addRow($row);
			//imprimimos en las filas
			 foreach ($filas as $indice) {
				$row = WriterEntityFactory::createRowFromArray($indice);
				$writer->addRow($row);
			 }
			$writer->close();
			echo '1';
		}else{
			echo '100';
		}

		
		
	}
}