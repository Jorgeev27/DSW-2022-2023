<?php
    require_once("./DAOProducto.php");
    
    class Producto{
        /* Atributos de la clase Producto. */
        private $atributos = ['id' => 0, 'descripcion' => "", 'nombre' => "", 'precio' => 0.0, 'imagen' => ""];
        
        /**
         * Esta función es un constructor de la clase Producto. Toma 5 parámetros y los asigna a las
         * variables de clase.
         * @param int id La identificación del producto.
         * @param string descripcion La descripción del producto.
         * @param string nombre El nombre del producto.
         * @param float precio El precio del producto.
         * @param string imagen La imagen del producto.
         */
        public function __construct(int $id, string $descripcion, string $nombre, float $precio, string $imagen){
            $this->id = $id;
            $this->descripcion = $descripcion;
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->imagen = $imagen;
        }
        
        /**
         * La función __set() es un método mágico que se llama cuando intenta establecer un valor para una
         * propiedad que no existe.
         * @param string atributo El nombre del atributo que desea establecer.
         * @param mixed valor El valor para establecer el atributo.
         */
        public function __set(string $atributo, mixed $valor){
            if($atributo == "id" && $valor < 0){
                throw new InvalidArgumentException("Error valor no válido para el id");
            }
            $this->atributos[$atributo]=$valor;
        }
        
        /**
         * Devuelve el valor del atributo.
         * @param string atributo El nombre del atributo que desea obtener.
         * @return El valor del atributo.
         */
        public function __get(string $atributo){
            return $this->atributos[$atributo];
        }

        /**
         * Toma una matriz de datos y devuelve un nuevo objeto Producto
         * @param datosProducto una matriz con las siguientes claves:
         * @return Una nueva instancia de la clase Producto.
         */
        public static function getProducto($datosProducto){
            $id = intval($datosProducto['id']);
            $descripcion = $datosProducto['descripcion'];
            $nombre = $datosProducto['nombre'];
            $precio = floatval($datosProducto['precio']);
            $imagen = $datosProducto['imagen'];
            return new Producto($id, $descripcion, $nombre, $precio, $imagen);
        }

        /* Una función estática que toma un objeto stdClass y devuelve un objeto Producto. */
        static function getProdStd(stdClass $stdProd): Producto{
            return new Producto($stdProd->id, $stdProd->descripcion, $stdProd->nombre, floatval($stdProd->precio), $stdProd->imagen);
        }

        /**
         * La función __toString() es un método mágico que devuelve una representación de cadena del
         * objeto.
         * @return El objeto se está convirtiendo en una cadena.
         */
        public function __toString(){
            return json_encode($this->atributos, JSON_UNESCAPED_UNICODE);
        }
    }
?>