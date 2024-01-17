<?php
session_start();
include_once 'model/clsProducto.php';
include_once 'model/clsSabor.php';

class controladorProducto
{
    private $vista;

    public function AltaProducto()
    {
        $Producto = new clsProducto();
        $Sabor = new clsSabor();
        $Tipo = new clsProducto();
        $traeSabor = $Sabor->consultaSabor();
        $traeTipo = $Tipo->ConsultaTipoPatel();
        if (!empty($_POST)) {

            //Mando la imagen a la carpeta de imagen de mi proyecto
            if (is_uploaded_file($_FILES['imag']['tmp_name'])) { // verifica haya sido cargado el archivo
                $ruta = "img/" . $_FILES['imag']['name'];
                move_uploaded_file($_FILES['imag']['tmp_name'], $ruta);
            }
            $Nombre = $_POST['txtNombre'];
            $idSabor = $_POST['txtSabor'];
            $Precio = $_POST['txtPrecio'];

            $Imagen = $_FILES['imag']['name'];

            $Tipo = $_POST['txtTipo'];

            $Producto->AltaProducto($Nombre, $idSabor, $Precio, $Imagen, $Tipo);

            $Consulta = $Producto->ConsultaProducto();
            $traeSabor = $Sabor->consultaSabor();

            $vista = "view/admin/frmProducto.php";
            include_once("view/admin/frmAdmin.php");
        } else {
            $Consulta = $Producto->ConsultaProducto();
            $traeSabor = $Sabor->consultaSabor();

            $vista = "view/admin/frmProducto.php";
            include_once("view/admin/frmAdmin.php");
        }
    }

    public function EliminarxEditar()
    {
        $Producto = new clsProducto();
        $Sabor = new clsProducto();
        $Tipo = new clsProducto();
        $traeSabor = $Sabor->consultaSabor();
        $traeTipo = $Tipo->ConsultaTipoPatel();
        $vista = "view/admin/frmProducto.php";
        if (!empty($_POST)) {

            if (isset($_POST['btnEliminar'])) {
                /////////////////////////////////7///eliminar imagen 
                $consul = new clsProducto();
                $Producto1 = new clsProducto();
                $Producto2 = new clsProducto();
                $No = $_POST['txtNo'];
                /////////////////////////////////7///nombre imagen
                $nombreim = $consul->traenombre_imageBy_id($No);

                if (!$nombreim == null) {
                    $imagen_producto = "img/" . $nombreim['imagen'] . "";

                    if (file_exists($imagen_producto)) {
                        unlink($imagen_producto);
                    }
                    $Producto->Eliminar($No);
                }
                $Consulta = $Producto2->ConsultaProducto();
            }

            if (isset($_POST['btnEditar'])) {
                $No = $_POST['txtNo'];
                $Consulta2 = $Producto->ConsultaProductoByID($No);
                $vista = "view/admin/ActualizaPro.php";
                //llena formulario
                include_once("view/admin/frmAdmin.php");
            }

            $Producto__ = new clsProducto();
            $Consulta = $Producto__->ConsultaProducto();
            $vista = "view/admin/frmProducto.php";
            include_once("view/admin/frmAdmin.php");
        } else {
            $Consulta = $Producto->ConsultaProducto();
            $vista = "view/admin/frmProducto.php";
            include_once("view/admin/frmAdmin.php");
        }
    }

    public function Guardar()
    {
        $Producto = new clsProducto();
        $Sabor = new clsProducto();
        $Tipo = new clsProducto();
        $traeSabor = $Sabor->consultaSabor();
        $traeTipo = $Tipo->ConsultaTipoPatel();

        if (!empty($_POST)) {
            $No = $_POST['txtNo'];
            $Nombre = $_POST['txtNombre'];
            $Sabor = $_POST['txtSabor'];
            $Precio = $_POST['txtPrecio'];
            $tipo = $_POST['txtTipo'];

            // Obtener la imagen actual del producto (si existe) esta es de la etiqueta si esq envia por post la imagen en la etiqueta de tipo hidden esta le asigna ya sea si esta mandando algo por post primero verifica que sea diferente  a null le asigna ala variable la foto actual si no le asigna un valor null 
            //esto funciona de la siguiente ,manera al entrar al formulario la etiqueta de la foto actual ya cuenta con un valor que es de la imagen actual pero como es de tipo hidden no se muestra en la pagina  por lo tanto al darle guardar manda el archivo actual que se encuentra en la etiqueta esta mantendra siempre la imagen actual si  el caso contrario esta sera null para despues verificar si el usuario seleciono otra imagen y le asigna al nuevo 
            $imagen_actual = isset($_POST['foto_actual']) ? $_POST['foto_actual'] : '';

            // Verificar si se proporcionó una nueva imagen
            if (isset($_FILES['imag']) && is_uploaded_file($_FILES['imag']['tmp_name'])) {
                // Mover la nueva imagen a la carpeta de imágenes
                $ruta = "img/" . $_FILES['imag']['name'];
                move_uploaded_file($_FILES['imag']['tmp_name'], $ruta);
                // Actualizar la imagen con el nombre de la nueva imagen
                $Imagen = $_FILES['imag']['name'];

                // Eliminar la imagen anterior si existe
                if (!empty($imagen_actual)) {
                    $imagen_producto = "img/" . $imagen_actual;
                    if (file_exists($imagen_producto)) {
                        unlink($imagen_producto);
                    }
                }
            } else {
                // No se proporcionó una nueva imagen, mantener la imagen actual
                $Imagen = $imagen_actual;
            }
            $Producto->Actualizar($Nombre, $Sabor, $Precio, $Imagen, $tipo, $No);
            $Consulta2 = $Producto->ConsultaProductoByID($No);
            $vista = "view/admin/ActualizaPro.php";
            include_once("view/admin/frmAdmin.php");
        }
    }

    public function VerProductos()
    {
        $Producto = new clsProducto();

        $Consulta = $Producto->ConsultaProducto();
        $vista = "view/admin/VerProductos.php";
        include_once("view/admin/frmAdmin.php");
    }
    public function Actualizar()
    {
        $Producto = new clsProducto();
        $vista = "view/admin/ActualizaPro.php";
        if (!empty($_POST)) {

            if (isset($_POST['btnActualizar'])) {
                $Consulta = $Producto->ConsultaProducto();

                $vista = "view/admin/ActualizaPro.php";
                include_once("view/admin/frmAdmin.php");
            }
        }
    }





    public function ConsultarProductos()
    {
        $Producto = new clsProducto();
        $Consulta = $Producto->ConsultaProducto();
        $vista = "view/admin/frmProducto.php";
        // include_once("view/admin/frmAdmin.php");
        include_once("view/admin/frmAdmin.php");
    }
}