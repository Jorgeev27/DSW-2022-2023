<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 02_Jorge Escobar</title>
</head>
<body>
    <?php

    /**
     * Función que hace el sorteo de los números de la primitiva
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
            echo "<td>$valor</td>";
        }
        echo "</tr>\n";
        echo "</table>";
        print_r($primitivaSorteo);
    ?>
</body>
</html>