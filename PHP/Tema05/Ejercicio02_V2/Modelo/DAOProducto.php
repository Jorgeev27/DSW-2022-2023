<?php
    use DAOProducto as GlobalDAOProducto;
    require_once(__DIR__."/BaseDAO.php");
    require_once(__DIR__."/Producto.php");
    
    class DAOProducto{
        /**
         * Elimina un producto de la base de datos.
         * @param int id - Id del producto que se va a eliminar.
         * @return bool Número de filas afectadas por la consulta.
         */
        public static function borrarProducto(int $id): bool{
            $sql = "DELETE FROM producto WHERE id = '$id'";
            return BaseDAO::consulta($sql) == 1;
        }

        /**
         * Inserta un producto en la base de datos.
         * @param Producto - Nombre del producto a insertar.
         * @return bool Número de filas afectadas por la última instrucción SQL.
         */
        public static function insertarProducto(Producto $producto): bool{
            if($producto->id == 0){
                $id = "null";
            }else{
                $id = $producto->id;
            }
            $sql = "INSERT INTO producto VALUES ('$id','$producto->descripcion','$producto->nombre',$producto->precio,$producto->imagen)";
            return BaseDAO::consulta($sql) == 1;
        }

        /**
         * Actualiza la tabla de productos con los valores del objeto de producto.
         * @param Producto - Objeto que contiene los datos a modificar.
         * @return bool Número de filas afectadas por la última instrucción SQL.
         */
        public static function modificarProducto(Producto $producto): bool{
            $sql = "UPDATE producto SET descripcion = '$producto->descripcion',nombre = '$producto->nombre',precio = $producto->precio,imagen = '$producto->imagen' WHERE id = $producto->id";
            return BaseDAO::consulta($sql) == 1;
        }

        /**
         * Devuelve un objeto de producto de la base de datos.
         * @param int id - Id del producto que desea buscar.
         * @return Producto | null - Objeto Producto o nulo si no se encuentra el producto.
         */
        public static function buscarProducto(int $id): Producto | null{
            $resultado = BaseDAO::consulta("SELECT * FROM producto WHERE id='$id'");
            if($resultado->rowCount() == 0){
                return null;
            }
            return Producto::getProdStd($resultado->fetchObject());
        }

        /**
         * Busca un producto por nombre.
         * @param string nombre - nombre del producto.
         * @return Producto | null - Un objeto Producto o nulo.
         */
        public static function buscarProductoNombre(string $nombre): Producto | null{
            $resultado = BaseDAO::consulta("SELECT * FROM producto WHERE nombre='$nombre'");
            if($resultado->rowCount() == 0){
                return null;
            }
            return Producto::getProdStd($resultado->fetchObject());
        }

        /**
         * Obtiene una página de productos de la base de datos.
         * @param numPag - Número de página que desea obtener.
         * @param tamPag - Número de productos por página.
         * @return array - Un array de productos.
         */
        public static function getPaginaProducto($numPag, $tamPag = 10): array{
            $listaProductos = [];
            $indice = $tamPag * ($numPag - 1);
            $sql = "SELECT * FROM producto LIMIT $indice,$tamPag";
            $resultado = BaseDAO::consulta($sql);
            while(($producto = $resultado->fetchObject()) != null){
                $listaProductos[$producto['id']] = Producto::getProdStd($producto);
            }
            return $listaProductos;
        }

        /**
         * Devuelve el número de productos en la base de datos.
         * @return int - Número de productos en la base de datos.
         */
        public static function numProductos(): int{
            $resultado = BaseDAO::consulta("SELECT COUNT(*) AS numProds FROM producto");
            return intval($resultado->fetchObject()->numProds);
        }

        /**
         * Devuelve el número de páginas que se necesitarán para mostrar todos los productos.
         * @param int tamPag - Número de productos por página
         * @return int - Número de páginas que se necesitarán para mostrar todos los productos.
         */
        public static function numPags(int $tamPag): int{
            return ceil(DAOProducto::numProductos() / $tamPag);
        }

        /**
         * Devuelve el valor máximo de la columna id en la tabla de productos.
         * @return int - Valor máximo de la columna id en la tabla de productos.
         */
        public static function maxNumProducto(): int{
            $resultado = BaseDAO::consulta("SELECT MAX(id) AS max FROM producto");
            return intval($resultado->fetchObject()->max);
        }
    }
?>