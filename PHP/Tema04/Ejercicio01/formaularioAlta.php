<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 01_Jorge Escobar</title>
</head>
</script>
<body>
    <?php
        require_once("../../config.php");

        /* Comprobando si se ha pulsado el botón y si es así, está obteniendo los datos del formulario. 
            Si no está registrado en bdUsuarios.txt, se registra.
        */
        if(isset($_POST['enviar'])){ //Si hay POST en enviar
            $nombre = $_POST['nombre'];
            $ap1 = $_POST['apellido1'];
            $ap2 = $_POST['apellido2'];
            $usuario = $_POST['user'];
            $pass = $_POST['pass'];
            $pass2 = $_POST['pass2'];
            $email = $_POST['email'];
            $dataBase = "/var/www/phpdata/bdUsuarios.txt"; //La ruta de la base de datos de los usuarios
            $handle = fopen($dataBase, "r"); //Abrimos el fichero de la base de datos en modo lectura
            while($lineaFichero = fgets($handle)){ //Si la linea del fichero está al principio
                $bdUsuario = json_encode($pass, JSON_UNESCAPED_UNICODE); //Ejecutamos el json_encode de la contraseña del usuario
                fputs($handle, $bdUsuario); //Lo ponemos en el fichero
                echo "<span style='color: blue;'> El usuario: $usuario ha sido registrado!!!.</span>\n";
                fseek($handle, 0);
            }
        }else{
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Formulario de registro:</h1>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre"><br/><br/>
        <label for="apellido1">Apellido 1: </label>
        <input type="text" name="apellido1"><br/><br/>
        <label for="apellido2">Apellido 2: </label>
        <input type="text" name="apellido2"><br/><br/>
        <label for="user">Usuario: </label>
        <input type="text" name="user"><br/><br/>
        <label for="pass">Contraseña: </label>
        <input type="password" name="pass"><br/><br/>
        <label for="pass2">Repetir Contraseña: </label>
        <input type="password" name="pass2"><br/><br>
        <label for="email">Email: </label>
        <input type="text" name="email"><br/><br/>
        <button type="submit" name="enviar" onclick="verificarPassword()">Enviar</button>
    </form>
    <?php
        }
    ?>
</body>
</html>