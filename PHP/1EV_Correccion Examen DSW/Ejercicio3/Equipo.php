<?php
    class Equipo{
        /* Creando un array con los atributos de la clase. */
        private $atributos = ['id' => 0, 'nombre' => "", 'puntos' => 0];

        /**
         * La función __construct() es una función especial que se llama cuando se crea un objeto
         * @param int id La identificación del equipo.
         * @param string nombre El nombre del equipo.
         * @param int puntos El número de puntos que tiene el equipo.
         */
        public function __construct(int $id, string $nombre, int $puntos){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->puntos = $puntos;
        }

        /**
         * La función __set() es un método mágico que se llama cuando intenta establecer un valor para
         * una propiedad que no existe.
         * @param string atributo El nombre del atributo a establecer.
         * @param mixed valor El valor para establecer el atributo.
         */
        public function __set(string $atributo, mixed $valor){
            if ($atributo=="id" && $valor<0) {
                throw new InvalidArgumentException("Error valor no válido para el id");
            }
            $this->atributos[$atributo]=$valor;
        }

        /**
         * Devuelve el valor del atributo.
         * @param string atributo El nombre del atributo que desea obtener.
         * @return valor del atributo.
         */
        public function __get(string $atributo){
            return $this->atributos[$atributo];
        }

        /* Una función estática que crea un nuevo objeto de la clase Equipo. */
        static function arrayEquipo(Array $equipo){
            $id = intval($equipo['id']);
            $nombre=$equipo['nombre'];
            return new Equipo($id,$nombre,0);
        }

        /**
         * La función __toString() es un método mágico que se llama cuando el objeto se usa en un contexto de cadena
         * @return objeto se está convirtiendo en una cadena.
         */
        public function __toString(){
            return json_encode($this->atributos, JSON_UNESCAPED_UNICODE);
        }
    }
?>