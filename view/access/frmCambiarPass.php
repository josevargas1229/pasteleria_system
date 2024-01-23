
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
<form method="post" action="/Sistema_Pasteleria/index?clase=controladorprincipal&metodo=updatePass">
    <div class="form-group">
        <label for="password">Nueva contraseña:</label>
        <br>
        <input type="password" id="password" name="txtPassword" required placeholder="Ingrese su contraseña" minlength="8" 
        pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$"
        title="La contraseña debe contener al menos una mayúscula, una minúscula, un número y un carácter especial, y tener al menos 8 caracteres de longitud.">
    </div><br><br>

    <div class="form-group">
        <label for="repassword">Repetir password:</label>
        <br>
        <input type="password" id="repassword" name="txtRePassword" required placeholder="Repita su contraseña">
    </div><br><br>
    <?php echo '<input type="hidden" name="id" value="' . $id . '">'; ?>
    <div class="form-group">
        <input type="submit" value="Enviar">
    </div>
</form>
<script>
    var pass=document.getElementById('password');
    var confpass=document.getElementById('repassword');
    var enviar=document.getElementById('enviar');
    function validar(){
        if(pass.value!==confpass.value){
            confpass.setCustomValidity('Las contraseñas no coinciden');
        }else{
            confpass.setCustomValidity('');
        }
    }
    document.addEventListener('DOMContentLoaded',()=>{
        confpass.addEventListener('input',validar);
        pass.addEventListener('input',validar);
    });
    
</script>
</body>
</html>