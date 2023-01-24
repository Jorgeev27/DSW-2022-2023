<?php
    class BaseDAO{
        /* Una variable estática privada que se utilizará para almacenar el número de filas afectadas
        por la última consulta. */
        private static $lastAffectedRows;
        
        
        /**
         * Crea un nuevo objeto PDO, que es un objeto PHP que representa una conexión a una base de datos.
         * @return Conexión a la base de datos.
         */
        public static function getConexion(){
            $conexion = new PDO("sqlite:/var/www/phpdata/productos.sqlite");
            return $conexion;
        }

        
        /**
         * Ejecuta una consulta y devuelve el resultado.
         * @param string sql - Consulta SQL a ejecutar.
         * @return bool | PDOStatement - Resultado de la consulta.
         */
        public static function consulta(string $sql):bool | PDOStatement{
                $conexion = self::getConexion();
                $resultado = $conexion->query($sql);
                //BaseDAO::$lastAffectedRows = $conexion->affected_rows;
                unset($conexion);
                return $resultado;
        }
        
        /**
         * Devuelve el número de filas afectadas por la última consulta INSERTAR, ACTUALIZAR, REEMPLAZAR o ELIMINAR
         * @return Número de filas afectadas por la última instrucción SQL.
         */
        public static function getLastAffectedRows(){
            return self::$lastAffectedRows;
        }
    }
?>