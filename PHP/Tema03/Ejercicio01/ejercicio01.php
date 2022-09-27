<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 01_Jorge Escobar</title>
</head>
<body>
    <?php

    /*
    
    1 - Programa que reciba por "GET" número de filas (f) 
    y número de columnas (c) y muestre formulario para 
    pedir 2 matrices de fxc y que al enviar los datos 
    muestre la suma de ambas (ampliar para el producto de matrices)ç

    */

    $filas = $_GET['f'];
    $cols = $_GET["c"];

    function ponerMatrices($nombreArray){
        for($f = 0; $f < $filas; $f++){
            echo "<tr>\n";
            for($c = 0; $c < $cols; $c++){
                echo "<td>\n";
                echo "<input type='number' name='a[$f][]' size='5'>";
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
                        matrices("a");
                        ?>
                    </table>
                </td>
                <td>
                    <table>
                    <caption>B</caption>
                    <?php
                        matrices("b");
                    ?>
                    </table border="1">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Enviar">
                    <input type="reset" value="Reiniciar">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
