<?php 

require_once '../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
ob_start();
 $content = '
<style>

#header{
	margin-bottom:150px;
	width:100%;
	float: rigth;
	position:relative;
}
.imagenLogo{position:absolute;left:80%;}
.contenedor{width:100%;heigth:auto;}
.contenedor .imagen{width:180px; heigth:150px;display:inline;margin-right:50px}
.contenedor .imagen img{width:180px; heigth:150px}
.imagen .description{position:relative;top:180px;left:-180px;}
.imagen .description .descr{font-size:10px;}

</style>';
require_once 'impresionDeCatalogo.php';
$content.= ob_get_clean();
try
{
$html2pdf = new HTML2PDF('L','A4','es', true, 'UTF-8'); //Configura la hoja
$html2pdf->pdf->SetDisplayMode('fullpage'); //Ver otros parámetros para SetDisplaMode
$html2pdf->writeHTML($content); //Se escribe el contenido
$html2pdf->Output('Entrada_Individual.pdf'); //Nombre default del PDF
}
catch(HTML2PDF_exception $e) {
echo $e;
exit;
}