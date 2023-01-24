<?php

    /* Importación de las clases BaseDAO y Producto. */
    require_once("./BaseDAO.php");
    require_once("./Producto.php");
    
    class DAOProducto{

        /**
         * Elimina un producto de la base de datos.
         * @param string id - Id del producto que se va a eliminar.
         * @return Resultado de la consulta.
         */
        public static function borrarProducto(string $id){
            $sql = "DELETE FROM producto WHERE codigo = '$id'";
            return BaseDAO::consulta($sql);
        }

        /**
         * Inserta un producto en la base de datos.
         * @param Producto - Nombre del producto que se va a insertar
         * @return Resultado de la consulta.
         */
        public static function insertarProducto(Producto $producto){
            $sql = "INSERT INTO producto VALUES ('$producto->codigo','$producto->descripcion','$producto->pventa',$producto->pcompra,$producto->stock)";
            return BaseDAO::consulta($sql);
        }

        /**
         * Actualiza la tabla de productos con los valores del objeto de producto.
         * @param Producto - El objeto que contiene los datos a modificar.
         * @return Resultado de la consulta.
         */
        public static function modificarProducto(Producto $producto){
            $sql = "UPDATE producto SET descripcion = '$producto->descripcion',pcompra = '$producto->pcompra',
            pventa = $producto->pventa,stock = '$producto->stock' WHERE codigo = $producto->codigo";
            return BaseDAO::consulta($sql);
        }

        /**
         * Busca un producto en la base de datos.
         * @param int codigo - Código del producto.
         * @return codigo ? Producto - Objeto de producto.
         */
        public static function buscarProducto(int $codigo): ? Producto{
            $resultado = BaseDAO::consulta("SELECT * FROM producto WHERE codigo='$codigo'");
            if($resultado->num_rows == 0){
                return null;
            }
            return Producto::getProducto($resultado->fetch_assoc());
        }

        /**
         * Obtiene una página de productos de la base de datos.
         * @param numPag - Número de página que desea obtener.
         * @param tamPag - Número de productos por página.
         * @return array - Gama de productos.
         */
        public static function getPaginaProducto($numPag, $tamPag = 10): array{
            $listaProductos = [];
            $indice = $tamPag * ($numPag - 1);
            $sql = "SELECT * FROM producto LIMIT $indice,$tamPag";
            $resultado = BaseDAO::consulta($sql);
            while(($producto = $resultado->fetch_assoc()) != null){
                $listaProductos[$producto['id']] = Producto::getProducto($producto);
            }
            return  $listaProductos;
        }

        /**
         * Devuelve el número de productos en la base de datos.
         * @return int - Número de productos en la base de datos.
         */
        public static function numProductos(): int{
            $resultado = BaseDAO::consulta("SELECT COUNT(*) AS numProductos FROM producto");
            return intval($resultado->fetch_assoc()['numProductos']);
        }

        /**
         * Devuelve el número de páginas que se necesitarán para mostrar todos los productos.
         * @param int tamPag - Número de productos por página
         * @return int Número de páginas que se necesitarán para mostrar todos los productos.
         */
        public static function numPags(int $tamPag): int{
            return ceil(DAOProducto::numProductos() / $tamPag);
        }

        /**
         * Devuelve el máximo de valores de la columna id en la tabla de productos.
         * @return int Valor máximo de la columna id en la tabla de productos.
         */
        public static function maxNumProducto(): int{
            $resultado = BaseDAO::consulta("SELECT MAX(id) AS max FROM producto");
            return intval($resultado->fetch_assoc()['max']);
        }
    }
?>