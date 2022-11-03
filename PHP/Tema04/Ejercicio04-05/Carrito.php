<?php
    require_once("./Producto.php");
    class Carrito{
        /* Creando una variable privada llamada 'listaProductos' 
        e inicializándola como un array vacío. */
        private $listaProductos = [];


        /**
         * Añade un producto al carrito de la compra.
         * @param Producto p Objeto del producto.
         * @param int cantidad del producto a agregar.
         */
        function anadirProducto(Producto $p, int $cantidad = 1){
            if(isset($this->$listaProductos[$p->id])){
                //Incrementar la cantidad que teníamos guardado en la lista
                $productoBuscado = $this->$listaProductos[$p->id];
                $productoBuscado->cantidad += $cantidad;
            }else{
                $p->cantidad = $cantidad;
                //array_push($this->listaProductos,$p);
                $this->$listaProductos[$p->id] = $p;
            }
        }

        /**
         * Borra un producto del carrito de la compra.
         * @param Producto p Objeto del producto.
         */
        function borrarProducto(Producto $p): bool{
            if(isset($this->$listaProductos[$p->id])){
                unset($this->$listaProductos[$p->id]);
                return true;
            }
            return false;
        }

        /**
         * Decrementa la cantidad de un producto en el carrito.
         * @param Producto p Objeto del producto.
         * @param int cantidad del producto a quitar.
         */
        function decrementarProducto(Producto $p, int $cantidad): bool{
            if(isset($this->$listaProductos[$p->id])){
                $producto = $this->$listaProductos[$p->id];
                if($cantidad >= $producto->cantidad){
                    $this->borrarProducto($p);
                }else{
                    $producto->cantidad -= $cantidad;
                }
                return true;
            }
            return false;
        }


        /**
         * Calcula el coste total de los productos del carrito.
         * @return float El coste total de todos los productos en el carrito.
         */
        function getCosteTotal(): float{
            $total = 0;
            foreach($this->listaProductos as $id=>$producto){
                $total += $producto->precio * $producto->cantidad;
            }
            return $total;
        }
    }
?>