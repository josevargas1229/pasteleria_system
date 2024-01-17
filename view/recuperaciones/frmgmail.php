<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar la dirección de correo electrónico
    $correo = $_POST["correo"];

    if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "Correo electrónico verificado: $correo";
    } else {
        echo "Por favor, ingresa una dirección de correo electrónico válida.";
    }
}
?>

<div style="text-align: center; margin-top: 20vh;">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="correo">Correo Electrónico:</label>
        <input type="text" id="correo" name="correo" required>
        <br>
        <br>
        <br>
        <button type="submit">Verificar</button>
    </form>
</div>
