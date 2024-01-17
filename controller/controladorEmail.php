<?php

namespace Controllers;

use Utilities\EmailSender;

include_once 'utilities/EmailSender.php';

class controladorEmail {
    public function mandarEmail() {
        $emailSender = new EmailSender();
        $to = 'asrockcine@gmail.com';
        $subject = 'Recuperación de contraseña';
        $body = 'Hola, aquí está tu nueva contraseña: <strong>123</strong>';

        if ($emailSender->sendEmail($to, $subject, $body)) {
            echo 'Correo enviado exitosamente.';
        } else {
            echo 'Error al enviar el correo.';
        }
    }
}
