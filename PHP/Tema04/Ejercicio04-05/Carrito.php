<?php
    require_once("./Producto.php");
    class Carrito{
        /* Creando una variable privada llamada 'listaProductos' 
        e inicializándola como un array vacío. */
        private $listaProductos = [];

        function anadirProducto(Producto $p){
            if(in_array($p, $this->listaProductos)){
                //Incrementar la cantidad que teníamos guardado en la lista
            }else{
                $p->cantidad = 1;
                array_push($this->listaProductos,$p);
            }
        }
    }
?>