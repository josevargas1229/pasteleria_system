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
    <form
      class="form"
      action="/Sistema_Pasteleria/index?clase=controladorValidacion&metodo=Acceder"
      method="POST"
      enctype="multipart/form-data"
    >
      <h2>Pregunta Secreta</h2>
      <br />
      <link rel="stylesheet" href="css/estiloTabla.css" />

      <div class="form-group">
        <label for="Preguntas">Pregunta</label>

        <select name="txtPReguntas">
          <option value="pregunta1"></option>
          <option value="pregunta2"></option>
          <option value="pregunta3"></option>
          <option value="pregunta4"></option>
          <option value="pregunta5"></option>
          <option value="pregunta6"></option>
        </select>
      </div>
      <br />

      <div class="form-group">
        <label for="ap">Respuesta</label>
        <input type="text" id="Respuesta" name="txtRespuestas" required="" />
      </div>
      <br /><br />
      <div class="form-group">
        <button type="submit">Verificar</button>
      </div>
    </form>
  </body>
</html>