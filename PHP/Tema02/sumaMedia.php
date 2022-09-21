<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
        $numero1=$_REQUEST['numero1'];
        $numero2=$_REQUEST['numero2'];
        $suma=0;
        for($i=$numero1;$i<=$numero2;$i++){
            $suma+=$i;
        }
        echo "La suma de los dos numeros es: $suma.\n<br/>";
        echo "La media de los dos numeros es: ",$suma/($numero2-$numero1+1);
    ?>
</body>
</html>
