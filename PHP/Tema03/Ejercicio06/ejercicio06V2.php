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
        $fContador="/var/www/phpdata/contador.txt";
        if(file_exists($fContador)){ //Si existe el fichero
            $descripcionContador = fopen($fContador, "r+"); //Abre el fichero
            $contador = intval(fgets($descripcionContador)); //Lee el fichero y el contador lo convierte a entero
            $contador++; //Aumenta el contador
            fseek($descripcionContador, 0); // Posicion del puntero del fichero a 0
            fputs($descripcionContador, strval($contador)); //Escribe el valor incrementado en la posición a la que apunta el puntero
        }else{
            $descripcionContador = fopen($fContador, "w"); //Crea el fichero y lo pone en modo escritura
            fputs($descripcionContador, "1"); //Poner el contador a 1
            $contador = 1;
        }
        fclose($descripcionContador); //Cerrar el fichero
        echo "Eres el visitante: $contador";
    ?>
</body>
</html>