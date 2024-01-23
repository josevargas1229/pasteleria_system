<?php
include_once 'model/clsValidacion.php';

include_once 'utilities\TokenGenerator.php';
class controladorValidacion
{

    private $vista;

    public function validar()
    {
        $vista = "view/access/frmValidacion.php";
        include_once("view/frmRecuperacion.php");
    }

    public function Acceder()
    {
        if (!empty($_POST)) {
            $correo = $_POST['txtCorreo'];
            $validacion = new clsValidacion();
            $datos = $validacion->consultaValidacion($correo);
            if ($datos->num_rows > 0) {
                while ($row = $datos->fetch_assoc()) {
                    $id = $row['idUser'];
                    $email = $row['vchCorreo'];
                }
                $vista = "view/access/frmrecuperacion.php";
                include_once("view/frmPublic.php");
                
            } else {
                $vista = "view/access/frmValidacion.php";
                
                include_once("view/frmPublic.php");
                echo "<script type='module'> 
                    import { mensaje } from '/Sistema_Pasteleria/utilities/mensajes.js';
                    mensaje('El correo ingresado no está registrado', 'error');
                </script>";
            }
        } else {
            $vista = "view/access/frmValidacion.php";
            include_once("view/frmPublic.php");
        }
    }
    
    public function cambiarPass()
    {
        if(!empty($_GET)){
            $token=$_GET['token'];
            $tokenGenerator=new TokenGenerator();
            $decoded=$tokenGenerator->verificarToken($token);
            if ($decoded) {
                $id= $decoded->userId;
                $vista="view/access/frmCambiarPass.php";
                include_once("view/frmPublic.php");
            } else {
                $vista="view/recuperaciones/frmTokenCaducado.php";
                include_once("view/frmPublic.php");
            }
            
        }
    }
    public function token()
    {
        if(!empty($_POST)){
            $token=$_POST['txtToken'];
            $tokenGenerator=new TokenGenerator();
            $decoded=$tokenGenerator->verificarToken($token);
            if ($decoded) {
                $id= $decoded->userId;
                $vista="view/access/frmCambiarPass.php";
                include_once("view/frmPublic.php");
            } else {
                $vista="view/recuperaciones/frmTokenCaducado.php";
                include_once("view/frmPublic.php");
            }
            
        }
    }
}