<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 09_Jorge Escobar</title>
</head>
<body>
    <?php

    /*

    9. Programa que pida un número indeterminado de números 
    (hasta que el usuario inserte -1), muestre dichos números y la suma total

    */


    /**
     * Función del formulario que lo muestra
     */
        function mostrarForm($listaNumeros){
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="n">Numero:</label>
                <input type="number" name="n" id="n"/><br/>
                <input type="hidden" name="listaNumeros" value="<?= $listaNumeros;?>"/>
                <button type="submit">Sumar</button>
            </form>
            <?php
        }
        $listaNumeros = ""; //Inicializar a cadena en blanco
        if(isset($_POST['n'])){ //Si hay Datos
            $n = $_POST['n']; //Cogemos el numero
            $listaNumeros = $_POST['listaNumeros']; //Y se accede a lo que habia en lista numeros
            if($n == "-1"){ //Si el numero es -1
                $numeros = explode("| ", $listaNumeros); // Lo separamos en todos los componentes
                $suma = 0; // Inicializa la suma
            //  foreach($numeros as $numero){
                for($i = 1; $i < count($numeros[$i]); $i++){
                    $suma += intval($numero); // Se hace la suma
                }
                echo "Los números enviados son: $listaNumeros\n";
                echo "La suma de los números enviados es: $suma.\n";
            }else{ //Si no es -1
                $listaNumeros.="| ".$n; //Se separa con | y concatena
                mostrarForm($listaNumeros);
            }
        }else{
            mostrarForm($listaNumeros); //Muestras el formulario
        }
    ?>
</body>
</html>