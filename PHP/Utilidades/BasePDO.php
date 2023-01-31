<?php
    declare(strict_types = 1);
    class BasePDO{
        /* Una variable estática privada que se utilizará para almacenar el número de filas afectadas por la última consulta. */
        private static $lastAffectedRows;

        /**
         * Devuelve un objeto PDO que representa una conexión a una base de datos.
         * @param dbname - Nombre de la base de datos a la que desea conectarse.
         * @param driver - Tipo de base de datos a la que te estás conectando.
         * @param user - Nombre de usuario para conectarse a la base de datos.
         * @param pass - Contraseña para el usuario de la base de datos.
         * @return PDO - Objeto PDO.
         */
        public static function getConexion($dbname, $driver, $user, $pass): PDO{
            try{
                $dsn = "";
                if($driver == "mysql"){
                    $conexion = new PDO("mysql:host=localhost;charset=utf8;dbname=$dbname","$user","$pass");
                }else if($driver == "sqlite"){
                    $conexion = new PDO("sqlite:$dbname");
                }else{
                    die("ERROR!! Driver de base de datos desconocido: $driver");
                }
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //También se puede omitir
            }catch(PDOException $ex){
                die("ERROR!! Al establecer conexion con el servidor de base de datos");
            }
            return $conexion;
        }

        /**
         * Se conecta a una base de datos y ejecuta una consulta.
         * @param string sql - Consulta SQL a ejecutar.
         * @param dbname - Nombre de la base de datos a la que desea conectarse.
         * @param driver - Tipo de base de datos a la que se está conectando.
         * @param user - Nombre de usuario para la base de datos.
         * @param pass - Contraseña para la base de datos.
         * @return PDOStatement | int - Objeto PDOStatement o un entero.
         */
        public static function consulta(string $sql, $dbname, $driver, $user = null, $pass = null): PDOStatement | int{
            try{
                $conexion = self::getConexion($dbname, $driver, $user, $pass);
                if(str_starts_with(strtolower(trim($sql)), "select")){
                    $resultado = $conexion->query($sql); //Objeto PDOStatement.
                }else{ //Insert, Update o Delete
                    $resultado = $conexion->exec($sql); //Nº de filas afectadas.
                }
                unset($conexion); //Cerrar la conexión
                return $resultado;
            }catch(PDOException $ex){
                die("ERROR!! En la consulta: ".$ex->getMessage());
            }
        }

        /**
         * Devuelve el número de filas afectadas por la última consulta
         * @return Número de filas afectadas por la última instrucción SQL.
         */
        public static function getLastAffectedRows(){
            return self::$lastAffectedRows;
        }
    }
?>