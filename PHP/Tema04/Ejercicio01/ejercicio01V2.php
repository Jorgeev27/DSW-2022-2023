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

            /**
             * Esta función busca un usuario en la base de datos y devuelve una matriz con los datos
             * del usuario si existe, o falso si no existe. Finalmente, cierra el fichero en ambas situaciones
             * @param string user El nombre de usuario a buscar.
             * @return array | bool - array de un usuario o un booleano de usuarios.
             */
            function buscarUsuario(string $user): array | bool{
                $fdBaseDatosUsuarios = fopen(DATA_PATH."bdUsuarios.txt", "r"); //Abrir el fichero en modo lectura
                while($lineaFichero = fgets($fdBaseDatosUsuarios)){ //Se acaba de leer una linea del fichero
                    $datosUsuario = json_decode($lineaFichero, true); //Obtenemos un array asociativo de los datos de los usuarios
                    if($datosUsuario['user'] == $user){//Comprobar si el usuario corresponde con el que buscamos
                        fclose($fdBaseDatosUsuarios); //Cierra el fichero
                        return $datosUsuario; ///Retorna los datos de usuario si existe
                    }
                }
                fclose($fdBaseDatosUsuarios); //Cierra el fichero
                return false; //Retorna false si no existe
            }


            /**
             * Toma una matriz de datos de usuario, abre un archivo, codifica la contraseña, codifica
             * los datos en JSON, los escribe en el archivo y lo cierra.
             * @param array datosUsuario Una matriz con los datos del usuario.
             */
            function crearUsuario(array $datosUsuario){
                $fdBaseDatosUsuarios = fopen(DATA_PATH."bdUsuarios.txt", "a"); //Abrir el fichero en modo escritura
                $datosUsuario['pass'] = password_hash($datosUsuario['pass'], PASSWORD_DEFAULT); //Sustituido la contraseña en texto plano por el hash de la misma
                $datosUsuarioJSON = json_encode($datosUsuario, JSON_UNESCAPED_UNICODE); //Los datos del usuario codificados en JSON
                fputs($fdBaseDatosUsuarios, $datosUsuarioJSON); //Lo ponemos en el fichero
                fclose($fdBaseDatosUsuarios); //Cierra el fichero
            }

            if(buscarUsuario($_POST['user']) == false){
                $nombre = $_POST['nombre'];
                $apellido1 = $_POST['apellido1'];
                $apellido2 = $_POST['apellido2'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];

                $datosUsuario = ["nombre"=>$nombre, "apellido1"=>$apellido1, "apellido2"=>$apellido2, "user"=>$user, "pass"=>$pass, "email"=>$email];
                crearUsuario($datosUsuario);
            }else{
                echo "<span style='color: red; font-size: large;'>ERROR!!! El usuario", $_POST['user']," ya existe.</span>";
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
                    <input required="required" type="text" name="email"><br/><br/>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="enviar" onclick="">Enviar</button>
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
    <script src="./assets/js/ejercicio01V2.js"></script>
</body>
</html>