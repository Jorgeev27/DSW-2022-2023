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
    <h1>Estadísticas Anuales de las Temperaturas</h1>
    <table>
        <tr>
            <th>Mes</th>
            <th>Mínima</th>
            <th>Máxima</th>
            <th>Media</th>
        </tr>
    <?php
        /**
         * Lee el contenido del archivo "temperaturas.json" y lo devuelve como un array.
         * @return los datos de las temperaturas del archivo json.
         */
        function obtenerDatos(){
            return json_decode(file_get_contents("./temperaturas.json"), true);
        }

        /**
         * Toma un array de números y devuelve el promedio de esos números.
         * @param array datos array de números.
         * @return float El promedio de los números en el array.
         */
        function mediaMes(array $datos):float{
            $sumaTotal = array_reduce($datos, fn($a,$b)=>$a + $b);
            return round($sumaTotal / count($datos), 2);
        }

        /**
         * Toma un array de números e imprime una tabla con el mínimo, máximo y promedio
         * de temperatura de cada mes.
         * @param array temperaturas, cada una de las cuales contiene el nombre del
         * mes y un array de temperaturas de ese mes.
         */
        function insertarDatosEnTabla(array $temperaturas){
            $maxAnio = $minAnio = $temperaturas[0]['datos'][0];
            $sumaMediaAnio = 0;
            foreach($temperaturas as $mes){
                $min = min($mes['datos']);
                $max = max($mes['datos']);
                $media = mediaMes($mes['datos']);
                $sumaMediaAnio += $media;
                if($min < $minAnio){
                    $minAnio = $min;
                }
                if($max > $maxAnio){
                    $maxAnio = $max;
                }
                echo "<tr><th>",$mes['mes'],"</th><td>$min</td><td>$max</td><td>$media</td></tr>\n";
            }
            echo "<tr><th>Año completo</th><td>$minAnio</td><td>$maxAnio</td><td>",round($sumaMediaAnio / 12, 2),"</td></tr>\n";
        }

        /* Llamar a la función `insertarDatosEnTabla` con el resultado de la función `obtenerDatos`
        como argumento. */
        insertarDatosEnTabla(obtenerDatos());
    ?>
    </table>
</body>
</html>