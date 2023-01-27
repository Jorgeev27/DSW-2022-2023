<?php
    require_once("../../Modelo/DAOProducto.php");
    /* Comprobando si el formulario ha sido enviado. */
    if($_POST){
        //$id = $_POST['id'];
        $descripcion = $_POST['descripcion'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $imagen = $_POST['imagen'];
        /* Creando un nuevo objeto del producto. */
        $p = new Producto($id, $descripcion, $nombre, $precio, $imagen);
        /* Comprobando si el nombre del producto ya existe. */
        if(DAOProducto::buscarProductoNombre($nombre) == null){
            /* Comprobando si el producto se ha insertado correctamente. */
            if(DAOProducto::insertarProducto($p)){
                echo "<script>alert('El producto se ha insertado correctamente.');</script>";
            }else{
                echo "<script>alert('ERROR!! Al insertar el producto.');</script>";
            }
        }else{
            echo "<script>alert('ERROR!! El nombre del producto ya existe.');</script>";
        }
        echo "<script>document.location='../MantenimientoProductos.php';</script>";
    }
?>