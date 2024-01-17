<link rel="stylesheet" href="css/estiloTabla.css">

<div class="table-container"></div>
<table class="centered-table">
    <thead>
        <tr>
            <!-- <th>No.</th> -->
            <th>Idpro</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo electrónico</th>
            <th>Número Télefonico</th>
            <th>Actualizar</th>
        </tr>
    </thead>
    <tbody>

        <?php
        while ($Empleado = $Consulta->fetch_object()) :
        ?>
            <form class="form" action="/Sistema_Pasteleria/index?clase=controladorEmpleado&metodo=ActualizarXEliminar" method="POST">
                <tr>
                    <td> <input type="text" name="txtcodigo_E" value=" <?php echo $Empleado->idUser ?> " readonly> </td>
                    <td> <input type="text" name="txtNombreP" value="<?php echo  $Empleado->vchnombre ?>"></td>
                    <td> <input type="text" name="txtAP" value="<?php echo $Empleado->vchapaterno ?>"></td>
                    <td> <input type="text" name="txtAM" value="<?php echo $Empleado->vchamaterno ?>"></td>
                    <td> <input type="email" name="txtCorreo" value="<?php echo $Empleado->vchCorreo ?>"></td>
                    <td> <input type="numer" name="txtNTel" value="<?php echo $Empleado->vchtelefono ?>"></td>

                    <!-- <td> <input type="text" name="txtUsuario" value="< ?php echo $Empleado->vchUsuario ?>"></td>

                    <td> <input type="text" name="txtPassword" value="< ?php echo $Empleado->vchpassword  ?>"></td> -->

                    <td>
                        <button id="bo" type="submit" name="btnActualizar" class="submit-button">Actualizar</button>
                        
                        <button id="bo" type="submit" name="btnEliminar"  class="submit-button">Eliminar</button>
                    </td>
                </tr>
            </form>
        <?php
        endwhile;
        ?>
    </tbody>
    </form>
</table>
</div>