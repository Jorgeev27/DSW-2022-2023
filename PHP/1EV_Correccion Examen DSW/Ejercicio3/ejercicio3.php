<?php
    declare(strict_types = 1);
    require_once("./DAOEquipos.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen DSW_ Jorge Escobar</title>
</head>
<body>
    <table>
    <tr>
        <th>Posición</th>
        <th>Equipo</th>
        <th>Puntos</th>
    </tr>
    <?php
        /**
         * Toma una serie de resultados, dos equipos y una serie de equipos, y devuelve una serie de
         * equipos con puntos actualizados.
         * @param array resultado Un array con el resultado del partido.
         * @param Equipo local el equipo local
         * @param Equipo visitante El equipo visitante
         * @param array equiposLiga Un array de objetos de tipo Equipo.
         * @return array de equipos con los puntos actualizados.
         */
        function sumarPuntaje(array $resultado, Equipo $local, Equipo $visitante, array $equiposLiga){
            if ($resultado[0] > $resultado[1]) {
                for ($i=0; $i < count($equiposLiga); $i++) { 
                    if ($equiposLiga[$i]->id == $local->id) {
                        $equiposLiga[$i]->puntos += 3;
                        break;
                    }
                }
            }else if($resultado[0] < $resultado[1]){
                for ($i=0; $i < count($equiposLiga); $i++) { 
                    if ($equiposLiga[$i]->id == $visitante->id) {
                        $equiposLiga[$i]->puntos += 3;
                        break;
                    }
                }
            }else{
                for ($i=0; $i < count($equiposLiga); $i++) { 
                    if($equiposLiga[$i]->id == $local->id || $equiposLiga[$i]->id == $visitante->id) {
                        $equiposLiga[$i]->puntos += 1;
                    }
                }
            }
            return $equiposLiga;
        }
        $equiposLiga = [];

        /* Conseguir el número de equipos de la liga. */
        $numEquipos = DAOEquipos::numEquipos();

        /* Obtener todos los equipos de la base de datos y almacenarlos en una matriz. */
        for ($i=1; $i <=  $numEquipos ; $i++) { 
            $equipo = DAOEquipos::buscarEquipo($i);
            array_push($equiposLiga,$equipo);
        }

        /* Obtener el número de partidos en la base de datos. */
        $numPartidos = DAOEquipos::numPartidos();

        /* Iterando a través de todos los partidos en la base de datos y agregando los puntos a los equipos. */
        for ($i=1; $i <= $numPartidos; $i++) { 
            $partido = DAOEquipos::buscarPartido($i);
            $local = DAOEquipos::buscarEquipo($partido->local);
            $visitante =  DAOEquipos::buscarEquipo($partido->visitante);
            $resultado = explode("-",$partido->resultado);
            $equiposLiga =  sumarPuntaje($resultado,$local,$visitante,$equiposLiga);
        }

        /* Ordena la matriz por valor, manteniendo la asociación clave. */
        asort($equiposLiga);

        /* Impresión de la tabla con los equipos y sus puntos. */
        for ($i=0; $i < count($equiposLiga); $i++) { 
            echo "<tr>",
            "<td>",$i+1,"</td>",
            "<td>",$equiposLiga[$i]->nombre,"</td>",
            "<td>",$equiposLiga[$i]->puntos,"</td>"
            ,"</tr>";
        }
    ?>
    </table>
</body>
</html>