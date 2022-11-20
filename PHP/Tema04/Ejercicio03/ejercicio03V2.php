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
        if(isset($_POST['email'])){
            require_once("../../config.php");
            require_once("./model/DAOUsuarios.php");

            /* Comprobando si el usuario existe en la base de datos. Si no existe, lo crea. */
            if(buscarUsuario($_POST['user']) == false){
                $nombre = $_POST['nombre'];
                $apellido1 = $_POST['apellido1'];
                $apellido2 = $_POST['apellido2'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];

                $datosUsuario = ["nombre"=>$nombre, "apellido1"=>$apellido1, "apellido2"=>$apellido2, "user"=>$user, "pass"=>$pass, "email"=>$email];
                if(crearUsuario($datosUsuario)){
                    echo "El usuario: ", $_POST['user'], " ha sido dado de alta correctamente";
                }else{
                    echo "ERROR!!!! Dando de alta al usuario: ", $_POST['user'];
                }
            }else{
                echo "<span style='color: red; font-size: large;'>ERROR!!! El usuario: ", $_POST['user']," ya existe.</span>";
            }
        }else{
    ?>
    <form id = "formAlta" action="" method="post" enctype="multipart/form-data" onsubmit="return chequearDatos()">
        <h1>Formulario de registro:</h1>
        <table>
            <tr>
                <td>
                    <label for="nombre">Nombre:</label>
                </td>
                <td>
                    <input required="required" type="text" name="nombre">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="apellido1">Apellido 1:</label>
                </td>
                <td>
                    <input required="required" type="text" name="apellido1">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="apellido2">Apellido 2:</label>
                </td>
                <td>
                    <input type="text" name="apellido2">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="user">Usuario:</label>
                </td>
                <td>
                    <input required="required" type="text" name="user">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pass">Contraseña:</label>
                </td>
                <td>
                    <input required="required" type="password" name="pass" size="20">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pass2">Repetir Contraseña:</label>
                </td>
                <td>
                    <input required="required" type="password" name="pass2" size="20">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email:</label>
                </td>
                <td>
                    <input required="required" type="email" name="email"><br/><br/>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="enviar">Enviar</button>
                </td>
                <td>
                    <button type="reset" name="reset">Reiniciar</button>
                </td>
            </tr>
        </table>
    </form>
    <?php
        }
    ?>
    <script src="./assets/js/ejercicio03V2.js"></script>
</body>
</html>