<?php
    declare(strict_types = 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen DSW_ Jorge Escobar</title>
</head>
<body>
    <?php
        /**
         * Toma un array escalar, cada una de las cuales tiene una clave de "contenido", y genera un botón para cada una de ellas.
         * @param array botones Una array escalar y cada elemento del array representa un botón.
         */
        function crearBotones(array $botones){
            echo "<tr>\n";
            for($i = 0; $i < count($botones); $i++){
                echo "<td><button ";
                foreach($botones[$i] as $atributo=>$valor){
                    if($atributo != $valor){
                        echo " $atributo='$valor' ";
                    }
                }
                echo ">",$botones[$i]['content'],"</button></td>\n";
            }
            echo "</tr>\n";
        }

        /**
         * Toma un array de atributos y crea un elemento HTML con esos atributos
         * @param array campo array del campo que se va a crear.
         */
        function crearInput(array $campo){
            echo "<",$campo['elemento']," ";
            foreach($campo as $atributo=>$valor){
                if($atributo != "label" && $atributo != "elemento"){
                    echo " $atributo='$valor' ";
                }
            }
            if($campo['elemento'] == 'textarea'){
                echo "></textarea>\n";
            }else{
                echo "/>\n";
            }
        }

        /**
         * Crea un elemento de selección con los atributos de nombre e id establecidos en los valores
         * de las claves de nombre e id del array, y las opciones del elemento de selección
         * son los valores de la tecla opciones del array.
         * @param array campo Array que contiene la información del campo.
         */
        function crearSelect(array $campo){
            echo "<select name='",$select['name'],"' id='",$select['id'],"'>\n";
            foreach($campo['opciones'] as $opt){
                echo "<option>$opt</option>\n";
            }
            echo "</select>";
        }

        /**
         * Crea una fila de tabla para cada elemento del array y luego llama a una función para
         * crear el elemento de entrada.
         * @param array campos array de los campos
         */
        function crearCampos(array $campos){
            foreach($campos as $campo){
                echo "<tr><td><label>",$campo['label'],"</label></td><td>\n";
                if($campo['elemento'] == 'select'){
                    crearSelect($campo);
                }else{
                    crearInput($campo);
                }
                echo "</td></tr>\n";
            }
        }

        /* Obtiene el contenido del archivo "form.json" y lo decodifica en un array. */
        $form = json_decode(file_get_contents("./form.json"), true);
        echo "<form action='",$form['action'],"' method='",$form['method'],"' id='",$form['id'],"' enctype='",$form['enctype'],"'>\n";
        echo "<table>\n";

        /* Llamando a la función crearCampos y pasando el array ['campos'] como parámetro. */
        crearCampos($form['campos']);

        /* Llamando a la función crearBotones y pasando el array['botones'] como parámetro. */
        crearBotones($form['botones']);

        echo "</table>\n";
        echo "</form>\n";
    ?>
</body>
</html>