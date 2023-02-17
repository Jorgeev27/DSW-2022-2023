<?php
    require_once("../Modelo/DAOProducto.php");
    require_once("../Modelo/Carro.php");
    require_once("../../../../miSmarty.php");

    //Inicia la sesión
    session_start();

    /* Comprobando si el usuario está logueado. Si lo está, desplegará la plantilla
    catalogoProductos.tpl. De lo contrario, lo redirigirá a la página de inicio de sesión. */
    if(isset($_SESSION['user'])){
            /* Creando una nueva instancia de la clase miSmarty. */
        $smarty = new miSmarty("TiendaInformatica");

            //Por defecto, se pone en la página 1.
        $pag = 1;
            //Por defecto, se pone el tamaño de la página en 10 productos.
        $tamPag = 10;
            //Por defecto, se pone la familia seleccionada vacío.
        $familiaSeleccionada = "";

            /* Si la variable pag está configurada. Si es así, lo asigna al valor de la variable pag. */
        if(isset($_GET['pag'])){
            $pag = intval($_GET['pag']);
        }

            /* Si la variable tamPag está configurada. Si es así, lo asigna al valor de la variable tamPag. */
        if(isset($_GET['tamPag'])){
            $tamPag = intval($_GET['tamPag']);
        }

            /* Obtiene el número de páginas en las que se mostrarán los productos. */
        $numPaginas = DAOProducto::numPags($tamPag);

            /* Si el número de página es mayor que el número de páginas. Si es así, establece
            el número de página en el número de páginas. */
        if($pag > $numPaginas){
            $pag = $numPaginas;
        }

            /* Obtiene los productos de la base de datos. */
        $paginaProductos = DAOProducto::getPaginaProducto($pag, $tamPag);
            /* Obtiene el siguiente número de producto. */
        $siguienteProducto = DAOProducto::maxNumProducto() + 1;
            /* Obtiene la lista de familias de la base de datos. */
        $listadoFamilias = DAOProducto::getFamilias();

            /* Obtiene de la base de datos los productos que se encuentran en la familia que se ha seleccionado. */
        if(isset($_GET['familia'])){
            $familiaSeleccionada = $_GET['familia'];
            $paginaProductos = DAOProducto::getProductosPorFamilia($pag, $tamPag, $familiaSeleccionada);
        }

            /* Si la variable de sesión 'carro' está configurada, lo asigna al
            valor de la variable de sesión 'carro'. */
        if(isset($_SESSION['carro'])){
            $carro = $_SESSION['carro'];
                
                /* Si el usuario ha hecho click en el botón para aniadir un producto del carrito, lo añade al carrito. */
            if(isset($_POST['aniadir'])){
                $productoSeleccionado = DAOProducto::buscarProducto($_POST['aniadir']);
                $carro->aniadir($productoSeleccionado);
            }

                /* Si el usuario ha hecho click en el botón para restar un producto del carrito, lo resta del carrito. */
            if(isset($_POST['restar'])){
                $productoSeleccionado = DAOProducto::buscarProducto($_POST['restar']);
                $carro->restar($productoSeleccionado, 1);
            }

                /* Si el usuario ha hecho click en el botón para eliminar un producto del carrito, lo elimina del carrito. */
            if(isset($_POST['eliminar'])){
                $productoSeleccionado = DAOProducto::buscarProducto($_POST['eliminar']);
                $carro->borrar($productoSeleccionado);
            }
        }else{
            $_SESSION['carro'] = new Carro(); //Sino crea un nuevo carro con los productos.
        }

            /* Asignación de las variables a la plantilla. */
        $smarty->assign('pag', $pag);
        $smarty->assign('tamPag', $tamPag);
        $smarty->assign('numPaginas', $numPaginas);
        $smarty->assign('paginaProductos', $paginaProductos);
        $smarty->assign('listadoFamilias', $listadoFamilias);
        $smarty->assign('siguienteProducto', $siguienteProducto);
        $smarty->assign('familiaSeleccionada', $familiaSeleccionada);
        $smarty->assign('carro', $_SESSION['carro']);
        $smarty->assign('usuario', $_SESSION['user']);

        $smarty->display("../Vista/catalogoProductos.tpl");
    }else{
        header("Location: Login.php");
    }
?>