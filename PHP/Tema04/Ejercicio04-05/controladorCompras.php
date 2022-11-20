<?php
    declare(strict_types = 1);
    require_once("./Carrito.php");
    session_start();
    require_once("../../config.php");
    require_once("./DAOProductos.php");
    
    /* Comprobando si la variable de sesión 'carrito' está configurada. Si lo es, asigna el valor de la
    variable de sesión a la variable . Si no es así, crea un nuevo objeto Carrito y lo
    asigna a la variable . */
    if(isset($_SESSION['carrito'])){
        $carrito = $_SESSION['carrito'];
    }else{
        $carrito = new Carrito();
    }

    /* Obtener la lista de productos, la lista de productos en el carrito y el costo total del carrito. */
    $listaProductos = getListaProductos();
    $listaProductosCarro = $carrito->getListaProductos();
    $costeTotalCarro = $carrito->getCosteTotal();

    /* Comprobando si la identificación del producto está configurada. Si es así, establecerá el
    producto en nulo. Luego establecerá la identificación del producto en la identificación del
    producto. Luego comprobará si el producto es nulo. Si no es nulo, establecerá la operación en la
    operación. Si la operación es igual a comprar, añadirá el producto al carrito. Si la operación
    es igual a eliminar, eliminará el producto del carrito. */
    
    if(isset($_POST['idProd'])){
        $producto = null;
        $idProd = $_POST['idProd'];
        foreach ($listaProductos as $prod) {
            if($prod->id==$idProd){
                $producto = $prod;
                break;
            }
        }
        if($producto != null){
            $operacion = $_POST['operacion'];
            if($operacion == "comprar"){
                $carrito->anadirProducto($producto);
            }else if($operacion == "eliminar"){
                $carrito->borrarProducto();
            }
        }
    }
    require_once("./vistaCompras.php");
    $_SESSION['carrito'] = $carrito;
?>