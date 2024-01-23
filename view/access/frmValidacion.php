
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

</head>

<body>
  <form class="form" action="/Sistema_Pasteleria/index?clase=controladorValidacion&metodo=Acceder" method="POST" enctype="multipart/form-data">
    <h2>Validación de la cuenta</h2>
    <br />
    <link rel="stylesheet" href="css/estiloTabla.css" />
    
    <br />
    <div class="form-group">
        <label for="correo">Correo electrónico</label>
        <br>
        <input type="email" id="correo" name="txtCorreo" required placeholder="Ingrese su email"
        pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
    </div>
    <br /><br />
    <div class="form-group">
      <button type="submit">Validar</button>
    </div>
  </form>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  
</body>

</html>