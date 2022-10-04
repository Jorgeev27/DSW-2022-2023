<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 03_Jorge Escobar</title>
</head>
<body>
    <?php

    /*
    
    3. Programa que genere un número aleatorio de 5 cifras 
    y lo muestre con imágenes.
    
    */
        $numero = random_int(10000, 99999);
        $numeroStr = strval($numero);
        for($i = 0; $i < strlen($numeroStr); $i++){
            echo "<img src='../../img/imgNumeros/",$numeroStr[$i],".png'/>";
        }
    ?>
</body>
</html>