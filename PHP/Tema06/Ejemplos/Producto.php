<?php
    class Producto{
        static $porcentMargen = 10;
        //private $codigo;
        //private $descripcion;
        //private $pcompra;
        //private $pventa;
        //private $stock;

        /* Un array de los atributos de la clase Producto. */
        private $atributos = ['codigo' => '', 'descripcion' => '', 'pcompra' => 0, 'pventa' => 0, 'stock' => 0];

        /**
         * Esta función es un constructor de la clase Producto.
         * Si el código está nulo, toma las 5 variables de la clase.
         * @param int codigo - El código del producto.
         * @param string descripcion - La descripción del producto.
         * @param float pcompra - El precio de compra.
         * @param float pventa El precio de venta.
         * @param int stock - El stock del producto.
         */
        function __construct($codigo = null, $descripcion = '', $pcompra = 0, $pventa = 0, $stock = 0){
            if($codigo != null){
                $this->codigo = $codigo;
                $this->descripcion = $descripcion;
                $this->pcompra = $pcompra;
                $this->pventa = $pventa;
                $this->stock = $stock;
            }
        }

        /**
         * Devuelve la diferencia entre el precio de venta y el precio de compra
         * @return Diferencia entre la pventa y la pcompra.
         */
        function getMargen() {
            return $this->pventa - $this->pcompra;
        }

        /**
         * La función __toString() es un método mágico que devuelve una representación de cadena del objeto.
         * @return Representación de cadena del objeto.
         */
        function __toString() {
            return "('$this->codigo','$this->descripcion',$this->pcompra,$this->pventa,$this->stock)";
        }

        /**
         * Si el atributo es `pcompra` y el valor es mayor o igual que `pventa`, establezca `pventa` en
         * el valor multiplicado por el `porcentMargen` dividido por 100.
         * 
         * Si el atributo es `codigo` y el valor no está vacío y el primer carácter no es una letra,
         * lanza una excepción.

         * De lo contrario, establezca el atributo en el valor.
         * @param atributo - El nombre del atributo que desea establecer.
         * @param valor a establecer.
         */
        function __set($atributo, $valor) {
            if ($atributo == 'pcompra' && $valor>=$this->pventa) {
                $this->atributos['pventa'] = $valor * (1 + Producto::$porcentMargen / 100);
            }elseif($atributo == 'codigo' && $valor != "" && !ctype_alpha($valor[0])){
                throw new Exception("Error el código debe empezar por una letra");
            }
            $this->atributos[$atributo] = $valor;
        }

        /**
         * Si el atributo es 'margen', devuelve el valor de la función getMargen(), de lo contrario,
         * devuelve el valor del atributo.
         * @param atributo - El nombre del atributo que desea obtener.
         * @return Valor del atributo.
         */
        function __get($atributo){
            if($atributo == 'margen'){
                return $this->getMargen();
            }else{
                return $this->atributos[$atributo];
            }
        }

        /**
         * Crea un nuevo objeto y copia los atributos del objeto actual en el nuevo objeto.
         * @return Nueva instancia de la clase Producto.
         */
        function clone(){
            $p = new Producto();
            $p->atributos = array_merge($this->atributos, []);
            //$p->atributos = $this->atributos;
            return $p;
        }

        /**
         * Crea un nuevo objeto y copia los valores de los atributos del objeto actual al nuevo objeto.
         * @return Nuevo objeto con los mismos atributos que el objeto original.
         */
        function clone2(){
            $p = new Producto();
            foreach($this->atributos as $atributo=>$valor){
                $p->atributos[$atributo] = $valor;
            }
            return $p;
        }
    }

/*
    $prod=new Producto('h020','Barra acero 16mm. longitud 6m.',35.30,45.40,50);
    echo $prod->getMargen(),"\n";
    echo "$prod\n";
    $prod->codigo='h025';
    echo "$prod\n";
    $prod->pcompra=47.25;
    echo "$prod\n";
    echo "Margen: $prod->margen. \n";
    try {
        $prod->codigo='1235';
    } catch (Exception $ex) {
        echo "Se ha producido una excepción: ",$ex->getMessage(),"\n";
    }
*/

?>