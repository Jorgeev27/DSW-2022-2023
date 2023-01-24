<?php
    require_once("../Modelo/DAOProducto.php");
    /* Establece el valor predeterminado de la página en 1. */
    $pag = 1;
    /* Establece el número predeterminado de productos por página en 10. */
    $tamPag = 10;
    /* Si la variable pag está configurada, lo mete en el valor de pag al valor de la variable pag. */
    if(isset($_GET["pag"])){
        $pag = intval($_GET["pag"]);
    }
    /* Si la variable tamPag está configurada, lo mete en el valor de pag al valor de la variable tamPag. */
    if(isset($_GET["tamPag"])){
        $tamPag = intval($_GET["tamPag"]);
    }
    /* Obtiene el número de páginas que tendrá el catálogo. */
    $numPaginas = DAOProducto::numPags($tamPag);

    /* Si el número de página es mayor que el número de páginas, establece el número de página en el número de páginas. */
    if($pag > $numPaginas){
        $pag = $numPaginas;
    }
    /* Obtiene la página de productos y dichos productos de la base de datos. */
    $paginaProductos = DAOProducto::getPaginaProducto($pag, $tamPag);
    /* Obtiene el siguiente número de producto que se agregará a la base de datos. */
    $siguienteNumero = DAOProducto::maxNumProducto() + 1;
    require_once("../Vista/catalogoProductos.php");
?>