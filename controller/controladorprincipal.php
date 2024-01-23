<?php
include_once  'model/clsProducto.php';
include_once 'controller/controladorEmail.php';
include_once 'model/clsValidacion.php';
include_once 'model/clsCliente.php';
include_once 'utilities\TokenGenerator.php';
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
		
		$vista = "view/access/frmValidacion.php";
		include_once("view/frmPublic.php");
	}
	public function recuperaciongmail()
	{
		
		$vista = "view/recuperaciones/frmgmail.php";
		include_once("view/frmPublic.php");
	}
	public function recuperacionpreguntas($id)
	{
		
		$vista = "view/recuperaciones/frmpreguntas.php";
		include_once("view/frmPublic.php");
	}
	public function recuperar(){
		$metodo=$_POST['metodo'];
		$id=$_POST['id'];
		$correo=$_POST['correo'];
		switch ($metodo) {
			case 'email':
				// Lógica para recuperación por correo
				$controladorCorreo = new controladorEmail();
				$controladorCorreo->recuperar($id, $correo);
				break;
	
			case 'pregunta':
				// Lógica para recuperación por pregunta secreta
				$validacion = new clsValidacion();
				$datos=$validacion->consultaNumPregunta($id);
				if ($datos->num_rows > 0) {
					while ($row = $datos->fetch_assoc()) {
						$pregunta = $row['vchPregunta'];
						$idPregunta=$row['idPregunta'];
						$usuario=$row['vchUsuario'];
					}
					$vista = "view/recuperaciones/frmpreguntas.php";
					include_once("view/frmPublic.php");
				} else {
					$vista = "view/access/frmrecuperacion.php";
					include_once("view/frmPublic.php");
				}
				break;
	
			case 'token':
				// Lógica para recuperación por token
				$controladorToken = new controladorEmail();
				$controladorToken->token($id, $correo);
				break;
	
			default:
				// Manejar caso por defecto o mostrar un error
				echo "Método de recuperación no válido.";
				break;
		}
	}
	public function updatePass(){
		$id=$_POST['id'];
		$pass=$_POST['txtPassword'];
		$cliente=new clsCliente();
		$actualizar=$cliente->updatePass($id,$pass);
		$vista = "view/access/frmLogin_.php";
    	include_once("view/access/frmLogin_.php");
	}
	
}

