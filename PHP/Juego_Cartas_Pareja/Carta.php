<?php
    class Carta{
        /* Declarando las variables. */
        private $palo;
        private $numero;
        private $carta;
        private $bocabajo;

        /**
         * La función constructora toma tres parámetros, dos de los cuales son cadenas y uno es un
         * número entero. Asigna los parámetros a las propiedades de la clase.
         * @param string paloCarta - Palo de la carta.
         * @param int numeroCarta - Número de la carta.
         * @param string imgCarta - Imagen de la carta.
         * @param string imgAbajo - Imagen que se mostrará cuando la carta esté boca abajo.
         */
        public function __construct(string $paloCarta, int $numeroCarta, string $imgCarta, string $imgAbajo = "./img/bocaabajo.png"){
            $this->palo = $paloCarta;
            $this->numero = $numeroCarta;
            $this->carta = $imgCarta;
            $this->bocabajo = $imgAbajo;
        }

        /**
         * La función __set() es un método mágico que se llama cuando intenta establecer un valor para
         * una propiedad que no existe.
         * @param string atributo - Nombre del atributo que desea establecer.
         * @param mixed valor - Valor para establecer el atributo.
         */
        public function __set(string $atributo, mixed $valor){
            if($atributo == "id" && $valor < 0){
                throw new InvalidArgumentException("ERROR!!!");
            }
            $this->atributos[$atributo]=$valor;
        }

        /**
         * Devuelve el valor del atributo.
         * @param string atributo - Nombre del atributo que desea obtener.
         * @return valor del atributo.
         */
        public function __get(string $atributo){
            return $this->$atributo;
        }

        /**
         * La función `__toString()` es un método mágico que se llama cuando el objeto se usa en un
         * contexto de cadena.
         * @return El objeto se está convirtiendo a cadena.
         */
        public function __toString(){
            return json_encode($this->atributos, JSON_UNESCAPED_UNICODE);
        }
    }
?>