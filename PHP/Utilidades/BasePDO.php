<?php
    declare(strict_types = 1);
    class BaseDAO{
        /* Una variable estática privada que se utilizará para almacenar el número de filas afectadas por la última consulta. */
        private static $lastAffectedRows;

        /**
         * Crea una conexión a la base de datos y lo devuelve como un objeto PDO.
         * @return PDO - Conexión a la base de datos.
         */
        public static function getConexion(): PDO{
            try{
                $conexion = new PDO("mysql:host=localhost;charset=utf8;dbname=tiendinfor", "tiendinfor", "tiendinfor2023");
                //$conexion = new PDO("sqlite:/var/www/phpdata/tiendinfor.sqlite"); //PARA SQLITE
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //También se puede omitir
            }catch(PDOException $ex){
                die("ERROR!! Al establecer conexion con el servidor de base de datos");
            }
            return $conexion;
        }

        /**
         * Se conecta a la base de datos y ejecuta la consulta.
         * @param string sql - Consulta SQL a ejecutar.
         * @return PDOStatement | int - Resultado de la consulta.
         */
        public static function consulta(string $sql): PDOStatement | int{
            try{
                $conexion = self::getConexion();
                if(str_starts_with(strtolower(trim($sql)), "select")){
                    $resultado = $conexion->query($sql);
                }else{ //Insert, Update o Delete
                    $resultado = $conexion->exec($sql);
                }
                unset($conexion); //Cerrar la conexión
                return $resultado;
            }catch(PDOException $ex){
                die("ERROR!! En la consulta: ".$ex->getMessage());
            }
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