<?php
include_once 'model/clsValidacion.php';

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
            $usuario = $_POST['txtUsuario'];
            $correo = $_POST['txtCorreo'];
            $validacion = new clsValidacion();
            $datos = $validacion->consultaValidacion($usuario, $correo);
            if ($datos->num_rows > 0) {
                
                $vista = "view/access/frmrecuperacion.php";
                include_once("view/frmPublic.php");
            } else {
                $vista = "view/access/frmValidacion.php";
                include_once("view/frmPublic.php");
            }
        } else {
            $vista = "view/access/frmLogin.php";
            include_once("view/frmPublic.php");
        }
    }
}