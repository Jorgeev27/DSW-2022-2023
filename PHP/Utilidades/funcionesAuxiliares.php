<?php

    /**
     * Funcion de mostrar numeros en imagenes
     */
    defined("__CONFIG__") || require_once("../config.php");
    function mostrarNumImg(string $numero, string $porcentaje=""){
        $ruta = ROOT_PATH."/img/imgNumeros";
        for($i = 0; $i < strlen($numero); $i++){
            echo "<img src='$ruta/",$numero[$i],".png' alt='", $numero[$i],"' width='${porcentaje}%'/> \n";
        }
    }



    /**
     * Abre un archivo, lee el número de visitas, lo incrementa y lo vuelve a escribir en el archivo
     */
    function contadorVisitas(){
        $fContador = "/var/www/phpdata/contador.txt";
        $fdContador = fopen($fContador, "c+");
        $contador = fgets($fdContador);
        if($contador == false){
            $contador = 1;
        }else{
            $contador = intval($contador) +1;
            fseek($fdContador, 0);
        }
        fputs($fdContador, strval($contador));
        fclose($fdContador);
    }
?>