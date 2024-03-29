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
    </style>
</head>
<body>

<h2>Recuperación de Contraseña</h2>
<br><br>
<form action="/Sistema_Pasteleria/index?clase=controladorprincipal&metodo=recuperar" method="post">
    
    <label for="metodo">Seleccione el método de recuperación:</label>
    <select name="metodo" id="metodo">
        <option value="email">Correo</option>
        <option value="pregunta">Pregunta secreta</option>
        <option value="token">Token</option>
    </select>   
    <br><br>
    <?php echo 'El correo se mandará a: '. $email?>
    <?php echo '<input type="hidden" name="id" value="' . $id . '">'; ?>
    <?php echo '<input type="hidden" name="correo" value="' . $email . '">'; ?>
    <br><br>
    <input type="submit" value="Enviar">
</form>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<?php echo isset($mensaje)?$mensaje:'' ?>
</body>
</html>
