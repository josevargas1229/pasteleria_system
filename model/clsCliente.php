<?php
include_once 'model/clsconexion.php';

class clsCliente extends clsconexion
{
	public function AltaCliente( $nombre, $AP, $AM, $Correo,$NoTel, $Usuario,$pass,$pregunta,$respuesta) ////function for admin and user
	{
		$sql = "call Sp_InsertClient('$nombre','$AP','$AM','$Correo','$NoTel','$Usuario','$pass','$pregunta','$respuesta');";
		$resultado = $this->conectar->query($sql);
		return $resultado;
	}
	public function Actualizar( $nombre, $AP, $AM,$Correo, $NoTel, $Usuario,$pass,$id) ////function for admin
	{
		$sql = "CALL Sp_UpdateClient(' $nombre','$AP','$AM','$Correo','$NoTel','$Usuario','$pass','$id');";
		$resultado = $this->conectar->query($sql);
		return $resultado;
	}
	public function Eliminar($pass) //function for admin
	{
		$sql = "call Sp_DeleteClient('$pass');";
		$resultado = $this->conectar->query($sql);
		return $resultado;
	}
	public function ConsultaClientes() //function for admin
	{
		$sql = "CALL Sp_QueryClient;";
		$resultado = $this->conectar->query($sql);
		return $resultado;
	}	
	public function traeCliente_By_id($id) //function for admin
	{
		$sql = "CALL traeCliente_By_id($id);";
		$resultado = $this->conectar->query($sql);
		return $resultado;
	}
	public function traePreguntas(){
		$sql="CALL Sp_QueryQuestions";
		$resultado=$this->conectar->query($sql);
		return $resultado;
	}
}
	