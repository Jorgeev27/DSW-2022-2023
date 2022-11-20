<?php
    require_once("./Producto.php");
    /**
     * Función que obtiene todos los productos.
     */
    function getListaProductos(){
        /* Creación de un array del objeto Producto. */
        return [
            new Producto(1, "Pelikan Souveran M-1000", 545, "Pelikan Souveran M-1000", "../../img/productos/pelikan.png", 0),
            new Producto(2, "Parker Duofold", 406, "Parker Duofold", "../../img/productos/parker.png", 0),
            new Producto(3, "Visconti Van Gogh", 180, "Visconti Van Gogh", "../../img/productos/visconti.png", 0)
        ];
    }
?>