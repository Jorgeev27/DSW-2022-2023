<?php
    require_once("../../Modelo/DAOProducto.php");

    /* Creando un nuevo objeto de la clase Producto y llamando al método estático getProducto. */
    $producto = Producto::getProducto($_POST);

    /* Comprobando si el producto fue modificado. */
    if(DAOProducto::modificarProducto($producto)){
        echo '{"resultado": true}';
    }else{
        echo '{"resultado": false}';
    }
?>