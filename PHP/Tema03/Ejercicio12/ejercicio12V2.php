<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12_Jorge Escobar</title>
    <link rel="stylesheet" href="./assets/css/ejercicio12V2.css">
</head>
<body>
    <?php
        /*

        12. Programa en PHP que muestre un tablero de ajedrez, de 64 casillas, columnas de la a-h y filas de la 1-8. 
        Cuando el usuario haga "click" sobre una casilla, se le enviará información al programa de las coordenadas 
        de la casilla y el programa devolverá un nuevo tablero, coloreando las casillas a las cuales podría 
        saltar un alfil, desde la casilla indicada.

        */
        require_once("../../config.php");
        
        /**
        * Crea un tablero de ajedrez con el número dado de filas y columnas, y si se da una celda, marcará
        * todas las celdas que están en la misma diagonal que la celda dada.
        * 
        * @param int filas número de filas
        * @param int cols número de columnas
        * @param array celda array con las coordenadas de la celda a marcar.
        */
        function tablero(int $filas = 8, int $cols = 8, array $celda = null){
            echo "<table>\n"; //Abrir tabla
            for($i = $filas; $i > 0; $i--){ //For para las filas
                echo "<tr>\n";
                echo "<th>$i</th>\n";
                for($j = $cols; $j > 0; $j--){ //For para las columnas
                    $clase = (($i + $j) % 2 == 0 ? 'blanco' : 'negro'); //Si la suma entre 2 el resto es 0, blanco. Si no, negro
                    if($celda != null && abs(intval($celda[0]) - $i) == abs(intval($celda[1]) -$j)){
                        $clase = 'marcado';
                    }
                    echo "<td class='$clase' onclick='recarga($i, $j);'></td>\n";
                }
                echo "</tr>\n";
            }
            echo "<tr>\n<th></th>\n";
            for($letra = ord('a'); $letra  < ord('a') + $cols; $letra++){
                echo "<th>", chr($letra), "</th>\n";
            }
            echo "</tr>\n";
            echo "</table>\n";
        }

        $tam = 8;
        if(isset($_GET['fila']) && isset($_GET['col'])){ //Si hay GET de filas y columnas
            tablero($tam, $tam, [$_GET['fila'], $_GET['col']]);
        }else{
            tablero($tam, $tam); //Devuelve el tablero
        }
    ?>
    <script src="./assets/js/ejercicio12V2.js"></script>
</body>
</html>