<?php
    declare(strict_types = 1);

    class Persona2{
        /* Declarar las variables de la clase Persona */
        private $nombre = "";
        private $edad = 0;

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
         * Se llama al método __toString() cuando el objeto se usa en un contexto de cadena
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
    }

    $p1 = new Persona2("Pepe", 33);
    $p2 = clone($p1);
    $p1s = serialize($p1);
    echo $p1s;
?>