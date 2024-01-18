<?php
include_once  'model/clsProducto.php';


class controladorprincipal

{
	private $vista;
	public function inicio()
	{
		$Producto = new clsProducto();
		$Consulta = $Producto->ConsultaProducto();
		$vista = "view/public/frmContenidoComercial.php";
		include_once("view/frmPublic.php");
	}

	public function interfazUsuario()
	{
		$Producto = new clsProducto();
		$Consulta = $Producto->ConsultaProducto();
		$vista = "view/public/frmContenidoComercial.php";
		include_once("view/frmPublic.php");
	}
	public function interfazAdministrador()
	{

		$vista = "view/admin/defaultinf.php";
		include_once("view/admin/frmAdmin.php");
	}
	public function ModalActua()
	{

		$vista = "view/admin/ActualizaPro.php";
		include_once("view/admin/frmAdmin.php");
	}
	public function iniciar()
	{

		$vista = "view/access/frmLogin_.php";
        include_once("view/access/frmLogin_.php");
	}
	
	public function recuperacion()
	{
		
		$vista = "view/recuperaciones/frmanalisis.php";
		include_once("view/frmPublic.php");
	}
	public function recuperaciongmail()
	{
		
		$vista = "view/recuperaciones/frmgmail.php";
		include_once("view/frmPublic.php");
	}
	public function recuperacionpreguntas()
	{
		
		$vista = "view/recuperaciones/frmpreguntas.php";
		include_once("view/frmPublic.php");
	}
	
	
	
}

