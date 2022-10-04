<?php

    /**
     * Funcion de mostrar numeros en imagenes
     */

    function mostrarNumImg(string $numero, string $rutaRelativa, string $porcentaje=""){
        for($i = 0; $i < strlen($numero); $i++){
            echo "<img src='$rutaRelativa/",$numero[$i],".png' alt='", $numero[$i],"' width='${porcentaje}%'/> \n";
        }
    }
?>