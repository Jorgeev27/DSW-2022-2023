<?php
    class Producto{
        /* Declarar las propiedades de la clase. */
        //private $id, $nombre, $precio, $descripcion, $urlImagen, $stock;
        
        /* Un array asociativo que contiene los atributos de la clase. */
        private $atributos = ["id"=>0, "Nombre"=>"", "Precio"=>0, "Descripcion"=> "", "urlImagen"=> "", "Stock"=> ""];
        
        /**
         * Constructor de la clase Producto.
         * @param id La identificación del producto.
         * @param nombre El nombre del producto.
         * @param precio precio del producto
         * @param descripcion La descripción del producto.
         * @param urlImagen La URL de la imagen del producto.
         * @param stock La cantidad de stock disponible para el producto.
         */
        function __construct($id, $nombre, $precio, $descripcion, $urlImagen, $stock){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->descripcion = $descripcion;
            $this->urlImagen = $urlImagen;
            $this->stock = $stock;
        }

        /**
         * Se activa al escribir datos en propiedades inaccesibles.
         * @param propiedad El nombre de la propiedad que está intentando establecer.
         * @param valor El valor a establecer.
         */
        function __set($propiedad, $valor){
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
        function __get($propiedad){
            return $this->atributos[$propiedad];
        }

        /**
         * Permite que una clase decida cómo reaccionará cuando se trate como
         * una cadena. Este método debe devolver una cadena. 
         * De lo contrario se emite un error fatal.
         * @return Producto: representación de cadena del objeto.
         */
        function __toString(){
            return "Producto: $this->id, Nombre: $this->nombre, Precio: $this->precio, Descripcion: $this->descripcion, urlImagen: $this->urlImagen, Stock: $this->stock";
        }
    }
?>