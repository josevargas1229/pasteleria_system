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

<form action="procesar_formulario.php" method="post">
    
    <a href="/Sistema_Pasteleria/index?clase=controladorprincipal&metodo=recuperaciongmail" id="gmail">Gmail</a>
    <a href="/Sistema_Pasteleria/index?clase=controladorprincipal&metodo=recuperacionpreguntas" id="preguntas">Por preguntas</a>
    <a href="/Sistema_Pasteleria/index?clase=controladorprincipal&metodo=recuperaciongmail" id="token">Token</a>
    
</form>

</body>
</html>
