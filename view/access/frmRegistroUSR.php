
<head>
    <meta charset="UTF-8">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
body {
    font-family: sans-serif;
    width: 100%;
    text-decoration: uppercase;
    text-align: center;
    /* background: #221728; */
    /* background: #40576d; */
    background: url(images/Background.png) no-repeat 0px 0px ;
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
    backdrop-filter: inherit;
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
    /* background-color: #40576d; */

    background-blend-mode: overlay color-burn;
    /* background-blend-mode: darken; */
    /* background-blend-mode: lighten */
    /* background-blend-mode: color-dodge; */
    /* background-blend-mode: color-burn; */
    /* background-blend-mode: hard-light; */
    padding-top: 4rem;
    padding-bottom: 4rem;
    padding-left: 4rem;
}
.login-form {
    justify-content: center;
    width: 30%;
    margin: 0 auto;
    background-size: cover;
    color: mediumblue;
    background-position: center;
    opacity: inherit;
    
    padding:3rem;
    border-radius: 30px;
    box-shadow: #fff 20px 5px 399px;
    top: 0%;
    left: 0%;
}
input{
    width:200px;
    height:30px;
    color: #000000;
}
input:hover{
  

    background-color: #cade86;

}
 input:hover{ 
    background-color: #cade86;

}


.abt:hover{
color: #fff;
    background-color: #004cb6;

}
.abt{
text-decoration: none;
background-color: #e9e9e9;
/* border-radius: 25px; */
/* margin: black; */
color: #000000;
border-radius: 3px;
/* width: 4px; */
/* height: 8px; */
/* font-weight: 70px; */
    padding:2px 15px;
    margin: 1px 10px;
border: 2px solid  #a9a9a9;
box-shadow: #f0e2e2 2px 2px 23px;


}
.Registrarse:hover{
color: #75baff;


}


    </style>
    

    
<form data-aos="zoom-out-down" id="login-form" class="login-form" action="/Sistema_Pasteleria/index?clase=controladorCliente&metodo=AltaCliente" method="POST" autocomplete="off">

    <!-- <link rel="stylesheet" href="css/estilos.css"> -->

    <h2>Bienvenido</h2>
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <br>
        <input type="text" id="nombre" name="txtNombreP" required placeholder="Ingrese su nombre"
        pattern="^[A-Z][a-z]+(?: [A-Z][a-z]+)*$">
    </div>
    
    <div class="form-group">
        <label for="ap">Apellido Paterno:</label>
        <br>
        <input type="text" id="ap" name="txtAP" required placeholder="Ingrese su apellido paterno"
        pattern="^[A-Z][a-z]+$">
    </div>
    <div class="form-group">
        <label for="ap">Apellido Materno:</label>
        <br>
        <input type="text" id="am" name="txtAM" required placeholder="Ingrese su apellido materno"
        pattern="^[A-Z][a-z]+$">
    </div>
    <div class="form-group">
        <label for="correo">Correo electrónico</label>
        <br>
        <input type="email" id="correo" name="txtCorreo" required placeholder="Ingrese su email"
        pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
    </div>
    
    <div class="form-group">
        <label for="tel">Número télefonico</label>
        <br>
        <input type="tel" id="numero" name="txtNTel" required placeholder="Ingrese su número telefónico" minlength="10" maxlength="10"
        pattern="^[0-9]{10,}$">
    </div>

    <div>
        <label for="usuario"> Usuario:</label>
        <br>
        <input type="text" id="usuario" name="txtUsuario" required placeholder="Ingrese su usuario"
        pattern="^[a-zA-Z0-9_]{3,}$">

    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <br>
        <input type="password" id="password" name="txtPassword" required placeholder="Ingrese su contraseña" minlength="8" 
        pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$"
       title="La contraseña debe contener al menos una mayúscula, una minúscula, un número y un carácter especial, y tener al menos 8 caracteres de longitud.">
    </div>


    <div class="form-group">
        <label for="repassword">Repetir password:</label>
        <br>
        <input type="password" id="repassword" name="txtRePassword"required placeholder="Repita su contraseña">
    </div>
    <div class="form-group">
        <label for="pregunta">Pregunta secreta:</label>
        <br>
        <select name="pregunta" id="pregunta" required>
            <option value="0">Seleccione una pregunta...</option>
            <?php
                foreach ($preguntas as $pregunta){
                    echo "<option value='".$pregunta['idPregunta']."'>".$pregunta['vchPregunta']."</option>";
                } 
            ?>
        </select>
    </div>
    
    <div>
        <label for="respuesta"> Respuesta:</label>
        <br>
        <input type="text" id="respuesta" name="txtRespuesta" required placeholder="Ingrese su respuesta">
    </div>
                <br>
    <div class="form-group">
        <button type="submit" id="enviar">Crear cuenta</button>
        <br>
        <a href="/Sistema_Pasteleria/index?clase=controladorprincipal&metodo=interfazUsuario"  type="submit" value="Volver">Volver</a>
    </div>

</form>

<br></br>
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
</body>.
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  AOS.init();

  
</script>