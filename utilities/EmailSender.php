<?php

namespace Utilities;
require_once "vendor/autoload.php";

include_once 'utilities\TokenGenerator.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use Dotenv\Dotenv;
use TokenGenerator;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../'); 
$dotenv->load();

class EmailSender {
    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer(true);

        // Configuración del servidor SMTP
        $this->mail->isSMTP();
        $this->mail->SMTPAuth= true;
        $this->mail->Host= $_ENV['SMTP_HOST'];
        $this->mail->Port= $_ENV['SMTP_PORT'];
        $this->mail->Username= $_ENV['SMTP_USERNAME'];
        $this->mail->Password= $_ENV['SMTP_PASSWORD'];
        $this->mail->SMTPSecure = 'tls';

        // Otros ajustes
        $this->mail->CharSet = 'UTF-8';
        $this->mail->Encoding = 'base64';
        $this->mail->setFrom($_ENV['EMAIL_FROM'], $_ENV['EMAIL_FROM_NAME']);
        $this->mail->isHTML(true);
    }

    private function sendEmail($to, $subject, $body) {
        try {
            // Destinatario
            $this->mail->addAddress($to);

            // Asunto y cuerpo del mensaje
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;

            // Enviar el correo
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function recuperarPass($to,$token){
        $subject="Recuperación de contraseña";
        $body="Haz click en el siguiente enlace para recuperar tu contraseña: <a href='http://localhost/Sistema_Pasteleria/index?clase=controladorValidacion&metodo=cambiarPass&token=$token'>Recupera tu contraseña</a>";
        return $this->sendEmail($to,$subject,$body);
    }
    public function validarEmail($to){
        $subject="Validación de email";
        $body="";
        return $this->sendEmail($to,$subject,$body);
    }
    public function mandarToken($to,$token){
        $subject="Token de recuperación";
        $body="Su token de recuperación es <strong> $token</strong>";
        return $this->sendEmail($to,$subject,$body);
    }
}
