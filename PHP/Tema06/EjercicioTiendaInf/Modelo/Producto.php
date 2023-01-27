<?php
    declare(strict_types = 1);
    class Producto{
        /* Creando un array con los atributos de la clase Producto. */
        private $atributos = ['cod'=> "", 'nombre'=> "", 'nombre_corto'=> "", 'descripcion'=> "", 'PVP'=> 0, 'familia'=> ""];

        /**
         * Esta función es un constructor de la clase Producto.
         * @param string cod - Código del producto.
         * @param string nombre - Nombre del producto.
         * @param string nombre_corto - Nombre abreviado del producto.
         * @param string descripcion - Descripción del producto.
         * @param float PVP - Precio del producto.
         * @param string familia - Familia del producto.
         */
        public function __construct(string $cod = null, string $nombre = "", string $nombre_corto = "", string $descripcion = "", float $PVP = 0, string $familia = ""){
            $this->cod = $cod;
            $this->nombre = $nombre;
            $this->nombre_corto = $nombre_corto;
            $this->descripcion = $descripcion;
            $this->PVP = $PVP;
            $this->familia = $familia;
        }

        /**
         * La función __set() es un método mágico que le permite establecer el valor de una propiedad que no existe.
         * @param string atributo - Nombre del atributo que desea establecer.
         * @param string valor - Valor que se asignará al atributo.
         */
        public function __set(string $atributo, string | float $valor){
            $this->atributos[$atributo] = $valor;
        }

        /**
         * Devuelve el valor del atributo.
         * @param string atributo - Nombre del atributo que desea obtener.
         * @return Valor del atributo.
         */
        public function __get(string $atributo){
            return $this->atributos[$atributo];
        }

        public static function getProdFromAssoc(array $datos){
            //return new Producto($datos['cod'], $datos['nombre'], $datos['nombre_corto'], $datos['descripcion'], $datos['PVP'], $datos['familia']);
            $p = new Producto();
            foreach($datos as $atributo=>$valor){

            }
        }
    }
?>