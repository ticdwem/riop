 <?php 
require_once "../config/parameters.php";
require_once "../helpers/spout-3.1.0/src/Spout/Autoloader/autoload.php";
require_once '../models/crudProducto.php';
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Common\Entity\Style\CellAlignment;
use Box\Spout\Common\Entity\Style\Color;
class datosBackIn
{
	private $extencion;

 /**
     * @return mixed
     */
    public function getExtencion()
    {
        return $this->extencion;
    }

    /**
     * @param mixed $extencion
     *
     * @return self
     */
    public function setExtencion($extencion)
    {
        $this->extencion = $extencion;

        return $this;
    }

	public function readexcel(){
		
		if ($this->getExtencion() == "xlsx") {
			$archivo = $_FILES["media"]["name"];
			$archivoCopiado = $_FILES["media"]["tmp_name"];
			$archivo_guardado ="../guardarExcel/copia_".$archivo;
			chown($archivo_guardado, 777);
			$copi = move_uploaded_file($archivoCopiado,$archivo_guardado);

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
			unlink("../guardarExcel/copia_".$archivo);
			header('Location:'.base_url.'success/xlsx');
		} else {
			echo "no es un archivo excel";
		}
	}
}

$extencion = pathinfo($_FILES["media"]["name"]);

$upload = new datosBackIn();
$upload->setExtencion($extencion["extension"]);
$upload->readexcel();