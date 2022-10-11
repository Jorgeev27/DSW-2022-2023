<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
            $numeros = [];
            do{
                $nuevoNumero = random_int(1, 49);
                if(!in_array($nuevoNumero, $numeros)){
                    array_push($numeros, $nuevoNumero);
                }
            }while(count($numeros) < 6);
            sort($numeros);
            return $numeros;
        }
        require_once("../../Utilidades/funcionesAuxiliares.php");
        echo "<table border='1'>\n";
        $numeros = sorteoPrimitiva();
        echo "<tr>";
        foreach($numeros as $numero){
            echo "<td>";
            mostrarNumImg($numero, "../../img/imgNumeros/");
            echo "</td>";
        }
        echo "</tr>\n";
        echo "</table>\n";
    ?>
</body>
</html>