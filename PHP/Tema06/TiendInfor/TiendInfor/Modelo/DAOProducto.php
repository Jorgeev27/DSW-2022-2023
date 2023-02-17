<?php
    declare(strict_types = 1);

    require_once("../Modelo/BasePDO.php");
    require_once("../Modelo/Producto.php");
    require_once("../Modelo/Ordenador.php");

    class DAOProducto {
        /**
         * Se conecta a la base de datos y ejecuta la consulta.
         * @param string sql - Consulta sql a ejecutar.
         * @return PDOStatement Consulta sql a ejecutar.
         */
        public static function consulta(string $sql): PDOStatement | int{
            return BasePDO::consulta($sql,"tiendinfor","mysql","tiendinfor","tiendinfor2023");
        }

        /**
         * Obtiene una página de productos de la base de datos.
         * @param int numPag - Número de página.
         * @param int tamPag - Número de productos por página.
         * @return array Gama de productos.
         */
        public static function getPaginaProducto(int $numPag, int $tamPag = 10): array{
            $listaProductos = [];
            $indice = $tamPag * ($numPag - 1);
            $sql = "SELECT * FROM producto LEFT JOIN ordenador ON cod=codProd LIMIT $indice,$tamPag";
            $resultado = self::consulta($sql);
            while(($prod = $resultado->fetchObject()) != null){
                if($prod->codProd == null){ //Si no es un ordenador
                    $listaProductos[$prod->cod] = Producto::getProdFromStd($prod);
                }else{ //Si es un ordenador
                    $listaProductos[$prod->cod] = Ordenador::getProdFromStd($prod);
                }
            }
            return $listaProductos;
        }

        /**
         * Devuelve un array de todas las familias de productos en la base de datos.
         * @return array con las familias de productos.
         */
        public static function getFamilias() : array {
            $listaFamilias = [];
            $sql = "SELECT * FROM familia";
            $resultado = self::consulta($sql);
            while(($familia = $resultado -> fetchObject()) != null) { 
                $listaFamilias[$familia->cod] = $familia->nombre;
            }
            return $listaFamilias;
        }

        /**
         * Obtiene los detalles de un producto de la base de datos.
         * @param string codProducto - Código del producto.
         * @return array de objetos de tipo Ordenador.
         */
        public static function getDetallesProducto(string $codProducto) : array {
            $listaDetalles = [];
            $sql = "SELECT * FROM producto LEFT JOIN ordenador ON cod=codProd WHERE codProd = '$codProducto'";
            $resultado = self::consulta($sql);
            if(($detalles = $resultado -> fetchObject()) != null) { 
                $listaDetalles[$detalles->cod] = Ordenador::getProdFromStd($detalles);
            }
            return $listaDetalles;
        }

        /**
         * Devuelve un array de productos de la base de datos, filtrados por familia.
         * @param int numPag - Número de página
         * @param int tamPag - Número de productos por página
         * @param string familia - Familia del producto.
         * @return array de productos.
         */
        public static function getProductosPorFamilia(int $numPag = 1, int $tamPag = 10, string $familia) : array {
            $listaProductos = [];
            $indice = $tamPag * ($numPag - 1);
            if ($familia != null) {
                $sql = "SELECT * FROM producto LEFT JOIN ordenador ON cod=codProd WHERE familia = '$familia' LIMIT $indice, $tamPag";
                $resultado = self::consulta($sql);
                while(($prod = $resultado -> fetchObject()) != null) { 
                    if ($prod->codProd == null) { //Si el ordenador tiene el codProd != null
                    $listaProductos[$prod->cod] = Producto::getProdFromStd($prod);
                    } else {
                    $listaProductos[$prod->cod] = Ordenador::getProdFromStd($prod);
                    }
                }
                return $listaProductos;
            } else {
                return self::getPaginaProducto($numPag, $tamPag);
            }
        }

        /**
         * Busca un producto en la base de datos, y lo devuelve como objeto Producto o Ordenador, o nulo si no existe
         * @param string cod - Código del producto a buscar
         * @return Producto | Ordenador | null - Objeto Producto o Ordenador o nulo si no se encuentra el producto.
         */
        public static function buscarProducto(string $cod) : Producto | Ordenador | null {
            $resultado = self::consulta("SELECT * FROM producto LEFT JOIN ordenador ON cod=codProd WHERE cod = '$cod'");
            if ($resultado->rowCount() == 0) {
                echo "a";
                return null;
            }
            if (($prod = $resultado -> fetchObject()) != null) {
                if ($prod->codProd == null) {
                    return Producto::getProdFromStd($prod);
                } else {
                    return Ordenador::getProdFromStd($prod);
                }
            }
        }

        /**
         * Comprueba si el usuario existe en la base de datos y si la contraseña es correcta
         * @param string usuario - Nombre de usuario del usuario.
         * @param string password - Contraseña del usuario.
         * @return bool Valor booleano.
         */
        public static function comprobarUsuario(string $usuario, string $password) : bool {
            $resultado = self::consulta("SELECT * FROM usuarios WHERE usuario = '$usuario'");
            if (($datos = $resultado ->fetchObject()) != null) { // si existe
                if (password_verify($password, $datos->contrasena)) {
                    return true;
                }
            }
            return false;
        }

        /**
         * Devuelve el número de productos en la base de datos.
         * @return int Número de productos en la base de datos.
         */
        public static function numProductos() : int {
            $resultado = self::consulta("SELECT count(*) as numProds FROM producto");
            return intval($resultado->fetchObject()->numProds);
        }

        /**
         * Devuelve el número de páginas que se necesitarán para mostrar todos los productos.
         * @param int tamPag - Número de productos por página.
         * @return Número de páginas que se necesitarán para mostrar todos los productos.
         */
        public static function numPags(int $tamPag)  {
            return ceil(self::numProductos() / $tamPag); // devuelve el entero por encima
        }

        /**
         * Devuelve el número máximo de productos en la base de datos.
         * @return int Número máximo de productos en la base de datos.
         */
        public static function maxNumProducto() : int {
            $resultado = self::consulta("SELECT max(cod) as max FROM producto");
            return intval($resultado->fetchObject()->max);
        }
    }
?>