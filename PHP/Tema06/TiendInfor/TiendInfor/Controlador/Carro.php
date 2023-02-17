<?php
    require_once("../Modelo/DAOProducto.php");
    require_once("../../../miSmarty.php");

    //Inicia la sesión
    session_start();

    /* Creando una nueva instancia de la clase miSmarty, asignando un valor a la variable hola y desplegando el archivo carro.tpl */
    $smarty = new miSmarty("TiendaInformatica");
    $smarty->assign('hola', $hola);
    $smarty->display("../Vista/carro.tpl");
?>