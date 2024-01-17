<?php
include_once 'model/clsconexion.php';

class clsReportes extends clsconexion{

	
	
	public function ConsultaVentaxClt()
	{
		$sql = "SELECT * FROM viewTicketVenta;";
       
		$resultado = $this->conectar->query($sql);
		
		return $resultado;
	}	
}