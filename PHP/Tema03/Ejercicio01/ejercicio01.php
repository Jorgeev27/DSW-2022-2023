<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 01_Jorge Escobar</title>
</head>
<body>
    <?php

    /*
    
    1. Programa que reciba por "GET" número de filas (f) 
    y número de columnas (c) y muestre formulario para 
    pedir 2 matrices de fxc y que al enviar los datos 
    muestre la suma de ambas (ampliar para el producto de matrices)

    */

        $filas = intval($_GET['f']);
        $cols = intval($_GET["c"]);

        function ponerMatrices(string $nombreArray, int $filas, int $cols){
            for($f = 0; $f < $filas; $f++){
                echo "<tr>\n";
                for($c = 0; $c < $cols; $c++){
                    $valor = $f * $cols + $c;
                    echo "<td>\n";
                    echo "<input type='number' name='$nombreArray","[$f][]' size='5' value='$valor'>";
                    echo "</td>\n";
                }
                echo "</tr>\n";
            }
        }

    ?>
    
    <form action="sumaMatrices.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <table border="1">
                        <caption>A</caption>
                        <?php
                        ponerMatrices("a", $filas, $cols);
                        ?>
                    </table>
                </td>
                <td>
                    <table border="1">
                    <caption>B</caption>
                    <?php
                        ponerMatrices("b", $filas, $cols);
                    ?>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" value="Enviar">Enviar</button>
                </td>
                <td>
                    <button type="reset" value="Reiniciar">Reiniciar</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>