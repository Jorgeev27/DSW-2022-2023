<?php 
    declare(strict_types = 1); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 02_Jorge Escobar</title>
</head>
<body>
    <?php
        require_once("../../config.php");
        /**
         * Abre un archivo, lee el número que contiene, lo incrementa y lo vuelve a escribir en el
         * archivo.
         */
        function contadorVisitas(){
            $fContador = "/var/www/phpdata/contador.txt";
            $fdContador = fopen($fContador, "c+");
            $contador = fgets($fdContador);
            if($contador == false){
                $contador = 1;
            }else{
                $contador = intval($contador) +1;
                fseek($fdContador, 0);
            }
            fputs($fdContador, strval($contador));
            fclose($fdContador);
        }

        $contVisitas = contadorVisitas();
        /* Comprueba si existe la cookie y, si existe, mostrará la fecha y la hora de la
        última visita y el número de visitas. */
        if($_COOKIE && isset($_COOKIE['timeStampUltimaVisita'])){
            $timeStamp = $_COOKIE['timeStampUltimaVisita']; //Cogemos la COOKIE y la ponemos en la variable timeStamp
            $tiempo = date('H:i:s', $timeStamp); //Coge la hora y la ponemos en la varible tiempo
            $fecha = date('D:m:Y', $timeStamp); //Coge la fecha y la ponemos en la variable hora
            $visitas = $contVisitas - intval($_COOKIE['numeroVisita']) - 1; //Coge el numero de visitas
            echo "Ultima vez transcurrido el ", $fecha, " a las: ", $tiempo;
            echo "Ha pasado: ", $visitas, " desde la ultima vez";
        }else{
            echo "Hola hola!!!! Bienvenido!";
        }
        setcookie("timeStampUltimaVisita", getdate()[0], tiempo()+ 365 * 24 * 60 * 60); //Guardamos el timestamp de la visita por 1 año
        setcookie("numeroVisita", $contVisitas, tiempo()+ 365 * 24 * 60 * 60); //El ídem con el número de la visita
    ?>
</body>
</html>