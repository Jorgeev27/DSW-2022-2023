<?php
    require_once("../../Modelo/DAOProducto.php");

    /* Obtener el id del producto que se va a eliminar. */
    $id = $_POST['id'];

    $resultado = (DAOProducto::borrarProducto($id) && BaseDAO::getLastAffectedRows() == 1);

    echo "{\"resultado\" : $resultado}";
?>