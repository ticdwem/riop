<?php 
require_once '../vendor/autoload.php';

use spipu/Html2Pdf/Html2Pdf;

$Html2Pdf = new Html2Pdf();

obj_start();
require_once 'catalogo-productos.php';
$html = ob_get_clean();

$Html2Pdf->writeHTML($html);
$Html2Pdf->output('pdf_generado.pdf');
