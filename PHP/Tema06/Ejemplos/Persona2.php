<?php
    declare(strict_types = 1);

    class Persona2{
        /* Declarar las variables de la clase Persona */
        public $nombre = "";
        public $edad = 0;

        /**
         * La función __construct() es una función especial que se llama automáticamente cuando se crea un objeto.
         * @param string nombre - El nombre de la persona.
         * @param int edad - Edad de la persona.
         */
        function __construct(string $nombre, int $edad){
            $this->nombre = $nombre;
            $this->edad = $edad;
        }

        /**
         * La función __toString() es un método mágico que devuelve una representación de cadena del objeto.
         * @return Representación de cadena del objeto.
         */
        public function __toString(){
            return "($this->nombre, $this->edad)";
        }

        /**
         * Crea un nuevo objeto con los mismos valores que el objeto original.
         * @return Nueva instancia de la clase.
         */
        public function __clone(){
            return new Persona2($this->nombre, $this->edad);
        }

        /**
         * Devuelve el valor del atributo.
         * @param atributo - El nombre del atributo que desea obtener.
         * @return Valor del atributo.
         */
        public function __get($atributo){
            return $this->$atributo;
        }
    }

    $p1 = new Persona2("Pepe", 33);
    $p2 = clone($p1);
    $p1s = serialize($p1);
    echo $p1s;
?>