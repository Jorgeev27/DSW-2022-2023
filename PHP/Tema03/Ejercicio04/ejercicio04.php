<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 04_Jorge Escobar</title>
</head>
<body>
    <?php

    /*
    
    4. Lo mismo que el ejercicio 2, pero mostrando los números 
    con las imágenes del ejercicio anterior.

    */

    /**
     * Función que hace el sorteo de los números de la primitiva
     * 
     */
        function sorteoPrimitiva(){
            $numerosPrimitiva = [];
            while(count($numerosPrimitiva) < 6){
                $numero = random_int(1, 49);
                if(!in_array($numero, $numerosPrimitiva)){
                    array_push($numerosPrimitiva, $numero);
                }
            }
            sort($numerosPrimitiva);
            return $numerosPrimitiva;
        }
        
        $primitivaSorteo = sorteoPrimitiva();
        echo "<table>\n";
        echo "<tr>\n";
        foreach($primitivaSorteo as $valor){
            echo "<td><img src='../../img/imgNumeros/",$valor,".png'</td>";
        }
        echo "</tr>\n";
        echo "</table>";
        print_r($primitivaSorteo);
    ?>
</body>
</html>