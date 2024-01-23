<?php
include_once 'model/clsValidacion.php';
include_once 'controller/controladorEmail.php';
// session_start();

class controladorVol
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
            $numPregunta = new clsValidacion();

            $datos = $validacion->consultaValidacion($usuario, $correo);
            if ($datos->num_rows > 0) {


                $obtenerPregunta  = $numPregunta->consultaNumPregunta($usuario);

                //envia el usuario al frmPregunta
                $_SESSION['txtUsuario'] = $usuario;

                $vista = "view/access/frmPregunta.php";

                include_once("view/access/frmrecuperacion.php");
                exit();
            } else {
                $vista = "view/access/frmValidacion.php";

                include_once("view/frmRecuperacion.php");
            }
        } else {
            $vista = "view/access/frmLogin.php";
            include_once("view/frmRecuperacion.php");
        }
    }

    public function PreguntaSecreta()
    {

        if (!empty($_POST)) {

            $validacion = new clsValidacion();
            $pregunta= $_POST['pregunta'];
            $idPregunta = $_POST['idPregunta'];
            $respuesta = $_POST['txtRespuestas'];
            $respuesta = strtolower($respuesta);
            $usuario = $_POST['usuario'];
           
            $datos = $validacion->consultarPreguntaRespuesta($idPregunta, $respuesta, $usuario);
            if ($datos->num_rows > 0) {
                while ($row = $datos->fetch_assoc()) {
                    $id = $row['idUser'];
                    $correo=$row['vchCorreo'];
                }
                $controladorCorreo = new controladorEmail();
				$controladorCorreo->recuperar($id, $correo);
               
            } else {
                $vista = "view/recuperaciones/frmpreguntas.php";
				include_once("view/frmPublic.php");
                echo "<script type='module'> 
                import { mensaje } from '/Sistema_Pasteleria/utilities/mensajes.js';
                mensaje('Respuesta incorrecta', 'error');
            </script>";

                exit();
            }
        } else {
            $vista = "view/access/frmLogin.php";
            include_once("view/frmPublic.php");
           exit();
        }
    }
}
