<?php
    class BaseDAO{
        /* Una variable estática privada que se utilizará para almacenar el número de filas afectadas
        por la última consulta. */
        private static $lastAffectedRows;
        
        /**
         * Se conecta a la base de datos.
         * @return La conexión a la base de datos.
         */
        public static function getConexion(){
            $conexion = new MySQLi("localhost", "productos", "productos2022", "productos");
            if($conexion->errno != null){
                throw new Exception("Error conectando a la base de datos de productos: ", $conexion->error);
            }
            return $conexion;
        }

        /**
         * Se conecta a la base de datos y ejecuta la consulta.
         * @param string sql La consulta SQL a ejecutar.
         * @return bool | MySQLi_result El resultado de la consulta.
         */
        public static function consulta(string $sql):int | MySQLi_result{
            $conexion = self::getConexion();
            $resultado = $conexion->query($sql);
            $conexion->affected_rows;
            //BaseDAO::$lastAffectedRows = $conexion->affected_rows;
            $conexion->close();
            return $resultado;
        }
        
        /**
         * Devuelve el número de filas afectadas por la última consulta INSERTAR, ACTUALIZAR, REEMPLAZAR o ELIMINAR
         * @return El número de filas afectadas por la última instrucción SQL.
         */
        public static function getLastAffectedRows(){
            return self::$lastAffectedRows;
        }
    }
?>