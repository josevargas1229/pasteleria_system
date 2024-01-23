<?php
include_once 'model/clsconexion.php';

class clsValidacion extends clsConexion
{

    public function consultaValidacion( $correo)
    {
        $sql = "Call Ssp_verificacion('$correo')";
        $resultado = $this->conectar->query($sql) ;
        return $resultado;
    }
    public function consultaNumPregunta($usuario)
    {
        $sql = "Call Sp_ObtenerPregunta('$usuario')";
        $resultado = $this->conectar->query($sql);
        return $resultado;
    }
    public function consultarPreguntaRespuesta($idPreguntaSeleccionada, $respuesta,$usuario)
    {
        $sql = "Call Sp_ValidarPreguntaRespuesta($idPreguntaSeleccionada,'$respuesta','$usuario')";
        $resultado = $this->conectar->query($sql);
        return $resultado;
    }
    
}