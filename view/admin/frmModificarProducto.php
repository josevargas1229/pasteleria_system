<form class="form" action="/Sistema_Pasteleria/index?clase=controladorProducto&metodo=Actualizar" method="POST">

    <link rel="stylesheet" href="css/estiloTabla.css">

    <h2>Editar producto</h2>

    <div class="form-group">
        <label for="password">password:</label>
        <input type="password" id="password" name="txtPassword"></input>
    </div>
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="txtNombreP" required>
    </div>
    <div class="form-group">

        <div class="form-group">
            <label for="ap">Apellido Paterno:</label>
            <input type="text" id="ap" name="txtAP" required>
        </div>
        <div class="form-group">
            <label for="ap">Apellido Materno:</label>
            <input type="text" id="am" name="txtAM" required>
        </div>
        <div class="form-group">
            <label for="tel">Número télefonico</label>
            <input type="number" id="numero" name="txtNTel">
        </div>
        <label for="usuario"> Usuario:</label>
        <input type="text" id="usuario" name="txtUsuario"></inp>
    </div>
    <div class="form-group">
        <button type="submit">Registrar</button>
    </div>

</form>

<br></br>
<div class="table-container">
    <table class="centered-table">
        <thead>
            <tr>

                <th>Nu.</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Número Télefonico</th>
                <!-- <th>Acción</th> -->
            </tr>
        </thead>
        <tbody>



            <?php include_once($vista); ?>

        </tbody>
    </table>
</div>