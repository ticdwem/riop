<?php 
use Spipu\Html2Pdf\Html2Pdf;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../config/parameters.php';
require_once '../vendor/autoload.php';
require_once '../controllers/validacion.php';
/**
 * 
 */

class Semail
{
    private $name;
    private $emmail;

        public function getName()
    {
        return $this->name;
    }

   
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    
    public function getEmmail()
    {
        return $this->emmail;
    }

    
    public function setEmmail($emmail)
    {
        $this->emmail = $emmail;

        return $this;
    }
    
    public function datos()
    {

        $validar = new Validacion();
        $name =  $validar->pregmatchletras($this->getName());
        $email = $validar->validarEmail($this->getEmmail());
       if($name === 0 || $email === 0){
         header('Location:'.base_url.'catalogo/error');
       }else{

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
                .imagen .description #pz{font-size:15px; color:red}

                </style>';
                require_once 'impresionDeCatalogo.php';
                $content.= ob_get_clean();

                $html2pdf = new HTML2PDF('L','A4','es', true, 'UTF-8'); //Configura la hoja
                $html2pdf->pdf->SetDisplayMode('fullpage'); //Ver otros parámetros para SetDisplaMode
                $html2pdf->writeHTML($content); //Se escribe el contenido
                $html2pdf->Output($_SERVER['DOCUMENT_ROOT'].'final-catalogo/generatePdf/ejemploss.pdf', 'F');

               

                function sendEmail($pdf,$user,$email)
                {
                    require 'phpmailer/folderMailer/Exception.php';
                    require 'phpmailer/folderMailer/PHPMailer.php';
                    require 'phpmailer/folderMailer/SMTP.php';
                    $emailHeader = 'CATALOGO RIO PISUEÑA';
                     $emailBody = '';
                     $emailBody .= 'HOLA '.$user.' muchas gracias por escribirnos , ';
                     $emailBody .= 'en breve nuestro personal en ventas enviara tu cotización de acuerdo a tus artículos selecciónados ';
                    
                    // Instantiation and passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                       //$mail->SMTPDebug = 2;                      // Enable verbose debug output
                        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   // Enable verbose debug output
                        $mail->isSMTP();                                            // Send using SMTP
                        $mail->Host       = 'smtp.live.com';                    	// Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                        $mail->Username   = 'mfta_1986@hotmail.com';                     // SMTP username
                        $mail->Password   = 'METROreforma1986';                               // SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                        //Recipients
                        $mail->setFrom('mfta_1986@hotmail.com', utf8_decode('Rio Pisueña'));
                        $mail->addAddress($email, $user);     // Add a recipient
                       // $mail->addAddress('ellen@example.com');               // Name is optional
                       // $mail->addReplyTo('maft_1986@hotmail.com', 'Information');
                        //$mail->addCC('ventas@riopisuena.com.mx');
                        $mail->addCC('maft_1986@hotmail.com');
                        //$mail->addBCC('bcc@example.com');
                        //$pdfContent = ; //Nombre default del PDF
                        //$mail->addAttachment($file);         // Add attachments
                        // Attachments
                        $mail->addStringAttachment(file_get_contents($pdf), 'mi_catalogo.pdf');
                       // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                        // Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = utf8_decode($emailHeader);
                        $mail->Body    = utf8_decode(strtoupper($emailBody));
                        $mail->AltBody = 'correo de rio pisueña';

                        $mail->send();

                         header('Location:'.base_url.'success');
                	} catch (Exception $e) {
                	    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                	}

                }

                 sendEmail($_SERVER['DOCUMENT_ROOT'].'final-catalogo/generatePdf/ejemploss.pdf',$this->getName(),$this->getEmmail());

            }
    }
}

if(isset($_POST["sent"])){

  $enviar = new Semail();
  $enviar->setName($_POST["nombre"]);
  $enviar->setEmmail($_POST["correo"]);
  $enviar->datos();

}