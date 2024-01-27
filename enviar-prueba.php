<?php

$nombre =$_POST["nombre"];
$correo =$_POST["correo"];
$telefono =$_POST["telefono"];
$mensaje =$_POST["mensaje"];

$body ="Nombre: " . $nombre . "<br>Correo:" . $correo . "<br>Telefono:" . $telefono . "<br>Mensaje:" . $mensaje ;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ramirezramireznavidad@gmail.com';                     //SMTP username
    $mail->Password   = 'navidad123navidad';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ramirezramireznavidad@gmail.com', 'irving');
    $mail->addAddress('navidadpenapena@gmail.com');     //Add a recipient
 

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'asunto muy importante';
    $mail->Body    = 'hola este es un correo de prueba';
   

    $mail->send();
    echo '<scrip>
        alert("el mensaje se envio correctamente");
        window.history.go(-1)
        </scrip>
 ';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}