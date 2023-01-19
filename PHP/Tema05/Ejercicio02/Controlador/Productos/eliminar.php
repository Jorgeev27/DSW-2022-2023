<?php
    require_once("../../Modelo/DAOProducto.php");

    /* Obtener el id del producto que se va a eliminar. */
    $id = $_POST['id'];

    /* Comprueba si el producto fue eliminado y si el número de filas afectadas es 1. */
    $resultado = (DAOProducto::borrarProducto($id) && BaseDAO::getLastAffectedRows() == 1);

    /* Devolver un objeto JSON con el resultado de la operación. */
    echo "{\"resultado\" : $resultado}";
?>