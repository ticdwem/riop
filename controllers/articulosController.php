<?php 
class Articulo 
{
	public function enviarEmail($correo){

		$descript = json_decode($correo,true);

		$destinatario = "ventas@riopisuena.com.mx"; 
		$asunto = "CORREO PAGINA WEB"; 
		$cuerpo = ' 
		<html> 
		<head> 
		   <title>CORREO DE '.strtoupper($descript['datosS'][0]['nombre']).'</title> 
		</head> 
		<body> 
		<!-- <h1>MENSAJE DE </h1>--> 
		<p> 
		<h3>MI NOMBRE:'.strtoupper($descript['datosS'][0]['nombre']).'</h3>
		<h3>MI TELEFONO:'.strtoupper($descript['datosS'][0]['telefono']).'</h3>
		<h3>MI CORREO:'.$descript['datosS'][0]['correo'].'</h3>
		<h3>MI DIRECCION:'.strtoupper($descript['datosS'][0]['direccion']).'</h3>

		<b>'.strtoupper($descript['datosS'][0]['mensajeMail']).'. 
		</p> 
		</body> 
		</html> 
		'; 

		//para el envío en formato HTML 
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

		//dirección del remitente 
		$headers .= "From: ".$descript['datosS'][0]['nombre']." <".$descript['datosS'][0]['correo'].">\r\n"; 

		//dirección de respuesta, si queremos que sea distinta que la del remitente 
		// $headers .= "Reply-To: mariano@desarrolloweb.com\r\n"; 

		//ruta del mensaje desde origen a destino 
		// $headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

		//direcciones que recibián copia 
		 $headers .= "Cc: aarmenta@riopisuena.com.mx,benitoruiz@riopisuena.com.mx\r\n"; 

		//direcciones que recibirán copia oculta 
		// $headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 

		echo mail($destinatario,$asunto,$cuerpo,$headers);
		
	}

}

?>

