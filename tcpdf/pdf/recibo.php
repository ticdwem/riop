<?php
require_once '../../models/alumnoModels.php';
require_once '../../models/gruposModels.php';
require_once '../../models/PagosModels.php';
require_once '../../models/crypt.php';
require_once '../../controllers/NumeroALetras.php';

class ImprimirPagoAlumno
{
	public $alumno;
	public $pagoT;
	private $fecha;
	
	public function traerImpresionReciboAlumno()
	{
		$id = $this->alumno;
		$pago = $this->pagoT;
		$concepto = "";
		$fecha = date("d") . " / " . date("m") . " / " . date("Y");
		$meses = 'MENSUALIDADES ';
		
	$recivoAlumno = IngresoAlumno::getIdAlumnoModels($id,"alumno");
	if(!empty($recivoAlumno)){

	$tabla1 = "grupo";
		$tabla2 = "nivel";
		$tabla3 = "horario";
		$tabla4 = "nombregrupo";
		$tabla5 = "grupoalumno";
		$grupoAlumnoPdf = GruposM::grupoIdAlumnoModels($id,$tabla1,$tabla2,$tabla3,$tabla4,$tabla5);
		if($pago>0){
			$showRecibo = "AND pg.impresionPago = 1";
			$resultPAgos=PagosModels::selectPagos($id,"pagos",$showRecibo);
			$contarPagos = count($resultPAgos);

			

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// ---------------------------------------------------------

// set font
$pdf->SetFont('Courier', 'B', 10);
$pdf->setPrintHeader(false); //no imprime la cabecera ni la linea 
$pdf->setPrintFooter(false); //no imprime el pie ni la linea 
$pdf->AddPage('L', array(133,119)); 
$pdf->SetXY(7,10);
$pdf->Cell(120,88,'',1,1,'');


$pdf->SetXY(85,12);
$pdf->Cell(37,10,'8475',1,0,'C');

$pdf->SetXY(47,24);
$pdf->Cell(34,10,$fecha,1,1,'C');

$pdf->SetXY(85,24);
$pdf->Cell(37,10,$pago.".00",1,1,'C');

$pdf->SetXY(10,36);
$pdf->Cell(113,10,NumeroALetras::convertir($pago)."PESOS / 100",1,1,'L');

$pdf->SetXY(10,49);
$pdf->Cell(113,10,SED::decryption($recivoAlumno[0]["nombreAlumno"])." ".SED::decryption($recivoAlumno[0]["apPaternoAlumno"])." ".SED::decryption($recivoAlumno[0]["apMaternoAlumno"]),1,1,'L');

$pdf->SetXY(10,62);
$pdf->Cell(54,10,$grupoAlumnoPdf[0]["nombreHorario"],1,1,'C');

$pdf->SetXY(66,62);
$pdf->Cell(57,10,strtoupper($grupoAlumnoPdf[0]["nombreNombreGrupo"]),1,1,'C');


		
$pdf->SetXY(10,77);
$pdf->SetFont("Courier", "BI", 8, 0, "false");
$sl = 60;
for ($i=0; $i <$contarPagos ; $i++) { 
	$jsonMes= json_decode($resultPAgos[$i]["conceptoPago"],true);
	 $countMesArray= count($jsonMes["MesesPagados"]);

	 if ($resultPAgos[0]["debePago"]>0) {
		$countMesArray = $countMesArray-1;
	}
	    if($jsonMes!= null){
	    	$ini = array_values($jsonMes["MesesPagados"])[0]["meses"];
	    	unset($jsonMes["MesesPagados"][$countMesArray]);
	    	$end = end($jsonMes["MesesPagados"]);
	    	$find = $end["meses"];
		$pdf->writeHTMLCell(57,4, '', '',"-- Del mes de ".$ini." Al mes de ".$find."\n", '', '', '', true, 'L', true);
	    	$pdf->Ln(6);
		}else{
		$pdf->writeHTMLCell($sl,10, '', '',"--".$resultPAgos[$i]["conceptoPago"]."\n", '', '', '', true, 'J', true);
		if ($sl == $sl) {
			 $pdf->Ln(2);
		 }	

		}
		$sl+=60;		
}
$pdf->SetFont('Courier', 'B', 10);
$pdf->SetXY(67,77);
$pdf->Cell(56,10,'',1,1,'L');

//Close and output PDF document
$pdf->Output('recibo', 'I');
}
		}else{
			echo "<img src='images/noFound.jpg' alt='Smiley face'>";
		}
	}
}

$iAlumno = new ImprimirPagoAlumno();
$iAlumno->alumno=$_GET["id"];
$iAlumno->pagoT=$_GET["p"];
$iAlumno->traerImpresionReciboAlumno();
 ?>