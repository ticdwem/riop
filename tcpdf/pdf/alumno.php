<?php
// require_once '../../controllers/AlumnosController.php';
// require_once '../../controllers/AlumnosController.php';
require_once '../../models/alumnoModels.php';
require_once '../../models/gruposModels.php';
require_once '../../models/crypt.php';
/**
 * 
 */
class ImprimirAlumno
{
	public $alumno;
	
	public function traerImpresionAlumno()
	{
		$id = $this->alumno;
		$sexo = "";
		$ocupacion = "";
		$estudioAnteriores = "";
		$especifique = "";
		$enterar = "";
		$motivo = "";
	$respuestaAlumno = IngresoAlumno::getIdAlumnoModels($id,"alumno");

	if(!empty($respuestaAlumno[0]["fotoAlumno"])){

	$foto = $respuestaAlumno[0]["fotoAlumno"];
	$imageContent = file_get_contents($foto);
	$path = tempnam(sys_get_temp_dir(), 'prefix');
	file_put_contents ($path, $imageContent);
	$img = '<img src="' . $path . '">';
	}else{
		$img = '<img src="images/images.jpg" width="80" height="63">';
	}
	$fechaNac =date("d-m-Y",strtotime($respuestaAlumno[0]["fechaNAlumno"]));
	if ($respuestaAlumno[0]["sexoAlumno"]==1) {
		$sexo = "HOMBRE";
	} elseif($respuestaAlumno[0]["sexoAlumno"]==2){
		$sexo = "MUJER";
	}

	switch ($respuestaAlumno[0]["ocupacionAlumno"]) {
	case '2':
		$ocupacion = "TRABAJADOR";
		break;
	case '3':
		$ocupacion = "UNIVERSITARIO(SUPERIOR)";
		break;
	case '4':
		$ocupacion = "ESPERA RESULTADOS SUPERIOR";
		break;
	case '5':
		$ocupacion = "INTER-UNIVERSITARIO";
		break;
	case '6':
		$ocupacion = "INDEPENDIENTE";
		break;
	case '7':
		$ocupacion = "CASA";
		break;
	
	default:
		$ocupacion = "SIN DATOS";
		break;
}

switch ($respuestaAlumno[0]["esAntIngAlumno"]) {
	case '8':
		$estudioAnteriores = "SI";
		break;
	case '9':
		$estudioAnteriores = "NO";
		break;
	
	default:
		# code...
		break;
}

switch ($respuestaAlumno[0]["especifiqueEsAlumno"]) {
	case '10':
		$especifique = "ESCUELA PRIVADA";
		break;
	case '11':
		$especifique = "CURSOS DE INGLÉS";
		break;
	case '12':
		$especifique = "AUTODIDACTA";
		break;
	case '13':
		$especifique = "ESTADIA EN EL EXTRANJERO";
		break;
	
	default:
		$especifique = "SIN DATOS";
		break;
}
	if ($respuestaAlumno[0]["numIntAlumno"] == 0) {
		$numInt = "S/N";
	} else {
		$numInt = $respuestaAlumno[0]["numIntAlumno"];
	}

	if ($respuestaAlumno[0]["numExtAlumno"] == 0) {
		$numExt = "S/N";
	} else {
		$numExt = $respuestaAlumno[0]["numExtAlumno"];
	}

 switch ($respuestaAlumno[0]["enterarAlumno"]) {
 	case '14':
		$enterar = "MANTA";
		break;
 	case '15':
		$enterar = "BARDA";
		break;
	case '16':
		$enterar = "CARTEL";
		break;
	case '17':
		$enterar = "INTERNET";
		break;
	case '18':
		$enterar = "SECCION AMARILLA";
		break;
	case '19':
		$enterar = "VOLANTE";
		break;
	case '20':
		$enterar = "RECOMENDACION";
		break;
	case '21':
		$enterar = "OTRO";
		break;
 	
 	default:
 		$enterar = "DIN DATO";
 		break;
 }

	switch ($respuestaAlumno[0]["motivoAlumno"]) {
	case '22':
		$motivo = "ESCUELA";
		break;
 	case '23':
		$motivo = "TRABAJO";
		break;
	case '24':
		$motivo = "CERTIFICACIÓN";
		break;
	case '25':
		$motivo = "SUPERACION PERSONAL";
		break;
	case '26':
		$motivo = "CONOCER PERSONAS";
		break;
	case '27':
		$motivo = "VACACIONES/VIAJAR";
		break;
		
		default:
			$motivo = "SIN DATOS";
			break;
	}

	$tabla1 = "grupo";
		$tabla2 = "nivel";
		$tabla3 = "horario";
		$tabla4 = "nombregrupo";
		$tabla5 = "grupoalumno";
		$grupoAlumnoPdf = GruposM::grupoIdAlumnoModels($id,$tabla1,$tabla2,$tabla3,$tabla4,$tabla5);

require_once('tcpdf_include.php');


$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', true);
// set margins
$pdf->SetMargins(10, PDF_MARGIN_TOP, 10);
$pdf->startPageGroup();

$pdf->AddPage();
// set alpha to semi-transparency
$pdf->SetAlpha(0.2);
$pdf->Image('images/logoIudi.jpg',15,25,'240','300');
// restore full opacity
$pdf->SetAlpha(1);
$pdf->Image('images/logoIudi.jpg',10,15,45); 

//Arial bold 15 
$pdf->SetFont('times','B',9);

//foto
$pdf->SetXY(65,20);
$pdf->Cell(30,25,"",1,1,'');

$pdf->SetXY(65,22);
$pdf->writeHTMLCell(30,25, "", "", $img, '', 0, 0, true, '', true);


$pdf->SetXY(70,46);
$pdf->Cell(29,5,$id,0,0,'');


//cuadro confidencial
$pdf->SetXY(110,15);
$pdf->Cell(90,44,'',1,1,'');

$pdf->SetFillColor(189, 195, 199);
$pdf->SetXY(111,17);
$pdf->Cell(88,6,'CONFIDENCIAL',1,1,'C', 1, 1, '' ,'', true);

$pdf->SetXY(111,23);
$pdf->Cell(88,6,'FECHA INICIO: '.$respuestaAlumno[0]["fechaInicioAlumno"],1,1,'L');

$pdf->SetXY(111,30);
$pdf->Cell(88,6,'GRUPO: '.strtoupper($grupoAlumnoPdf[0]["nombreNombreGrupo"]),1,1,'L');

$pdf->SetXY(111,37);
$pdf->Cell(88,6,'HORARIO: '.$grupoAlumnoPdf[0]["nombreHorario"],1,1,'L');

$pdf->SetXY(111,44);
$pdf->Cell(88,6,'NIVEL: '.$grupoAlumnoPdf[0]["referencia"],1,1,'L');

$pdf->SetXY(111,51);
$pdf->Cell(88,6,'COLEGIATURA: $'.$respuestaAlumno[0]["coleAlumno"]."  MN",1,1,'L');

$pdf->Line(10, 62 , 200, 62);
// fin confidencial
// 
/*=====================================
=            inicio alumno            =
=====================================*/
$pdf->writeHTMLCell(0, 0, '', '', 'DATOS PERSONALES', 0, 1, 0, true, '', true);

$pdf->SetXY(10,65);
$pdf->Cell(190,30,'',0,0,'');

$pdf->SetXY(13,62);
$pdf->Write(7,'NOMBRE ALUMNO:');
$pdf->SetXY(45,62);
$pdf->Cell(72,7,SED::decryption($respuestaAlumno[0]["nombreAlumno"])." ".SED::decryption($respuestaAlumno[0]["apPaternoAlumno"])." ".SED::decryption($respuestaAlumno[0]["apMaternoAlumno"],'',50,'L'));

$pdf->SetXY(13,68);
$pdf->Write(7,'FECHA DE NACIMIENTO:');
$pdf->SetXY(45,68);
$pdf->Cell(40,7,$fechaNac,'',0,'C');

// $pdf->SetXY(80,70);
// $pdf->Write(7,'EDAD:');
// $pdf->SetXY(80,70);
// $pdf->Cell(40,7,'31','',0,'C');

$pdf->SetXY(160,62);
$pdf->Write(7,'EDAD:');
$pdf->SetXY(172,62);
$pdf->Cell(10,7,$respuestaAlumno[0]["edadAlumno"],'',0,'L');

$pdf->SetXY(121,62);
$pdf->Write(7,'SEXO:');
$pdf->SetXY(123,62);
$pdf->Cell(40,7,$sexo,'',0,'C');
/*=====  End of inicio alumno  ======*/


$pdf->writeHTMLCell(0, 0, 10, 77, 'DATOS CONTACTO', 0, 1, 0, true, '', true);
$pdf->Line(10, 82 , 200, 82);

/*======================================
=            datos contacto            =
======================================*/
$pdf->SetXY(13,82);
$pdf->Write(7,'TELEFONO CASA:');
$pdf->SetXY(45,82);
$pdf->Cell(25,7,SED::decryption($respuestaAlumno[0]["telCasaAlumno"]),'',0,'L');

$pdf->SetXY(100,82);
$pdf->Write(7,'EMAIL:');
$pdf->SetXY(115,82);
$pdf->Cell(25,7,SED::decryption($respuestaAlumno[0]["emailAlumno"]),'',0,'L');

$pdf->SetXY(13,88);
$pdf->Write(7,'TELEFONO CELULAR:');
$pdf->SetXY(50,88);
$pdf->Cell(25,7,SED::decryption($respuestaAlumno[0]["telMovilAlumno"]),'',0,'L');

$pdf->SetXY(100,88);
$pdf->Write(7,'NUMERO ELECTOR:');
$pdf->SetXY(135,88);
$pdf->Cell(25,7,SED::decryption($respuestaAlumno[0]["electorAlumno"]),'',0,'L');

$pdf->SetXY(13,94);
$pdf->Write(7,'TELEFONO TRABAJO:');
$pdf->SetXY(50,94);
$pdf->Cell(25,7,SED::decryption($respuestaAlumno[0]["TelTrabajoAlumno"]),'',0,'L');

$pdf->SetXY(100,94);
$pdf->Write(7,'OCUPACIÓN:');
$pdf->SetXY(125,94);
$pdf->Cell(25,7,$ocupacion,'',0,'L');

/*=====  End of datos contacto  ======*/
/*================================
=            estudios            =
================================*/
$pdf->writeHTMLCell(0, 0, 10, 103, 'ESTUDIOS', 0, 1, 0, true, '', true);
$pdf->Line(10, 108 , 200, 108);

$pdf->SetXY(13,108);
$pdf->Write(7,'ESCOLARIDAD:');
$pdf->SetXY(39,108);
$pdf->Cell(25,7,$respuestaAlumno[0]["escolaridadAlumno"],'',0,'L');

$pdf->SetXY(100,108);
$pdf->Write(7,'ESTUDIOS ANTERIORES DE INGLES:');
$pdf->SetXY(160,108);
$pdf->Cell(25,7,$estudioAnteriores,'',0,'L');

$pdf->SetXY(13,114);
$pdf->Write(7,'ESPECIFIQUE:');
$pdf->SetXY(38,114);
$pdf->Cell(25,7,$especifique,'',0,'L');

$pdf->SetXY(100,114);
$pdf->Write(7,'NOMBRE DEL INSTITUTO:');
$pdf->SetXY(100,118);
$pdf->Cell(25,7,$respuestaAlumno[0]["procedencia"],'',0,'L');
/*=====  End of estudios  ======*/
/*=================================
=            domicilio            =
=================================*/
$pdf->writeHTMLCell(0, 0, 10, 123, 'DOMICILIO', 0, 1, 0, true, '', true);
$pdf->Line(10, 128 , 200, 128);

$pdf->SetXY(13,128);
$pdf->Write(7,'CALLE:');
$pdf->SetXY(28,128);
$pdf->Cell(25,7,SED::decryption($respuestaAlumno[0]["calleAlumno"]),'',0,'L');

$pdf->SetXY(13,134);
$pdf->Write(7,'NUMERO INTERIOR:');
$pdf->SetXY(48,134);
$pdf->Cell(25,7,$numInt ,'',0,'L');

$pdf->SetXY(13,140);
$pdf->Write(7,'CODIGO POSTAL:');
$pdf->SetXY(43,140);
$pdf->Cell(25,7,$respuestaAlumno[0]["cpAlumno"],'',0,'L');

$pdf->SetXY(75,128);
$pdf->Write(7,'MZ:');
$pdf->SetXY(83,128);
$pdf->Cell(25,7,SED::decryption($respuestaAlumno[0]["mzAlumno"]),'',0,'L');

$pdf->SetXY(75,134);
$pdf->Write(7,'NUMERO EXTERIOR:');
$pdf->SetXY(110,134);
$pdf->Cell(25,7,$numExt,'',0,'L');

$pdf->SetXY(75,140);
$pdf->Write(7,'MUNICIPIO:');
$pdf->SetXY(97,140);
$pdf->Cell(25,7,SED::decryption($respuestaAlumno[0]["municipioAlumno"]),'',0,'L');

$pdf->SetXY(140,128);
$pdf->Write(7,'LT:');
$pdf->SetXY(148,128);
$pdf->Cell(25,7,SED::decryption($respuestaAlumno[0]["ltAlumno"]),'',0,'L');

$pdf->SetXY(140,134);
$pdf->Write(7,'COLONIA:');
$pdf->SetXY(158,134);
$pdf->Cell(25,7,SED::decryption($respuestaAlumno[0]["coloniaAlumno"]),'',0,'L');
/*=====  End of domicilio  ======*/
/*========================================
=            datos emergencia            =
========================================*/
$pdf->writeHTMLCell(0, 0, 10, 148, 'DATOS EMERGENCIA', 0, 1, 0, true, '', true);
$pdf->Line(10, 153 , 200, 153);

$pdf->SetXY(13,153);
$pdf->Write(7,'NOMBRE:');
$pdf->SetXY(30,153);
$pdf->Cell(25,7,SED::decryption($respuestaAlumno[0]["tutorAlumno"]),'',0,'L');

$pdf->SetXY(90,153);
$pdf->Write(7,'PARENTESCO:');
$pdf->SetXY(115,153);
$pdf->Cell(25,7,$respuestaAlumno[0]["parentescoEmergenciaAlumno"],'',0,'L');

$pdf->SetXY(140,153);
$pdf->Write(7,'TELEFONO:');
$pdf->SetXY(161,153);
$pdf->Cell(25,7,SED::decryption($respuestaAlumno[0]["emergenciaAlumno"]),'',0,'L');
/*=====  End of datos emergencia  ======*/
/*=============================================
=            datos complementarios            =
=============================================*/
$pdf->writeHTMLCell(0, 0, 10, 161, 'DATOS COMPLEMENTARIOS', 0, 1, 0, true, '', true);
$pdf->Line(10, 166 , 200, 166);

$pdf->SetXY(13,166);
$pdf->Write(7,'COMO SE ENTERO DEL INSTITUTO:');
$pdf->SetXY(71,166);
$pdf->Cell(25,7,$enterar,'',0,'L');

$i = $respuestaAlumno[0]["enterarAlumno"];

if($i == 20){
$pdf->SetXY(125,166);
$pdf->Write(7,'NOMBRE QUIEN RECOMIENDA:');
$pdf->SetXY(120,172);
$pdf->Cell(25,7,$respuestaAlumno[0]["recomiendaAlumno"],'',0,'L');
}elseif( $i == 21) {
$pdf->SetXY(125,166);
$pdf->Write(7,'OTRO MEDIO:');
$pdf->SetXY(120,172);
$pdf->Cell(25,7,$respuestaAlumno[0]["otroEnterarAlumno"],'',0,'L');
}

$pdf->SetXY(13,172);
$pdf->Write(7,'MOTIVO DE ESTUDIO DE INGLES:');
$pdf->SetXY(71,172);
$pdf->Cell(25,7,$motivo,'',0,'L');
/*=====  End of datos complementarios  ======*/
$pdf->SetXY(10,180);
$txt = '<h1>REGLAMENTO</h1>';
$pdf->SetFillColor(189, 195, 199);
$pdf->writeHTMLCell(0,0, '', '', $txt, 'LRTB', 1, 1, true, 'C', true);

$pdf->SetXY(5,187);
// set color for background
$pdf->SetFillColor(215, 235, 255);

// set some text for example
$txt1 = '1.-La colegiatura deben ser cubiertas puntualmente, en caso contrario será aplicado <span style="color:red">UN RECARGO DEL 7% POR SEMANA DE ATRASO.</span> inscrito el alumno no se devuelve el importe de la instripción.<br>2.-Tres faltas sin justificante el alumno será dado de baja automáticamente.En caso de reingreso debera cubrir costo de inscripción y ajustar su pago a la colegiatura vigente.<br>3.-No se permite la entrada al plantel con cualquier tipo de <span style="color:red">ALIMENTOS,BEBIDAS,ALIENTO ALCOHOLICO,NI CHICLES.</span><br>4.-Por autonomia de la escuela los grupos son de un minimo 4 alumnos, por lo tanto <span style="color:red">ESTE INSTITUTO SE RESERVA EL DERECHO DE REACOMODAR A LOS ALUMNOS EN OTRO GRUPO U HORARIO CUANDO SE INFRINJA ESTE NÚMERO DE PERSONAS</span>. Agradecemos su comprensión<br>5.-Los libros son requeridos dentro de la primer semana de inicio del curso , su uso es indispensable. <span style="color:red">POR CUESTIONES DE DERECHO DE AUTOR NO SE PERMITE EL FOTOCOPIADO DE LOS LIBROS.</span><br>6.-El pago de los exámenes debe ser cubierto el <span style="color:red;">DÍA DE SU APLICACIÓN</span><br>7.-Al inicio del curso entregar <span style="color:red">COPIA DE CREDENCIAL DE ELECTOR, COMPROBANTE DE DOMICILIO(NO MAYOR A DOS MESES),1 FOTOGRAFÍA TAMAÑO INFANTIL PARA SU EXPEDIENTE(OBLIGATORIO) O 2 SI REQUIERE CREDENCIAL(OPCIONAL)</span><br>8.-<span style="color:red">CUALQUER ASUNTO RELACIONADO CON SU CURSO</span>, aclaración, progreso mensual, justificación de faltas, claificaciones, pagos, quejas o sugerencias, <span style="color:red">SERAN ATENDIDOS POR PERSONAL DE OFICINA Y NO POR EL MAESTRO</span><br>9.-<span style="color:red"><u>LAS PROMOCIONES NO SON ACUMULABLES ENTRE SI DE EXISTIR ALGUNA VIGENTE</u></span><br>10.-El alumno debe mostrar respeto dentro del plantel, con sus compañeros, asi como personal docente y administrativo en todo momento, en caso contrario <span style="color:red">SERA INVITADO A RETIRARSE DEL INSTITUTO DE FORMA TEMPORAL, Y CUANDO EL CASO LO AMERITE EN FORMA DEFINTIVA</span><br>11.-<span style="color:red">EL MINIMO DE ASISTENCIAS</span> que debe cubrir el alumno durante el curso es del <span style="color:red">80% PARA APROBAR LOS CRÉDITOS EN CASO CONTRARIO DEBERA REPETIR EL NIVEL EN CURSO. AUNQUE HAYA OBTENIDO UNA CALIFICACIÓN APROBATORIA </sapn>';
// print a blox of text using multicell()
// $pdf->MultiCell(193, 60, $txt1."\n", 0, 'J', 1, 1, '' ,'', true);
$pdf->writeHTMLCell(200,89, '', '', $txt1."\n", '', '', '', true, 'J', true);

$pdf->SetXY(13,269);
$pdf->Write(7,'FECHA:');
$pdf->SetXY(28,269);
$pdf->Cell(25,7,date("d-m-Y",time()),'B',0,'L');

$pdf->SetXY(90,269);
$pdf->Write(7,'FIRMA DEL ALUMNO:');
$pdf->SetXY(130,269);
$pdf->Cell(50,7,'','B',0,'L');


$pdf->Output('alumno.pdf');
	}
}

$iAlumno = new ImprimirAlumno();
$iAlumno->alumno=$_GET["id"];
$iAlumno->traerImpresionAlumno();
 ?>