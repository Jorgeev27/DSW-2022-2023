<?php
    declare(strict_types = 1);

    class Carro {
        /* Declarar una variable privada llamada `listaProductos` e inicializarla como un array vacía. */
        private $listaProductos = [];

        /**
         * Toma un parámetro `$p` que es un `Ordenador` o un `Producto` y un parámetro opcional `$cantidad` que es un número entero.
         * @param Ordenador p - Parámetro que se pasará a la función.
         * @param int cantidad del producto a agregar.
         */
        function aniadir(Ordenador | Producto $p, int $cantidad = 1){
            if(isset($this->listaProductos[$p->cod])){
                $productoBuscado = $this->listaProductos[$p->cod];
                $productoBuscado->cantidad += $cantidad;
            }else{
                $p->cantidad = $cantidad;
                $this->listaProductos[$p->cod] = $p;
            }
        }

        /**
         * Toma como parámetro un objeto de tipo Ordenador o Producto y devuelve un booleano.
         * @param Ordenador p - Parámetro que estamos pasando a la función.
         * @return bool valor booleano.
         */
        function borrar(Ordenador | Producto $p): bool{
            if(isset($this->listaProductos[$p->cod])){
                unset($this->listaProductos[$p->cod]);
                return true;
            }
            return false;
        }

        /**
         * Elimina un producto de la cesta de la compra.
         * @param Ordenador p - Producto que se va a agregar o quitar.
         * @param cantidad - Cantidad del producto a añadir o restar.
         * @return bool valor booleano.
         */
        function restar(Ordenador | Producto $p, $cantidad): bool{
            if(isset($this->listaProductos[$p->cod])){
                $producto = $this->listaProductos[$p->cod];
                if($cantidad >= $producto->cantidad){
                    $this->borrar($p);
                }else{
                    $producto->cantidad -= $cantidad;
                }
                return true;
            }
            return false;
        }

        /**
         * Calcula el costo total de los productos en el carrito de compras.
         * @return float Costo total de los productos en el carrito de compras.
         */
        function getCosteTotal(): float{
            $total = 0;
            foreach($this->listaProductos as $cod => $producto){
                $total += $producto->PVP * $producto->cantidad;
            }
            return $total;
        }

        /**
         * Devuelve la lista de productos.
         * @return Lista de productos.
         */
        function getListaProductos(){
            return $this->listaProductos;
        }

        /**
         * La función __toString() es un método mágico que se llama cuando el objeto se usa como una cadena.
         * @return Lista de productos en formato JSON.
         */
        public function __toString(){
            return json_encode($this->listaProductos, JSON_UNESCAPED_UNICODE);
        }
    }
?>