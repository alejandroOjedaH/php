<?php
/*
1) Instala composer.phar en tu equipo e incluyelo en tu 
PATH para que puedas llamarlo desde cualquier directorio del SO.

2) Instalar PHPMailer tal y como indica en 
https://github.com/PHPMailer/PHPMailer mediante composer.

3) Emplea el código base de "A Simple Example" de la página de GitHub para autoenviarte un email de tu cuenta de Gmail a ti mismo.  Ejecuta el script PHP para ello, teniendo en cuenta que:

    3.1) El puerto es el 587

    3.2) En SMTSecure emplea  PHPMailer::ENCRYPTION_STARTTLS

    3.3) Adjunta un .PDF en el email*/

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'limonmagico1@gmail.com';                     //SMTP username
    $mail->Password   = 'khuc itpz tgoj gmez';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('limonmagico1@gmail.com');
    $mail->addAddress('limonmagico1@gmail.com');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('MockupdePortfolioAlejandro.pdf');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Prueba';
    $mail->Body    = 'Buenas inserte aqui nombre';
    $mail->AltBody = 'Alternativo el nombre';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}