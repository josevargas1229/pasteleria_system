<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../../css/estiloTabla.css" />
  <link rel="stylesheet" href="../../css/publico.css" />
</head>

<body>
  <form class="form" action="/Sistema_Pasteleria/index?clase=controladorValidacion&metodo=Acceder" method="POST" enctype="multipart/form-data">
    <h2>Validacion de la cuenta</h2>
    <br />
    <link rel="stylesheet" href="css/estiloTabla.css" />
    <div class="form-group">
      <label for="nombre">Usuario</label>
      <input type="text" id="usuario" name="txtUsuario" required="" />
    </div>
    <br />

    <div class="form-group">
      <label for="ap">Correo electronico</label>
      <input type="text" id="correo" name="txtCorreo" required="" />
    </div>
    <br /><br />
    <div class="form-group">
      <button type="submit">Validar</button>
    </div>
  </form>
</body>

</html>