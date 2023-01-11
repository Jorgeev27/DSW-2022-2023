<?php
    require_once("../../Modelo/DAOProducto.php");
    $producto = Producto::getProducto($_POST);
    $resultado = DAOProducto::modificarProducto($producto);
    if(!$resultado){
        http_response_code(500);
    }
    echo "{ \"resultado\" : $resultado }";
?>