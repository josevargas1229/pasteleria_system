<?php

include_once 'model/clsReportes.php';
include_once 'LibreriaFPDF/fpdf.php';

class controladorreporte
{
    private $vista;


    public function reporteVentas()
    {
        $Venta = new clsReportes();
        if (!empty($_POST)) {


            // Crear el objeto FPDF
            $pdf = new FPDF();

            // Agregar una página
            $pdf->AddPage();
            $pdf->Cell(190, 30, $pdf->Image('./images/2.png', 20, 5, 60, 60), 0, 1, 'R');

            // Establecer la fuente y el tamaño del título
            $pdf->SetFont('Arial', 'B', 14);
            $pdf->SetLeftMargin(10);
            $pdf->Cell(0, 20, utf8_decode('Reporte de venta'), 0, 1, 'C');

            // Consulta a la base de datos

            $Consulta = $Venta->ConsultaVentaxClt();
            //Centrar la tabla
            $pdf->SetLeftMargin(15);
            if ($Consulta->num_rows > 0) {

                // Establecer la fuente y el tamaño del encabezado de la tabla
                $pdf->SetFont('Arial', 'B', 10);

                // Imprimir los encabezados de la tabla
                $pdf->Cell(30, 10, 'Numero Venta', 1, 0, 'C');
                $pdf->Cell(30, 10, 'Pago total', 1, 0, 'C');
                $pdf->Cell(30, 10, 'Producto', 1, 0, 'C');
                $pdf->Cell(30, 10, 'Cliente', 1, 0, 'C');
                $pdf->Cell(60, 10, 'Fecha', 1, 1, 'C');
                // $pdf->Cell(20, 10, 'Descuento', 1, 0, 'C');
                // $pdf->Cell(30, 10, 'Pago Final', 1, 1, 'C');

                // Establecer la fuente y el tamaño del contenido de la tabla
                $pdf->SetFont('Arial', '', 9);

                // Imprimir los datos de la tabla
                while ($row = $Consulta->fetch_assoc()) {
                    $pdf->Cell(30, 10, $row["Numero_Venta"], 1, 0, 'L');
                    $pdf->Cell(30, 10, $row["Pago_Final"], 1, 0, 'C');
                    $pdf->Cell(30, 10, $row["Producto"], 1, 0, 'C');
                    $pdf->Cell(30, 10, $row["Cliente"], 1, 0, 'C');
                    $pdf->Cell(60, 10, $row["Fecha"], 1, 1, 'C');
                }

                // Salto de línea después de la tabla
                $pdf->Ln(10);

                $Venta->conectar->close();
                // Mostrar el PDF
                $pdf->Output();
            } else {
                echo "No se encontraron registros.";
            }
        } else {
            $Consulta = $Venta->ConsultaVentaxClt();
            $vista = "view/admin/frmReporteVenta.php";
            include_once("view/admin/frmAdmin.php");
        }
    }
}