<?php
require_once (RUTA_APP."/../vendor/autoload.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer{
    private $mail;
    
    public function send($from,$to,$mesage,$cc=null,$file=null){
        $this->mail = new PHPMailer(true);
        try {
            //Server settings
            $this -> mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $this -> mail->isSMTP();                                            //Send using SMTP
            $this -> mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $this -> mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            //$this -> mail->Username   = 'lombproyecto@gmai.com';                     //SMTP username
            //$this -> mail->Password   = 'nzwq sjcm pkfc tipv';                               //SMTP password
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
            $this -> mail->Body = $mesage;
            $this->mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {mail->ErrorInfo}";
        }
    }
}
