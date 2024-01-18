<?php

include_once 'utilities/EmailSender.php';
use Utilities\EmailSender;

class controladorEmail 
{
    public function mandarEmail() {
        $emailSender = new EmailSender();
        $to = $_POST['correo'];
        $subject = 'Recuperación de contraseña';
        $body = 'Hola, aquí está tu nueva contraseña: <strong>123</strong>';

        if ($emailSender->sendEmail($to, $subject, $body)) {
            echo 'Correo enviado exitosamente.';
        } else {
            echo 'Error al enviar el correo.';
        }
    }
}
