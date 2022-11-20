<?php
    declare(strict_types = 1);
    defined("__CONFIG__") || require_once("../../../config.php");
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
            if($datosUsuario['user'] == $user){ //Comprobar si el usuario corresponde con el que buscamos
                fclose($fdBaseDatosUsuarios); //Cierra el fichero
                return $datosUsuario; //Retorna los datos de usuario si existe
            }
        }
        fclose($fdBaseDatosUsuarios); //Cierra el fichero
        return false; //Retorna false si no existe
    }
    
    /**
     * Crea un usuario en la base de datos.
     * @param array datosUsuario Una matriz con los datos del usuario.
     * @return bool Se está devolviendo un valor booleano.
     */
    function crearUsuario(array $datosUsuario): bool{
        $fdBaseDatosUsuarios = fopen(DATA_PATH."bdUsuarios.txt", "a"); //Abrir el fichero en modo escritura
        $datosUsuario['pass'] = password_hash($datosUsuario['pass'], PASSWORD_DEFAULT); //Sustituido la contraseña en texto plano por el hash de la misma
        $datosUsuarioJSON = json_encode($datosUsuario, JSON_UNESCAPED_UNICODE); //Los datos del usuario codificados en JSON
        $resultadoEscritura = fputs($fdBaseDatosUsuarios, $datosUsuarioJSON); //Lo ponemos en el fichero
        fclose($fdBaseDatosUsuarios); //Cierra el fichero
        //return $resultadoEscritura == null ? false : (is_bool($resultadoEscritura) ? $resultadoEscritura : $resultadoEscritura > 0);
        if($resultadoEscritura == null){
            return false;
        }elseif(is_bool($resultadoEscritura)){
            return $resultadoEscritura;
        }else{
            return $resultadoEscritura > 0;
        }
    }
?>