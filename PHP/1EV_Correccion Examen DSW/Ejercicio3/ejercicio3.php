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
         * Se conecta a la base de datos y, si no puede, sale con un mensaje de error. Si puede,
         * devuelve el resultado de la consulta.
         * @param sql La consulta SQL a ejecutar.
         * @return El resultado de la consulta.
         */
        function consulta($sql){
            $conexion = new MySQLi("localhost", "liga", "liga2022", "liga");
            if($conexion-> error != null){
                exit("ERROR!! Al conectar con la base de datos.<br/>\n");
            }
            return $conexion ->query($sql);
        }

        /**
         * Devuelve un array de todos los equipos en la base de datos.
         * @return array Un array de los equipos.
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
         * Toma los equipos y devuelve los puntos de cada equipo.
         * @param array equipos con sus puntos.
         */
        function inicializarPuntos(array $equipos):array{
            $puntosEquipos = [];
            foreach($equipos as $id=>$equipo){
                $puntosEquipos[$id] = 0;
            }
            return $puntosEquipos;
        }

        /* Llamando a la función "cargarEquipos()" y almacenando el resultado en la variable equipos. */
        $equipos = cargarEquipos();

        /* Llamando a la función "inicializarPuntos()" y almacenando el resultado en la variable puntosEquipos */
        $puntosEquipos = inicializarPuntos($equipos);
    ?>
</body>
</html>