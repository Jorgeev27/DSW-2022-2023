<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 06_Jorge Escobar</title>
</head>
<body>
    <?php

    /*
    
    6. Implementar un contador de visitas
    
    */
    $fContador="/var/www/phpdata/contador.txt";
    if(file_exists($fContador)){ //Si existe el fichero
        $descripcionContador = fopen($fContador, "r+"); //Abre el fichero
        $contador = intval(fgets($descripcionContador)); //Lee el fichero y el contador lo convierte a entero
        $contador++; //Aumenta el contador
        fseek($descripcionContador, 0); // Posicion del fichero a 0
        fputs($descripcionContador, strval($contador)); //Escribe el valor incrementado
    }else{
        $descripcionContador = fopen($fContador, "w");
        fputs($descripcionContador, "1");
        $contador = 1;
    }
    fclose($descripcionContador);
    echo "Eres el visitante: $contador";

    ?>
</body>
</html>