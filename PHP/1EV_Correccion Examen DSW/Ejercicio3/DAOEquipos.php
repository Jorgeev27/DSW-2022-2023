<?php
    require_once("./BaseDAO.php");
    require_once("./Equipo.php");
    require_once("./Partido.php");

    class DAOEquipos{
        /**
         * Busca un equipo en la base de datos y lo devuelve como objeto.
         * @param int id El id del equipo que desea buscar.
         * @return ?Equipo un objeto de la clase Equipo.
         */
        public static function buscarEquipo(int $id):?Equipo{
            $busqueda=BaseDAO::consulta("SELECT * FROM equipos WHERE id='$id'");
            if ($busqueda->num_rows==0) {
                return null;
            }
            return Equipo::arrayEquipo($busqueda->fetch_assoc());
        }

        /**
         * Busca una coincidencia en la base de datos y la devuelve como un objeto
         * @param int id La identificación del partido
         * @return ?Partido un array de objetos.
         */
        public static function buscarPartido(int $id):?Partido{
            $busqueda=BaseDAO::consulta("SELECT * FROM partidos WHERE id='$id'");
            if ($busqueda->num_rows==0) {
                return null;
            }
            return Partido::arrayPartido($busqueda->fetch_assoc());
        }

        /**
         * Devuelve el número de equipos en la base de datos.
         * @return int El número de equipos en la base de datos.
         */
        public static function numEquipos():int {
            $resultado=BaseDAO::consulta("SELECT count(*) AS numEquipos FROM equipos");
            return intval($resultado->fetch_assoc()['numEquipos']);
        }

        /**
         * Devuelve el número de filas de la tabla partidos.
         * @return int El número de filas en la tabla.
         */
        public static function numPartidos():int {
            $resultado=BaseDAO::consulta("SELECT count(*) AS numPartidos FROM partidos");
            return intval($resultado->fetch_assoc()['numPartidos']);
        }
    }
?>