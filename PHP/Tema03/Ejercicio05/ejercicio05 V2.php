<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 05_Jorge Escobar</title>
</head>
<body>
    <?php

    /*
    
    5. Realiza un programa que muestre la fecha y hora actual 
    usando las imágenes del Ejercicio 2.
    
    */
        require_once("../../Utilidades/funcionesAuxiliares.php");
        date_default_timezone_set('Atlantic/Canary');
        $fechaHora = date("m/d/Y:h:i:s");
        for($i = 0; i < strlen($fechaHora); $i++){
            if(is_numeric($fechaHora[$i])){
                mostrarNumImg($fechaHora[$i], "../../img/imgNumeros/", strval(intval(100 / strlen($fechaHora))));
            }else{
                echo $fechaHora[$i];
            }
        }
    ?>
</body>
</html>