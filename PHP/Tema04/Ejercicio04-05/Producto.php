<?php
    class Producto{
        /* Declarar las propiedades de la clase. */

        //private $id, $nombre, $precio, $descripcion, $imagen, $stock;
        
        /* Un array asociativo que contiene los atributos de la clase. */
        private $atributos = ["id"=>0, "nombre"=>"", "precio"=>0, "descripcion"=> "", "imagen"=> "", "stock"=> ""];
        
        /**
         * Constructor de la clase Producto.
         * @param id La identificación del producto.
         * @param nombre El nombre del producto.
         * @param precio precio del producto
         * @param descripcion La descripción del producto.
         * @param imagen La imagen del producto.
         * @param stock La cantidad de stock disponible para el producto.
         */
        function __construct(int $id, string $nombre, float $precio, string $descripcion, string $imagen, int $stock){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->descripcion = $descripcion;
            $this->imagen = $imagen;
            $this->stock = $stock;
        }

        /**
         * Se activa al escribir datos en propiedades inaccesibles.
         * @param propiedad El nombre de la propiedad que está intentando establecer.
         * @param valor El valor a establecer.
         */
        function __set(string $propiedad, mixed $valor){
            if($propiedad == "id" && $valor < 1){
                throw new Exception("ERROR!!! El ID no es válido");
            }
            //$this->$propiedad = $valor;
            $this->atributos[$propiedad] = $valor;
        }

        /**
         * Devuelve el valor de la propiedad a la que intentas acceder.
         * @param propiedad El nombre de la propiedad a la que intenta acceder.
         * @return El valor de la propiedad.
         */
        function __get(string $propiedad){
            return $this->atributos[$propiedad];
        }

        /**
         * Llama cuando el objeto se usa en un contexto de cadena
         * @return Producto: devuelve el método __toString() del producto.
         */
        function __toString(){
            return "Producto: ".json_encode($this->atributos, JSON_UNESCAPED_UNICODE);
        }
    }
?>