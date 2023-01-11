<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 11_Jorge Escobar</title>
</head>
<body>
    <?php
        require_once("../../config.php");
        /*

        11. Realiza un programa que escoja al azar 10 cartas de la baraja española y que diga 
        cuántos puntos suman según el juego de la brisca. Asegúrate de que no se repite 
        ninguna carta, igual que si las hubieras cogido de una baraja de verdad. 
        Deberás mostrar las imágenes de las cartas obtenidas al azar y la puntuación que suman. 
        El valor de cada carta es el que sigue: 
        As (11 puntos), Tres (10 puntos), Rey (4 puntos), Caballo (3 puntos) y Sota (2 puntos). 
        El resto de cartas no tienen valor puntuable. El número total de puntos que suman las cartas de la baraja es 120.

        */

        /**
        * Función que recoge los números de las cartas aleatoriamente
        */
        function numerosAleatoriosCartas(int $numeroMinimo, int $numeroMaximo): array{
            $numeros = []; //Array de los números aleatorios
            while(count($numeros) < 10){ //Si la cantidad de números aleatorios en el array es menor que 10
                $num = random_int($numeroMinimo, $numeroMaximo); //Genera un número random del número mínimo y el número máximo
                if(!in_array($num, $numeros)){ //Si no está en el array
                    array_push($numeros, $num); //Lo mete
                }
            }
            sort($numeros); //Lo ordena el array de los números
            return $numeros; //Retorna los números
        }
        
        $cartasValor=[4, 11, 0, 10, 0, 0, 0, 0, 0, 0, 2, 3]; //Array del valor de las cartas: desde el rey hasta el caballo
        $numAleatorio = numerosAleatoriosCartas(1, 48); //Genera 10 numeros aleatorios del 1 al 48 inclusives
        $puntuacionCarta = 0; //Puntuación de la partida
        foreach($numAleatorio as $carta){ //Foreach a los numeros aleatorios
            if($carta <= 12){ //Si los numeros corresponden del 1 al 12: bastos
                $paloCarta = "bastos";
            }else if($carta <= 24){ //Si los numeros corresponden del 13 al 24: copas
                $paloCarta = "copas";
            }else if($carta <= 36){ //Si los numeros corresponden del 25 al 36: espadas
                $paloCarta = "espadas";
            }else if($carta <= 48){
                $paloCarta = "oros"; //Si los numeros corresponden del 37 al 48: oros
            }
            $numeroCarta = $carta % 12; //Cogemos el resto del numero entre 12
            $puntuacionCarta += $cartasValor[$numeroCarta]; //Y la carta la ponemos en el array
            if($numeroCarta == 0){ //Si el resto del numero es 0
                $numeroCarta = 12; // Eso significa que es la carta 12, 24, 36 y 48
            }
            $imagenCarta = ROOT_PATH."/img/barajaEspa/$paloCarta/${paloCarta}${numeroCarta}.png"; //Cogemos la ruta de la imagen de la carta
            echo "<img src='$imagenCarta'/>"; //Mostramos la imagen
        }
        
        echo "<p>Puntuación de la brisca: $puntuacionCarta</p> \n"; //Puntuación de la brisca
        echo "<table border='5px black solid'>\n"; //Abrir tabla
        echo "<tr>\n";
        echo "<td>\n";
        print_r($numAleatorio); //Pintamos el array de los números aleatorios, para comprobar si son los que coinciden con las cartas
        echo "</td>\n";
        echo "</tr>\n";
        echo "</table>\n";
    ?>
</body>
</html>