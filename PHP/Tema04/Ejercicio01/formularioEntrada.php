<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 01_Jorge Escobar</title>
</head>
<body>
    <?php
    require_once("../../config.php");
    ?>
<form action="" method="post" enctype="multipart/form-data">
        <h1>Formulario de inicio de sesión:</h1>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario"><br/><br/>
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass"><br/><br/>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>