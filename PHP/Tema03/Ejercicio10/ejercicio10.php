<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10_Jorge Escobar</title>
</head>
<body>
    <?php
    /*

    10. Programa que imprima las direcciones IP públicas del Instituto

    */
    require_once("../../config.php");
    $repeticiones = 10;
    $i = 0;
    $listaIp = [];

    do{
        $ip = json_decode(file_get_contents("https://api.ipify.org?format=json"))->ip;
        if(!in_array($ip, $listaIp)){
            array_push($listaIp, $ip);
        }
    }while(++$i < $repeticiones);
    echo $listaIp;
    ?>
</body>
</html>