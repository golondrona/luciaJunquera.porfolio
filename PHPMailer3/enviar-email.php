<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Exception class. */
require 'Exception.php';

/* The main PHPMailer class. */
require 'PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require 'SMTP.php';

//$email = new PHPMailer(TRUE);
/* ... */

// La instanciación y el paso de `true` habilita excepciones 
$mail = new PHPMailer ( true );

try {
     
     $name = $_POST["name"];
     $email = $_POST["email"];
     $telefono = $_POST["telefono"];
     $mensaje = $_POST["mensaje"];
     

     // Configuración del servidor 
    //$mail->SMTPDebug = SMTP :: DEBUG_SERVER ;                      // Habilita la salida de depuración detallada 
    //$mail->isSMTP ();                                            // Enviar usando SMTP 
    $mail->Host        = 'mail.zaragozahurricanes.es' ;                    // Configure el servidor SMTP para enviar a través de 
    $mail->SMTPAuth    = true ;                                   // Habilita la autenticación SMTP 
    $mail->Username     = 'welcome@zaragozahurricanes.es' ;                     // Nombre 
    $mail->Password    = 'qwe123QWeasd' ;                               // Contraseña SMTP 
    $mail->SMTPSecure = PHPMailer :: ENCRYPTION_STARTTLS ;         // Habilite el cifrado TLS; `PHPMailer :: ENCRYPTION_SMTPS` recomienda 
    $mail->Port        = 587 ;                                    // Puerto TCP para conectarse, use 465 para `PHPMailer :: ENCRYPTION_SMTPS` arriba

    // Destinatarios 
    $mail->setFrom ( 'welcome@zaragozahurricanes.es' , 'Zaragoza Hurricanes' );
    $mail->AddAddress ("welcome@zaragozahurricanes.es");     // Agrega un destinatario 
    //$mail->AddAddress ("$email"); 
    //$mail->addAddress ( '' );               // El nombre es opcional 
    //$mail->addReplyTo ( '' , '' );
    //$mail->addCC ('');
    //$mail->addBCC ( '' );

    // Archivos adjuntos 
    //$mail->addAttachment ( '/var/tmp/file.tar.gz' );         // Agregar archivos adjuntos 
   // $mail->addAttachment ( '' );    // Nombre opcional

    // Contenido 
    $mail->isHTML(); // Establecer el formato de correo electrónico en HTML 
    $mail->Subject = 'Zaragoza Hurricanes_Gracias por contactarnos' ;
    $mail->Body =  '<img src="https://zaragozahurricanes.000webhostapp.com/images/emailcontacto.jpg"'.$name.'<br>'.$email.'<br>'.$telefono.'<br>'.$mensaje;
    $mail->AltBody = 'Este es el cuerpo en texto plano para clientes de correo que no son HTML' ;

    $mail->Send();
    header('Location: https://www.zaragozahurricanes.es/contacto2.php');
} catch ( Exception  $e ) {
     echo  "No se pudo enviar el mensaje. Error de correo: {$mail-> ErrorInfo}" ;
}