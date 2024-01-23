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
  <form class="form" action="/Sistema_Pasteleria/index?clase=controladorVol&metodo=PreguntaSecreta" method="POST" enctype="multipart/form-data">
    <h2>Recuperación de contraseña</h2>
    <br />
    <link rel="stylesheet" href="css/estiloTabla.css" />
    <div class="form-group">

      <!--  Input oculto con php para guardar el usuario  -->
      <!-- <input type="text" name="txtUsuario" disabled="true" value="<?php echo $usuario; ?>"> -->

      <label for="txtPreguntas">Pregunta:</label>
            <?php echo $pregunta; ?>
    </div>
    <br />

    <div class="form-group">
      <label for="txtRespuestas">Respuesta</label>
      <input type="text" id="Respuesta" name="txtRespuestas" required="" />
    </div>
    <?php echo '<input type="hidden" name="pregunta" value="' . $pregunta . '">'; ?>
    <?php echo '<input type="hidden" name="idPregunta" value="' . $idPregunta . '">'; ?>
    <?php echo '<input type="hidden" name="usuario" value="' . $usuario . '">'; ?>
    <br /><br />
    <div class="form-group">
      <button type="submit">Verificar</button>
    </div>
  </form>

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</body>

</html>