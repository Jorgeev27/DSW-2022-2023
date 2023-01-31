<?php
    declare(strict_types = 1);
    require_once("../../../Utilidades/BasePDO.php");
    class DAOProducto{
        public static function getPaginaProducto(int $numPag, int $tamPag = 10): array{
            $listaProductos = [];
            $indice = $tamPag * ($numPag - 1);
            $sql = "SELECT * from producto LEFT JOIN ordenador ON producto.cod=ordenador.cod";
            $resultado = BaseDAO::consulta($sql);
            while(($producto = $resultado->fetchObject()) != null){
                $listaProductos[$producto->id] = Producto::getProdStd($producto);
            }
            return $listaProductos;
        }
    }
?>