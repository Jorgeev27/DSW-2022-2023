<?php
    declare(strict_types = 1);

    abstract class Automovil{
        private $modelo;
        private $marca;
        private $cilindrada;
        private $numRuedas;

        public function __construct(string $modelo, string $marca, int $cilindrada, int $numRuedas){
            $this->modelo = $modelo;
            $this->marca = $marca;
            $this->cilindrada = $cilindrada;
            $this->numRuedas = $numRuedas;
        }

        public function getModelo(){
            return $this->modelo;
        }

        public function getMarca(){
            return $this->marca;
        }

        public function getCilindrada(){
            return $this->cilindrada;
        }

        public function getNumRuedas(){
            return $this->numRuedas; 
        }

        public abstract function __toString(): string;
    }

    class Coche extends Automovil{
        public function __construct(string $modelo, string $marca, int $cilindrada){
            parent::__construct($modelo, $marca, $cilindrada, 4);
        }
        public function __toString(): string{
            return "[Coche, $this->marca, $this->modelo, $this->cilindrada]";
        }
    }

    class Moto extends Automovil{
        public function __construct(string $modelo, string $marca, int $cilindrada){
            parent::__construct($modelo, $marca, $cilindrada, 4);
        }
        public function __toString(): string{
            return "[Moto, $this->marca, $this->modelo, $this->cilindrada]";
        }
    }

/*
    interface Automovil {
    public function getModelo();
    public function getMarca();
    public function getCilindrada();
    public function getNumRuedas();
    public function __toString();
    }
    class Coche implements Automovil {
    private $modelo, $marca, $cilindrada, $numRuedas;
    public function __construct($modelo,$marca,$cilindrada) {
    $this->modelo=$modelo; $this->marca=$marca; $this->cilindrada=$cilindrada; $this->numRuedas=4;
    }
    public function __get($atributo) {
    return $this->$atributo;
    }
    public function getModelo() { return $this->modelo; }
    public function getMarca() { return $this->marca; }
    public function getCilindrada() { return $this->cilindrada; }
    public function getNumRuedas() { return $this->numRuedas; }
    public function __toString() { return "[Coche, $this->marca, $this->modelo, $this->cilindrada]"; }
    }
    class Moto implements Automovil {
    private $modelo, $marca, $cilindrada, $numRuedas;
    public function __construct($modelo,$marca,$cilindrada) {
    $this->modelo=$modelo; $this->marca=$marca; $this->cilindrada=$cilindrada; $this->numRuedas=2;
    }
    public function __get($atributo) {
    return $this->$atributo;
    }
    public function getModelo() { return $this->modelo; }
    public function getMarca() { return $this->marca; }
    public function getCilindrada() { return $this->cilindrada; }
    public function getNumRuedas() { return $this->numRuedas; }
    public function __toString() { return "[Moto, $this->marca, $this->modelo, $this->cilindrada]"; }
    }
    $moto=new Moto('Ténéré','Yamaha',1000);
    $coche=new Coche('Focus','Ford',1500);
    echo $moto,"\n";
    echo $coche,"\n";
*/

?>