
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        a {
            color: #000;  /* Cambiado a color negro */
            text-decoration: none;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
        }

        input[type="radio"] {
            display: none;
        }

        input[type="radio"]:checked + a {
            background-color: #4CAF50;
            color: #fff;
        }
        input[type="text"]{
            width: 350px;
        }
    </style>
</head>
<body>

<h2>Token de recuperación</h2>
<br><br>
<form method="post" action="/Sistema_Pasteleria/index?clase=controladorValidacion&metodo=token" autocomplete="off">
    

    <div class="form-group">
        <label for="token">Ingrese el token:</label>
        <br><br>
        <input type="text" id="token" name="txtToken" required placeholder="Ingrese el token enviado a su correo">
    </div><br>
    <div class="form-group">
        <input type="submit" value="Enviar">
    </div>
</form>
</body>
</html>
