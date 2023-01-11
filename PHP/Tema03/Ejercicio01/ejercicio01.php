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
        /* Obtener los valores de las variables f y c de la URL. */
        $filas = intval($_GET['f']);
        $cols = intval($_GET["c"]);

        /**
         * Imprime una tabla con un número dado de filas y columnas, y cada celda contiene un campo de
         * entrada con un nombre dado y un valor que es el producto de los números de fila y columna.
         * @param string nombreArray El nombre de la matriz que se creará en el formulario.
         * @param int filas número de filas
         * @param int cols número de columnas
         */
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
                            /* Llamando a la función `ponerMatrices` con los parámetros `"a"`, `filas` y`cols`. */
                            ponerMatrices("a", $filas, $cols);
                        ?>
                    </table>
                </td>
                <td>
                    <table border="1">
                    <caption>B</caption>
                    <?php
                        /* Llamando a la función `ponerMatrices` con los parámetros `"b"`, `filas` y`cols`. */
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