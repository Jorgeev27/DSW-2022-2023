<?php 
    declare(strict_types = 1); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 01_Jorge Escobar</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <?php
        /**
         * Toma una matriz bidimensional y un título, y muestra la matriz como una tabla con el título
         * como el título de la tabla.
         * @param a La matriz que se va a mostrar.
         * @param caption El título de la tabla.
         */
        function mostrarMatrizBid($a, $caption){
            echo "<table>\n";
            echo "<caption>$caption</caption>\n";
            foreach($a as $fila){
                echo "<tr>";
                foreach($fila as $celda){
                    echo "<td>$celda</td>";
                }
                echo "</tr>\n";
            }
            echo "</table>";
        }
        /* Obtener los valores del formulario. */
        $a = $_POST['a'];
        $b = $_POST['b'];

        /* Sumando los valores de las matrices A y B y almacenándolos en C. */
        for($i = 0; $i < sizeof($a); $i++){
            for($j = 0; $j < sizeof($a[$i]); $j++){
                $c[$i][$j] = intval($a[$i][$j]) + intval($b[$i][$j]);
            }
        }
    ?>
    <table>
        <tr>
            <td>
                <?php
                    /* Llamando a la función `mostrarMatrizBid` y pasando los parámetros `a` y `"A"`. */
                    mostrarMatrizBid($a, "A");
                ?>
            </td>
            <td>
                <?php
                    /* Llamando a la función `mostrarMatrizBid` y pasando los parámetros `b` y `"B"`. */
                    mostrarMatrizBid($b, "B");
                ?>
            </td>
            <td>
                <?php
                    /* Llamando a la función `mostrarMatrizBid` y pasando los parámetros `c` y `"C"`. */
                    mostrarMatrizBid($c, "C");
                ?>
            </td>
        </tr>
    </table>
</body>
</html>