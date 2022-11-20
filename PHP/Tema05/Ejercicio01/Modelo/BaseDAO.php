<?php
    class BaseDAO{
        /**
         * Se conecta a la base de datos.
         * @return La conexión a la base de datos.
         */
        public static function getConexion(){
            $conexion = new MySQLi('localhost', 'productos', 'productos2021', 'productos');
            if($conexion->errno != null){
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