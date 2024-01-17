<div class="table-container">
    <table class="centered-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nombre</th>
                <th>Sabor</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Tipo</th>
                <th>Cantidad</th>
                <th>Acción</th>
                <th>Precio Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $index => $producto): ?>
                <tr>
                    <td><?php echo $producto['idProducto']; ?></td>
                    <td><?php echo $producto['Nombre']; ?></td>
                    <td><?php echo $producto['idSabor']; ?></td>
                    <td><?php echo $producto['Precio']; ?></td>
                    <td><img src="img/<?php echo $producto['imagen']; ?>" width="85" height="100"></td>
                    <td><?php echo $producto['tipo']; ?></td>
                    <td>
                        <form class="form">
                            <input type="hidden" name="indiceProducto" value="<?php echo $index; ?>">
                            <input type="hidden" name="carrito"
                                value="<?php echo htmlspecialchars(json_encode($productosSeleccionados)); ?>">
                            <div class="cantidad-container">
                                <button type="button" class="cantidad-button btnAumentar"
                                    onclick="incrementarCantidad(<?php echo $index; ?>)">+</button>
                                <input type="number" name="cantidadProducto[<?php echo $index; ?>]" class="cantidad-input"
                                    value="<?php echo isset($producto['Cantidad']) ? $producto['Cantidad'] : 1; ?>"
                                    data-precio="<?php echo isset($producto['Precio']) ? $producto['Precio'] : 0; ?>">
                                <button type="button" class="cantidad-button btnDisminuir"
                                    onclick="decrementarCantidad(<?php echo $index; ?>)">-</button>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form class="form"
                            action="/Sistema_Pasteleria/index?clase=controladorCarrito&metodo=elimina_de_list"
                            method="post">
                            <input type="hidden" name="indiceProducto" value="<?php echo $index; ?>">
                            <input type="hidden" name="carrito"
                                value="<?php echo htmlspecialchars(json_encode($productosSeleccionados)); ?>">
                            <button type="submit" name="btnEliminar" class="submit-button">Eliminar</button>
                        </form>
                    </td>
                    <td class="precio-total">
                        <?php echo isset($producto['PrecioTotal']) ? $producto['PrecioTotal'] : ""; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="volver-catalogo">
    <form class="form" action="/Sistema_Pasteleria/index?clase=controladorCarrito&metodo=volver_Catalogo" method="post">
        <input type="hidden" name="carrito"
            value="<?php echo htmlspecialchars(json_encode($productosSeleccionados)); ?>">
        <button type="submit" name="volver" class="submit-button">volver</button>
    </form>
</div>

<script>
    function incrementarCantidad(index) {
        var input = document.querySelector('input[name="cantidadProducto[' + index + ']"]');
        var precio = parseFloat(input.dataset.precio);
        var cantidad = parseInt(input.value);
        cantidad += 1;
        input.value = cantidad;
        actualizarPrecioTotal(index, cantidad, precio);
    }

    function decrementarCantidad(index) {
        var input = document.querySelector('input[name="cantidadProducto[' + index + ']"]');
        var precio = parseFloat(input.dataset.precio);
        var cantidad = parseInt(input.value);
        if (cantidad > 1) {
            cantidad -= 1;
            input.value = cantidad;
            actualizarPrecioTotal(index, cantidad, precio);
        }
    }

    function actualizarPrecioTotal(index, cantidad, precio) {
        var precioTotal = cantidad * precio;
        var precioTotalElement = document.getElementsByClassName("precio-total")[index];
        precioTotalElement.textContent = precioTotal.toFixed(2);

        // Calcular el total de precio por cantidad
        var total = 0;
        var precioTotalElements = document.getElementsByClassName("precio-total");
        for (var i = 0; i < precioTotalElements.length; i++) {
            var precioTotal = parseFloat(precioTotalElements[i].textContent);
            if (!isNaN(precioTotal)) {
                total += precioTotal;
            }
        }

        // Actualizar el total en la página
        document.getElementById("total-precio-cantidad").textContent = total.toFixed(2);
    }
</script>

<div class="total-precio-cantidad">
    Total Precio Cantidad: <span id="total-precio-cantidad"></span>
</div>
