<?php
    require_once("../../Modelo/DAOProducto.php");
    /* Comprobando si el formulario ha sido enviado. */
    if($_POST){
        $id = $_POST['id'];
        $descripcion = $_POST['descripcion'];
        $pcompra = $_POST['pcompra'];
        $pventa = $_POST['pventa'];
        $stock = $_POST['stock'];
        /* Creando un nuevo objeto del producto. */
        $p = new Producto(0, $descripcion, $pcompra, $pventa, $stock);
    }
?>