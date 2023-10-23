<?php namespace Mailer;
/*    
    4) Crea una clase PHP propia llamada Mailer (emplea buenas prácticas, 
    asígnale un namespace, llama adecuadamente a PHPMailer, etc) que contenga 
    un método para enviar emails, pasándole en la cabecera el remitente, 
    el destinatario, destinatario CC, y el path de un documento para adjuntar,
    teniendo en cuenta que los dos últimos parámetros pueden ser nulos. 
    
    5) Instancia la clase Mailer y envía distintos emails, verificando que llegan adecuadamente.*/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

class Mailer{
    private $mail;
    
    public function send($from,$to,$cc=null,$file=null){
        $this->mail = new PHPMailer(true);
        try {
            //Server settings
            $this -> mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $this -> mail->isSMTP();                                            //Send using SMTP
            $this -> mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $this -> mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this -> mail->Username   = 'limonmagico1@gmail.com';                     //SMTP username
            $this -> mail->Password   = 'khuc itpz tgoj gmez';                               //SMTP password
            $this -> mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $this -> mail->Port       = 587;

            $this -> mail->setFrom($from);
            $this -> mail->addAddress($to);
            if($cc!=null){
                $this -> mail->addCC($cc);
            }
            if($file!=null){
                $this -> mail->addAttachment($file);
            }
            $this->mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {mail->ErrorInfo}";
        }
    }
}
