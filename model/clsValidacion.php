<?php
include_once 'model/clsconexion.php';

class clsValidacion extends clsConexion
{

    public function consultaValidacion($usuario, $correo)
    {
        $sql = "Call Ssp_verificacion('$usuario','$correo')";
        $resultado = $this->conectar->query($sql) ;
        return $resultado;
    }
}