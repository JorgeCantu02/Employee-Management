<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

@include 'config.php';

$email = $_POST['email'];
$query = "SELECT * FROM user_form where email = '$email'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

if($result->num_rows > 0){

    $mail = new PHPMailer(true);

    try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'georgy_rmz@hotmail.com';                     //SMTP username
    $mail->Password   = 'Jacr1402Ava';                               //SMTP password
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('georgy_rmz@hotmail.com', 'TV X CABLE');
    $mail->addAddress('jorge.cramirez02@hotmail.com', 'Usuario');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Recuperación de contraseña';
    $mail->Body    = 'Hola, este es un correo generado para solicitar tu recuperación de contraseña, 
    por favor, visita la pagina <a href="http://localhost/proyectoING/test/modificar_contrase%C3%B1a.php?id='.$row['id'].'">Recuperar contraseña</a>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header("Location: recuperar_datos.php?message=ok");
    } catch (Exception $e) {
    header("Location: recuperar_datos.php?message=error");
}


}else{
    header("Location: recuperar_datos.php?message=not_fount");
}

?>