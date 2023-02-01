<?php
    declare(strict_types = 1);
    require_once("../../../Utilidades/BasePDO.php");
    require_once("./Producto.php");
    require_once("./Ordenador.php");

    class DAOProducto{
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
    }
?>