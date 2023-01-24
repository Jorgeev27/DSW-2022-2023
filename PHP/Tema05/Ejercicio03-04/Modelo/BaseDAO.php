<?php
    class BaseDAO{
        /**
         * Devuelve un objeto PDO que representa una conexión a la base de datos.
         * @return Conexión a la base de datos.
         */
        public static function getConexion(){
            [$host, $usuario, $contrasenia, $baseDatos] = ['localhost', 'gestisimal', 'gestisimal2021', 'gestisimal'];
            $conexion = new PDO("mysql:host=$host;dbname=$baseDatos;charset=utf8", $usuario, $contrasenia);
            return $conexion;
        }


        /**
         * Se conecta a la base de datos y ejecuta la consulta.
         * @param string sql - Consulta SQL a ejecutar.
         * @return bool | PDOStatement - Devolviendo un objeto PDOStatement.
         */
        public static function consulta(string $sql): bool | PDOStatement{
                $conexion = self::getConexion();
                $resultado = $conexion->query($sql);
                unset($conexion);
                return $resultado;
        }
    }
?>