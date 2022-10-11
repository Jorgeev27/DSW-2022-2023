<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 03 V2_Jorge Escobar</title>
</head>
<body>
    <?php

    /*
    
    3. Programa que genere un número aleatorio de 5 cifras 
    y lo muestre con imágenes.

    VERSION 2
    
    */
        require_once("../../Utilidades/funcionesAuxiliares.php");
        $numero = strval(random_int(10000, 99999));
        mostrarNumImg($numero, "../../img/imgNumeros/");
    ?>
</body>
</html>