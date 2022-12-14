<?php
    class Partido{
        /* Creando un array con los atributos de la clase. */
        private $atributos = ['id' => 0, 'local' => 0, 'visitante' => 0, 'resultado' => ""];

        /**
         * La función __construct() es un método constructor que se llama cuando se crea una instancia de un objeto
         * @param int id La identificación del partido.
         * @param int local El id del equipo local.
         * @param int visitante La identificación del equipo visitante.
         * @param string resultado El resultado del partido.
         */
        public function __construct(int $id, int $local, int $visitante, string $resultado){
            $this->id = $id;
            $this->local = $local;
            $this->visitante = $visitante;
            $this->resultado = $resultado;
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

        /* Un método estático que crea un nuevo objeto Partido a partir de un array. */
        static function arrayPartido(Array $partido){
            $id = intval($partido['id']);
            $local=intval($partido['local']);
            $visitante=intval($partido['visitante']);
            $resultado=$partido['resultado'];
            return new Partido($id,$local,$visitante,$resultado);
        }

        /**
         * La función __toString() es un método mágico que se llama cuando el objeto se usa en un
         * contexto de cadena
         * @return objeto se está convirtiendo en una cadena.
         */
        public function __toString(){
            return json_encode($this->atributos, JSON_UNESCAPED_UNICODE);
        }
    }
?>
