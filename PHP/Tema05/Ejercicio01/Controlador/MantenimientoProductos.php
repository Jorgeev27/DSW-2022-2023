<?php
    require_once("../Modelo/DAOProducto.php");
    $pag = 1;
    $tamPag = 10;
    if(isset($_GET['pag'])){
        $pag = intval($_GET['pag']);
    }
    if(isset($_GET['tamPag'])){
        $tamPag = intval($_GET['tamPag']);
    }
    $numPaginas = DAOProducto::numPags($tamPag);
    if($pag > $numPaginas){
        $pag = $numPaginas;
    }
    $paginaProductos = DAOProducto::getPaginaProducto($pag, $tamPag);
    $siguienteNumero = DAOProducto:: maxNumProducto() + 1;
    require_once("../Vista/catalogoProductos.php");
?>