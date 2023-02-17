<?php
    require_once("../Modelo/DAOProducto.php");
    require_once("../../../../miSmarty.php");

    //Inicia la sesión
    session_start();

    /* Verifica si el usuario ha iniciado sesión y si ha iniciado, verifica si el
    usuario tiene un código de producto. Si lo tiene, obtiene los detalles del producto y los muestra. 
    Si no lo tiene, lo redirige a la página del producto. Y si no ha iniciado sesión, lo redirige a la página de inicio de sesión. */
    if (isset($_SESSION['user'])) {
        if (isset($_GET["cod"])) {
            $codProducto = $_GET["cod"];
            $detallesProducto = DAOProducto::getDetallesProducto($codProducto);
            $smarty = new miSmarty("TiendaInformatica");
            $smarty->assign('codProducto', $codProducto);
            $smarty->assign('detallesProducto', $detallesProducto);
            $smarty->assign('usuario', $_SESSION['user']);
            $smarty->display("../Vista/detalles.tpl");
        } else {
            header("Location: Productos.php");
        }
    } else {
        header('Location: Login.php');
    }
?>