<?php
    declare(strict_types = 1);
    require_once("../Modelo/Producto.php");

    //Clase Ordenador que hereda las propiedades de la clase Producto.
    class Ordenador extends Producto{
        /**
         * Esta función es un constructor de la clase Ordenador.
         * @param string cod - Código del ordenador.
         * @param string nombre - Nombre del ordenador.
         * @param string | null nombre_corto - Nombre corto del ordenador.
         * @param string descripcion - Descripción del ordenador.
         * @param float | string PVP - Precio del ordenador.
         * @param string familia - Familia del ordenador.
         * @param string procesador - Procesador del ordenador.
         * @param string | int RAM - Cantidad de RAM en GB.
         * @param string disco - Disco duro o SSD.
         * @param string grafica - Tarjeta grafica.
         * @param string unidadOptica - CD/DVD/Blu-Ray.
         * @param string SO - Sistema operativo.
         * @param string otros - Otras características.
         */
        public function __construct(string $cod = null, string $nombre = "", ?string $nombre_corto = "", string $descripcion = "", float | string $PVP = 0, string $familia = "", string $procesador = "", string | int $RAM = 0, string $disco = "", string $grafica = "", string $unidadOptica = "", string $SO = "", string $otros = ""){
            if($cod != null){
                parent::__construct($cod, $nombre, $nombre_corto, $descripcion, $PVP, $familia);
                $this->procesador = $procesador;
                $this->RAM = (int)$RAM;
                $this->disco = $disco;
                $this->grafica = $grafica;
                $this->unidadOptica = $unidadOptica;
                $this->SO = $SO;
                $this->otros = $otros;
            }
        }

        /**
         * Toma una matriz asociativa y devuelve un objeto de la clase.
         * @param array datosOrdenador - Array asociativo con los datos del ordenador.
         * @return Ordenador - Objeto de tipo Ordenador.
         */
        public static function getProdFromAssoc(array $datosOrdenador): Ordenador{
            $p = new Ordenador();
            foreach($datosOrdenador as $atributo=>$valor){
                $p->$atributo = $valor;
            }
            return $p;
        }

        /**
         * Toma un objeto stdClass y devuelve un objeto Ordenador
         * @param stdClass p - Objeto a convertir.
         * @return Ordenador - Objeto de tipo Ordenador.
         */
        public static function getProdFromStd(stdClass $p): Ordenador{
            $o = new Ordenador();
            foreach($p as $atributo=>$valor){
                $o->$atributo = $valor;
            }
            return $o;
        }
    }
?>