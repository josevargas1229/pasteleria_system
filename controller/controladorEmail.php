<?php

include_once 'utilities/EmailSender.php';
use Utilities\EmailSender;

class controladorEmail 
{
    public function recuperar($id, $email) {
        $emailSender = new EmailSender();
        $tokenGenerator=new TokenGenerator();
        $token=$tokenGenerator->generarToken($id);
        if ($emailSender->recuperarPass($email,$token)) {
            $mensaje="<script type='module'> 
                    import { mensaje } from '/Sistema_Pasteleria/utilities/mensajes.js';
                    mensaje('Correo enviado correctamente', 'success');
                </script>";
        } else {
            $mensaje="<script type='module'> 
                    import { mensaje } from '/Sistema_Pasteleria/utilities/mensajes.js';
                    mensaje('Correo no enviado, intente nuevamente', 'error');
                </script>";
        }
        $vista = "view/access/frmrecuperacion.php";
        include_once("view/frmPublic.php");
    }

    public function validar() {
        $emailSender = new EmailSender();
        $to = $_POST['correo'];

        if ($emailSender->validarEmail($to)) {
            echo 'Correo enviado exitosamente.';
        } else {
            echo 'Error al enviar el correo.';
        }
        
    }
    public function token($id, $to) {
        $emailSender = new EmailSender();
        $tokenGenerator=new TokenGenerator();
        $token=$tokenGenerator->generarToken($id);
        if ($emailSender->mandarToken($to,$token)) {
            $vista="view/recuperaciones/frmSetToken.php";
            include_once("view/frmPublic.php");
        } else {
            $vista = "view/access/frmrecuperacion.php";
            include_once("view/frmPublic.php");
            echo "<script type='module'> 
                    import { mensaje } from '/Sistema_Pasteleria/utilities/mensajes.js';
                    mensaje('Correo no enviado, intente nuevamente', 'error');
                </script>";
        }
    }
}
