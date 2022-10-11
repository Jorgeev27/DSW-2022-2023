<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 06_Jorge Escobar</title>
</head>
<body>
    <?php

    /*
    
    6. Implementar un contador de visitas
    
    */
        // Abriendolo en C+
        $fContador = "/var/www/phpdata/contador.txt";
        $fdContador = fopen($fContador, "c+"); //Si no existe, lo crea y escribe sobre este
        $contador = fgets($fdContador);
        if($contador == false){
            $contador = 1;
        }else{
            $contador = intval($contador) +1;
            fseek($fdContador, 0);
        }
        fputs($fdContador, strval($contador));
        fclose($fdContador);
        echo "Eres el visitante: $contador";
    ?>
</body>
</html>