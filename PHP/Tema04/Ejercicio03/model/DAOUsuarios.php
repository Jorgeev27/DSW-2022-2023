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
     * Abre un archivo, codifica una contraseña, codifica algunos datos en JSON, escribe los datos en
     * el archivo y cierra el archivo.
     * @param array datosUsuario Una matriz con los datos del usuario.
     * @return bool un valor booleano.
     */
    function crearUsuario(array $datosUsuario): bool{
        $fdBaseDatosUsuarios = fopen(DATA_PATH."/bdUsuarios.txt", "a"); //Abrir el fichero en modo escritura
        $datosUsuario['pass'] = password_hash($datosUsuario['pass'], PASSWORD_DEFAULT); //Sustituido la contraseña en texto plano por el hash de la misma
        $datosUsuarioJSON = json_encode($datosUsuario, JSON_UNESCAPED_UNICODE); //Los datos del usuario codificados en JSON
        $resultadoEscritura = fputs($fdBaseDatosUsuarios, $datosUsuarioJSON); //Lo ponemos en el fichero
        fclose($fdBaseDatosUsuarios); //Cierra el fichero
        if($resultadoEscritura == null){
            return false;
        }elseif(is_bool($resultadoEscritura)){
            return $resultadoEscritura;
        }else{
            return $resultadoEscritura > 0; //Numero de bytes es mayor a 0
        }
        //return $resultadoEscritura;
    }


    /**
     * Abre un archivo, lo lee línea por línea y, si la línea no coincide con el usuario que estamos
     * buscando, lo escribe en un archivo temporal. Si coincide, escribe los datos del nuevo usuario en
     * el archivo temporal. Luego cierra los archivos, elimina el archivo original y cambia el nombre
     * del archivo temporal al nombre del archivo original
     * 
     * @param array datosUsuario Array con los datos del usuario a modificar.
     * 
     * @return bool un valor booleano.
     */
    function modificarUsuario(array $datosUsuario): bool{
        if(buscarUsuario($datosUsuario['user'])){ //Si encuentra user
            $fdBaseDatosUsuarios = fopen(DATA_PATH."/bdUsuarios.txt", "r"); //Abrir fichero modo lectura
            $fdBaseDatosUsuariosTemp = fopen(DATA_PATH."/bdUsuarios_Temp.txt", "w"); //Abrir fichero en modo escritura
            while($lineaFichero = fgets($datosUsuario)){ //Leyendo linea por linea
                $datosUsuarioTemp = json_decode($lineaFichero, true);
                if($datosUsuario['user'] != $datosUsuarioTemp['user']){ //Si no coinciden lo vuelco en el fichero de salida
                    fputs($fdBaseDatosUsuariosTemp, $lineaFichero);
                }
            }
            $lineaFichero = json_encode($datosUsuario, JSON_UNESCAPED_UNICODE);
            fputs($fdBaseDatosUsuariosTemp, $lineaFichero);
            fclose($fdBaseDatosUsuarios);
            fclose($fdBaseDatosUsuariosTemp);
            unlink(DATA_PATH."/bdUsuarios.txt");
            rename(DATA_PATH."/bdUsuarios_Temp.txt", DATA_PATH."/bdUsuarios.txt");
            return true;
        }else{
            return false;
        }
    }

?>