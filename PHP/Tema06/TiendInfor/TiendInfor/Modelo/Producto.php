<?php
    declare(strict_types = 1);
    class Producto{
        /* Creando un array con los atributos de la clase Producto. */
        private $atributos = ['cod'=> "", 'nombre'=> "", 'nombre_corto'=> "", 'descripcion'=> "", 'PVP'=> 0, 'familia'=> ""];

        /**
         * Esta función es un constructor que toma una cadena, una cadena, una cadena, una cadena, un
         * flotante o una cadena y una cadena. Establece los valores de las propiedades del objeto a
         * los valores de los parámetros.
         * @param string cod El código del producto.
         * @param nombre El nombre del producto.
         * @param string nombre_corto Nombre abreviado del producto.
         * @param string descripcion Una descripción del producto.
         * @param float PVP Precio
         * @param string familia familia del producto
         */
        public function __construct(string $cod = null, ?string $nombre = "", string $nombre_corto = "", string $descripcion = "", float | string $PVP = 0, string $familia = ""){
            if($cod != null){
            $this->cod = $cod;
            $this->nombre = $nombre;
            $this->nombre_corto = $nombre_corto;
            $this->descripcion = $descripcion;
            $this->PVP = (float)$PVP;
            $this->familia = $familia;
            }
        }

        /**
         * La función __set() es un método mágico que le permite establecer el valor de una propiedad que no existe.
         * @param string atributo - Nombre del atributo que desea establecer.
         * @param string | float | null valor - Valor que se asignará al atributo.
         */
        public function __set(string $atributo, string | float | null $valor){
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
         * @param stdClass p - Objeto que contiene la información del producto.
         * @return Producto - Nuevo objeto Producto.
         */
        public static function getProdFromStd(stdClass $p): Producto{
            return new Producto($p->cod, $p->nombre, $p->nombre_corto, $p->descripcion, $p->PVP, $p->familia);
        }

        /**
         * Convierte el objeto a una cadena.
         * @return Objeto que se está convirtiendo a una cadena.
         */
        public function __toString(){
            return json_encode($this->atributos, JSON_UNESCAPED_UNICODE);
        }
    }
?>