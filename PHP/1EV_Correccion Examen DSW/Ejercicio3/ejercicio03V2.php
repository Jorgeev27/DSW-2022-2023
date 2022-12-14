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
         * Se conecta a la base de datos y, si no puede, sale con un mensaje de error. Si puede, devuelve
         * el resultado de la consulta.
         * @param string sql La consulta SQL a ejecutar.
         * @return bool | MySQLi_result El resultado de la consulta.
         */
        function consulta(string $sql):bool | MySQLi_result{
            $conexion = new MySQLi("localhost", "liga", "liga2022", "liga");
            if($conexion->error != null){
                exit("ERROR!!! Al conectar con la base de datos.<br/>\n");
            }
            return $conexion->query($sql);
        }

        /**
         * Devuelve una matriz de todos los equipos en la base de datos.
         * @return array Una matriz de los equipos.
         */
        function cargarEquipos():array{
            $resultado = consulta("SELECT * FROM equipos");
            $equipos = [];
            while(($equipo = $resultado->fetch_assoc()) != null){
                $equipos[$equipo['id']] = $equipo['nombre'];
            }
            return $equipos;
        }

        /**
         * Toma una serie de equipos y devuelve una serie de puntos para cada equipo.
         * @param array de equipos
         */
        function inicializarPuntos(array $equipos):array{
            $puntosEquipos = [];
            foreach($equipos as $id=>$equipo){
                $puntosEquipos[$id] = 0;
            }
            return $puntosEquipos;
        }

        /**
         * Toma dos arrays, uno con los nombres de los equipos y otro con los puntos de cada equipo, 
         * e imprime una tabla con los equipos ordenados por puntos
         * @param array equipos una matriz de nombres de equipos indexados por ID de equipo
         * @param array puntosEquipos una matriz de los puntos que tiene cada equipo.
         */
        function mostrarClasificacion(array $equipos, array $puntosEquipos){
            echo "<table>\n";
            echo "\t<thead>\n";
            echo "<tr><th>Posición</th><th>Equipo</th><th>Puntos</th></tr>\n";
            echo "\t</thead>\n";
            echo "\t<tbody>\n";
            $pos = 1;
            foreach($puntosEquipos as $id=>$puntos){
                echo "<tr><td>$pos</td><td>",$equipos[$id],"</td><td>",$puntos,"</td></tr>\n";
                $pos++;
            }
            echo "\t</tbody>\n";
            echo "\t</table>\n";
        }

        /**
         * Devuelve el número de puntos que tiene un equipo.
         * @param id La identificación del equipo del que desea obtener los puntos.
         * @return el número de puntos que tiene un equipo.
         */
        function puntosEquipo($id){
            $sql = "SELECT * FROM partidos WHERE local='$id' OR visitante='$id'";
            $partidosEquipo = consulta($sql);
            $puntosEquipo = 0;
            while(($partidos = $partidosEquipo->fetch_assoc()) != null){
                $resultado = explode("-", $partido['resultado']);
                $golesLocal = intval($resultado[0]);
                $golesVisitante = intval($resultado[1]);
                if($golesLocal == $golesVisitante){
                    $puntosEquipo += 1;
                }else if(($partido['local'] == $id && $golesLocal > $golesVisitante) || ($partido['visitante'] == $id && $golesVisitante > $golesLocal)){
                    $puntosEquipo += 3;
                }
            }
            return $puntosEquipo;
        }

        /* Cargando los equipos desde la base de datos. */
        $equipos = cargarEquipos();

        /* Inicializar la matriz de puntos para cada equipo. */
        $puntosEquipo = inicializarPuntos($equipos);

        /* Seleccionando todas las coincidencias de la base de datos. */
        $partidos = consulta("SELECT * FROM partidos");

        /* Iterando sobre los partidos y sumando puntos a los equipos. */
        while(($partido = $partidos->fetch_assoc()) != null){
            $resultado = explode("-", $partido['resultado']);
            $golesLocal = intval($resultado[0]);
            $golesVisitante = intval($resultado[1]);
            if($golesLocal > $golesVisitante){
                $puntosEquipos[$partido['local']] += 3;
            }else if($golesLocal < $golesVisitante){
                $puntosEquipos[$partido['visitante']] += 3;
            }else{
                $puntosEquipos[$partido['local']] += 1;
                $puntosEquipos[$partido['visitante']] += 1;
            }
        }
        /* Ordena la matriz en orden descendente. */
    //    arsort($puntosEquipos);

        /* Impresión de la tabla con los equipos y sus puntos. */
    //    mostrarClasificacion($equipos, $puntosEquipos);

        foreach($equipos as $id=>$nombre){
            echo $nombre,": ", puntosEquipo($id),"<br/>\n";
        }
    ?>
</body>
</html>