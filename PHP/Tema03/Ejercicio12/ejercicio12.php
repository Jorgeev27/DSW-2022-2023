<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12_Jorge Escobar</title>
    <style>
        .blanco{
            background-color: white;
        }
        .negro{
            background-color: black;
        }
    </style>
</head>
<body>
    <table border ="1px" width = "400" height="400"> <!--Creo la tabla-->
    <?php
        /*

        12. Programa en PHP que muestre un tablero de ajedrez, de 64 casillas, columnas de la a-h y filas de la 1-8. 
        Cuando el usuario haga "click" sobre una casilla, se le enviará información al programa de las coordenadas 
        de la casilla y el programa devolverá un nuevo tablero, coloreando las casillas a las cuales podría 
        saltar un alfil, desde la casilla indicada.

        */
        require_once("../../config.php");
        for($i = 1; $i <= 8; $i++){ //For desde 1 a 8
            echo "<tr>\n";
            for($j = 1; $j <= 8; $j++){ //For desde 1 a 8
                $totalCasillas = $i + $j; //Sumo las casillas de $i y $j para ver cuánto hay en total
                if($totalCasillas % 2 == 0){ //Si el total de casillas entre 2 el resto es 0
                    echo "<td class='blanco' id='"."$i"."-$j' onclick='mandaInfo(this.id);'></td>\n"; //Pinta de blanco
                }else{
                    echo "<td class='negro' id='"."$i"."-$j' onclick='mandaInfo(this.id);'></td>\n"; //Pinta de negro
                }
            }
            echo "</tr>\n";
        }
    ?>
    <?php
        $posicionesCasillas = []; //Array de las posiciones de las casillas
        for($i = 1; $i <= 8; $i++){ //For desde 1 a 8
            for($j = 1; $j <= 8; $j++){ //For desde 1 a 8
                $posicionesCasillas[$i][$j] = $i."-".$j; //El array de las casillas de $i y $j. Ejemplo: $i=3, $j=2
            }
        }
        $posicionCasillasClic = $_GET['id']; //Se lo paso por GET
        echo "Has marcado en la posición: ".$posicionCasillasClic;
        /**
        * La primera vez, da error porque el array de id no está definido pero después cuando clicas se ejecuta el programa sin problemas
         * Al hacer click, se pasan los parámetros por la dirección, ya que le puse el método GET pero el problema es que no se pinta dónde he clicado
         */
    ?>
    </table>
    <script src="./assets/js/ejercicio12.js" type="text/javascript"></script>
</body>
</html>