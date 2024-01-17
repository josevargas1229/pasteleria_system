<br>
<head>
<link rel="stylesheet" href="css/estiloTabla.css">

</head>
<br>
<div class="table-containered">
  <table class="centered-table">
    <thead>
      <tr>
        <th>Numero Venta</th>
        <th>Pago final</th>
        <th>Producto</th>
        <th>Cliente</th>
        <th>Fecha</th>
      </tr>
    </thead>
    <tbody>

      <?php

      while ($fila = $Consulta->fetch_object()) {
        echo '<form class="form"  action="#" method="POST"';
        echo '<tr>';
        echo '<td> <input type="text" name="txtNumeroVenta" value="' . $fila->Numero_Venta . '" readonly> </td>';
        echo '<td> <input type="text" name="txtNumeroPago" value="' . $fila->Pago_Final . '" readonly> </td>';
        echo '<td> <input type="text" name="txtProducto" value="' . $fila->Producto . '" ></td>';
        echo '<td> <input type="text" name="txtCliente" value="' . $fila->Cliente . '" ></td>';
        echo '<td> <input type="text" name="txtFecha" value="' . $fila->Fecha . '" ></td>';
        echo '</tr>';
        echo '</form>';
      }
      ?>

    </tbody>
  </table>
</div>
<form action="/Sistema_Pasteleria/index?clase=controladorreporte&metodo=reporteVentas" method="POST">
  <center>
    <button type="submit" name="btnGenerar" value="btnGenerar" class="submit-button">Generar</button>
  </center>
</form>