<?php
    class BaseDAO{
        /**
         * Crea un nuevo objeto MySQLi, que es un objeto PHP que representa una conexión a una base de
         * datos MySQL
         * @return conexión a la base de datos.
         */
        public static function getConexion(){
            $conexion = new MySQLi('localhost', 'liga', 'liga2022', 'liga');
            if ($conexion->errno != null) {
                throw new Exception("Error conectando a la base de datos de productos: ", $conexion->error);
            }
            return $conexion;
        }

        /**
         * Se conecta a la base de datos y ejecuta la consulta.
         * @param string sql La consulta SQL a ejecutar.
         * @return bool | mysqli_result El resultado de la consulta.
         */
        public static function consulta(string $sql):bool | mysqli_result{
            $conexion = self::getConexion();
            $resultado = $conexion->query($sql);
            $conexion->close();
            return $resultado;
        }
    }
?>