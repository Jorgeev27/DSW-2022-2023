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
        /* Comprobando si el usuario existe en la base de datos y si la contraseña es correcta. */
        if(isset($_POST['user'])){
            require_once("./model/DAOUsuarios.php");
            $datos = buscarUsuario($_POST['user']); //Buscar el usuario en la base de datos y guardarlo en la variable $datos
            if($datos != false && password_verify($_POST['pass'], $datos['pass'])){ //Si el usuario es distinto de falso y la contraseña es la misma
                echo "Bienvenido usuario: ", $_POST['user']; //Mensaje de bienvenida
            }else{
                echo "ERROR!!! En el nombre de usuario y/o contraseña"; //Mensaje de ERROR!!!
            }
        }else{
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <label for="user">Usuario:</label>
                </td>
                <td>
                    <input required="required" type="text" name="user" id="user"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pass">Contraseña:</label>
                </td>
                <td>
                    <input required="required" type="password" name="pass" id="user"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">acceder</button>
                </td>
            </tr>
        </table>
    </form>
    <?php
        }
    ?>
</body>
</html>