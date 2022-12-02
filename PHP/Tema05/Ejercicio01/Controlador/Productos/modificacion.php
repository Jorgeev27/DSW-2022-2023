<?php
    require_once("../../Modelo/DAOProducto.php");
    
    /* Creación de un nuevo objeto de producto con los datos del formulario. */
    $producto = Producto::getProducto($_POST);

    /* Comprobando si el producto fue modificado. */
    if(DAOProducto::modificarProducto($producto)){
        echo '{"resultado": true}';
    }else{
        echo '{"resultado": false}';
    }
?>