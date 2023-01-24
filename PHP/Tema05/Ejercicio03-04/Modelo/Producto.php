<?php
    require_once("./DAOProducto.php");
    
    class Producto{
        /* Atributos de la clase Producto. */
        private $atributos = ['id' => "", 'descripcion' => "", 'pcompra' => 0, 'pventa' => 0, 'stock' => 0];

        /**
         * La función __construct() es una función especial que se llama automáticamente cuando se crea un objeto.
         * @param int id - La identificación del producto.
         * @param string descripcion - Nombre del producto.
         * @param float pcompra - Precio de compra del producto.
         * @param float pventa - Precio del producto.
         * @param int stock - Cantidad de stock que tienes del producto.
         */
        public function __construct(int $id, string $descripcion, float $pcompra, float $pventa, int $stock){
            $this->id = $id;
            $this->descripcion = $descripcion;
            $this->pcompra = $pcompra;
            $this->pventa = $pventa;
            $this->stock = $stock;
        }

        /**
         * La función __set() se activa al escribir datos en propiedades inaccesibles
         * @param string atributo - Nombre del atributo que desea establecer.
         * @param mixed valor - Valor que se asignará al atributo.
         */
        public function __set(string $atributo, mixed $valor){
            $this->atributos[$atributo]=$valor;
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
         * Toma una matriz de datos y devuelve un nuevo objeto Producto.
         * @param datosProducto - Array con los datos del producto.
         * @return Nueva instancia de la clase Producto.
         */
        public static function getProducto($datosProducto){
            $id = intval($datosProducto['id']);
            $descripcion = $datosProducto['descripcion'];
            $pcompra = floatval($datosProducto['pcompra']);
            $pventa = floatval($datosProducto['pventa']);
            $stock = $datosProducto['stock'];
            return new Producto($id, $descripcion, $pcompra, $pventa, $stock);
        }

        /**
         * La función `__toString()` es un método mágico que se llama cuando se usa un objeto en un
         * contexto de cadena.
         * @return Objeto se está convirtiendo en una cadena.
         */
        public function __toString(){
            return json_encode($this->atributos, JSON_UNESCAPED_UNICODE);
        }
    }
?>