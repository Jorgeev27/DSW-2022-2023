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

        /**
         * Toma un array asociativo y devuelve un objeto Producto.
         * @param array datosProductos - Array asociativo con los datos del producto.
         * @return Producto - Objeto de tipo Producto.
         */
        public static function getProdFromAssoc(array $datosProductos): Producto{
            //return new Producto($datos['cod'], $datos['nombre'], $datos['nombre_corto'], $datos['descripcion'], $datos['PVP'], $datos['familia']);
            $p = new Producto();
            foreach($datosProductos as $atributo=>$valor){
                $p->$atributo = $valor;
            }
            return $p;
        }

        /**
         * Toma un objeto stdClass y devuelve un objeto Producto.
         * @param stdClass prodObj - Objeto que contiene la información del producto.
         * @return Producto - Nuevo objeto Producto.
         */
        public static function getProdFromStd(stdClass $prodObj): Producto{
            return new Producto($prodObj->cod, $prodObj->nombre, $prodObj->nombre_corto, $prodObj->descripcion, $prodObj->PVP, $prodObj->familia);
        }
    }
?>