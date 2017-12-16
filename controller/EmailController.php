<?php

require('./controller/PHPMailer/class.phpmailer.php');
require('./controller/PHPMailer/class.smtp.php');

/**
 * Definición de constantes
 */
define('SMTP_AUTH', true);
define('SMTP_SECURE', 'ssl');
define('HOST', 'smtp.gmail.com');
define('PORT', 465);
define('USERNAME','jljorro@gmail.es');
define('PASSWORD','XuSgL5zsiFCg');
define('EMAIL_ADDRESS','jljorro@gmail.com');

function sendEmail($name, $email, $telefono, $comentarios) {

    $mensaje = "Hola, esto es una prueba";

    $result = mail(EMAIL_ADDRESS, 'Solicitud de contacto', $mensaje);

    return $result;

}

/*function sendEmailContacto($mensaje) {

    $mail = new PHPMailer();
    $mail->IsSMTP();

    $mail->SMTPAuth = SMTP_AUTH;
    $mail->SMTPSecure = SMTP_SECURE;
    $mail->Host       = HOST;
    $mail->Port       = PORT;
    $mail->Username   = USERNAME;
    $mail->Password   = PASSWORD;

    $mail->SetFrom(EMAIL_ADDRESS, 'Contacto');
    $mail->Subject    = "Solicitud de contacto desde cuentavidas.com";
    $mail->MsgHTML($mensaje);
    $mail->AddAddress(EMAIL_ADDRESS);

    if(!$mail->Send()) {
        return false;
    } else {
        return true;
    }
}*/

/*function sendEmailRemitente($mensaje) {

}*/