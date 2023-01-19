<?php
    require_once("../../Modelo/DAOProducto.php");
    /* Creando un nuevo objeto de la clase Producto y llamando al método estático getProducto. */
    $producto = Producto::getProducto($_POST);
    /* Llamando al método estático `modificarProducto` desde la clase `DAOProducto` y pasando el objeto como parámetro. */
    $resultado = DAOProducto::modificarProducto($producto);
    /* Si el resultado es falso, devolverá un código de error 500. */
    if(!$resultado){
        http_response_code(500);
    }
    /* Devuelve el resultado de la operación. */
    echo "{ \"resultado\" : $resultado }";
?>