<?php
    require_once("../Modelo/DAOProducto.php");
    require_once("../../../miSmarty.php");
    $smarty = new miSmarty("TiendaProductos");
    $pag = 1;
    $tamPag = 10;
    if(isset($_GET["pag"])){
        $pag = intval($_GET["pag"]);
    }
    if(isset($_GET["tamPag"])){
        $tamPag = intval($_GET["tamPag"]);
    }
    $numPaginas = DAOProducto::numPags($tamPag);
    if($pag > $numPaginas){
        $pag = $numPaginas;
    }
    $paginaProductos = DAOProducto::getPaginaProducto($pag, $tamPag);
    $siguienteProducto = DAOProducto::maxNumProducto() + 1;

    $smarty->assign('pag', $pag);
    $smarty->assign('tamPag', $tamPag);
    $smarty->assign('numPaginas', $numPaginas);
    $smarty->assign('paginaProductos', $paginaProductos);
    $smarty->assign('siguienteProducto', $siguienteProducto);
    $smarty->display("../Vista/catalogoProductos.tpl");
?>