<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba_Jorge Escobar</title>
</head>
<body>
    <?php
        if(isset($_POST['usuario']) && isset($_POST['pass'])){
            $usuario = $_POST['usuario'];
            $pass = $_POST['pass'];
            if($usuario == 'Juan' && $pass = '1234'){
                echo "Hola hola!!!";
            }else{
                echo "ERROR!! Nombre de usuario y/o contraseña mal ejecutado";
            }
        }else{
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario"><br/>
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass"><br/>
        <button type="submit">Iniciar Sesión</button>
    </form>
    <?php
        }
    ?>
</body>
</html>