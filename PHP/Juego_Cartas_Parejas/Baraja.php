<?php
    require_once("./Carta.php");

    class Baraja{
        /* Creando un array con los palos de las cartas. */
        private $palos =  ["bastos", "copas", "espadas", "oros"];
        /* Creando un array con los números de las cartas. */
        private $numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        /* Creando un array de la baraja vacía. */
        private $baraja = [];

        /**
         * Esta función crea una nueva baraja de cartas.
         * @param array baraja Esta es el array que contendrá las cartas.
         */
        public function __construct(array $baraja = []){
            $this->baraja = $baraja;
        }

        /**
         * Crea una baraja de cartas con el número de pares de cartas especificado por el usuario.
         * @param int numParejas número de pares de cartas a crear.
         */
        public function crearBaraja(int $numParejas){
            if($numParejas <= 48){
                for($i = 0; $i < $numParejas; $i++){
                    $paloCarta = $this->palos[random_int(0, 3)];
                    $numCarta = $this->numeros[random_int(0, 11)];
                    $imgCarta = "$paloCarta$numCarta.png";
                    $carta = new Carta($paloCarta, $numCarta, $imgCarta);
                    if(!in_array($carta, $this->baraja)){
                        array_push($this->baraja, $carta, $carta);
                    }else{
                        $i--;
                    }
                }
                shuffle($this->baraja);
            }else{
                echo "El número de parejas debe ser menor a 48";
            }
        }

        /**
         * Crea una mesa con las cartas de la baraja.
         */
        public function crearMesa(){
            $mesa = [];
            if(count($this->baraja) > 0){
                foreach($this->baraja as $carta){
                    $name = $carta->palo . $carta->numero;
                    array_push($mesa, "<div><button><img src='$carta->bocabajo' name='$name'></button></div>");
                    echo "<div><button><img src='$carta->bocabajo' name='$name'></button></div>";
                }
            }
        }
    }