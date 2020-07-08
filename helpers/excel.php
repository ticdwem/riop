<?php 
require_once "../models/crypt.php";
require_once "../models/updateWithExcel.php";
require_once "../controllers/validacion.php";
require_once "../helpers/spout-3.1.0/src/Spout/Autoloader/autoload.php";
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;



class DatosBack
{

	public function gnerateQuery($argument)
	{
		$categoria;
		$tabla;
		$data = json_decode($_GET['dtos'],true);
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
					$categoria = "idMarcaProdcuto";
					$tabla = "productos";
					break;
			};

			$get = new GetAndSetFilas();
			$get ->setDatos($datos);
			$get ->setTabla($tabla);
			$get ->setWhere($categoria);
			$get ->setIdCategoria($last['id']);
			$filas = $get->getDinamico();
			
			$writer = WriterEntityFactory::createXLSXWriter();
			// $filePath = url_home."\Downloads\modificar".ucfirst($last['tabla']).date('i_s').".xlsx";
			$fileName = ucfirst($last['tabla']).$last['id'].date('i_s').".xlsx";
			$writer->openToBrowser($fileName); // stream data directly to the browser
			// $writer->openToFile($filePath);
			//agregamos encabezado
			$row = WriterEntityFactory::createRowFromArray($data);
			$writer->addRow($row);
			//imprimimos en las filas
			 foreach ($filas as $indice) {
				$row = WriterEntityFactory::createRowFromArray($indice);
				$writer->addRow($row);
			 }
			$writer->close();

		}
		
	}
}
if(isset($_GET["dtos"])){
$datos = new DatosBack();
$datos->gnerateQuery($_GET["dtos"]);
}