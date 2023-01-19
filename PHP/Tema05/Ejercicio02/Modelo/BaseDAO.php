<?php
    class BaseDAO{
        /* Una variable estática privada que se utilizará para almacenar el número de filas afectadas
        por la última consulta. */
        private static $lastAffectedRows;

        
        /**
         * Crea un nuevo objeto PDO, que es un objeto PHP que representa una conexión a una base de datos.
         * El primer parámetro del constructor de PDO es una cadena que contiene el tipo de base de
         * datos a la que nos estamos conectando y la ubicación de la base de datos.
         * @return conexión a la base de datos de los productos.
         */
        public static function getConexion(){
            $conexion = new PDO("sqlite:/var/www/phpdata/productos.sqlite");
            if($conexion->errno != null){
                throw new Exception("ERROR!! Al conectar con la base de datos de productos: ", $conexion->error);
            }
            return $conexion;
        }

        /**
         * Se conecta a la base de datos y ejecuta la consulta.
         * @param string sql La consulta SQL a ejecutar.
         * @return bool | MySQLi_result El resultado de la consulta.
         */
        public static function consulta(string $sql):int | MySQLi_result{
            try{
                $conexion = self::getConexion();
                $resultado = $conexion->query($sql);
                //BaseDAO::$lastAffectedRows = $conexion->affected_rows;
                $conexion->close();
                return $resultado;
            }catch(Exception $ex){
                die("ERROR!! en la consulta");
            }
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