<?php
    require_once("../Modelo/DAOProducto.php");
    require_once("../../../../miSmarty.php");

    //Inicia la sesión
    session_start();

    /* Creando una nueva instancia de la clase `miSmarty` y pasando el parámetro `TiendaInformatica` al constructor. */
    $smarty = new miSmarty("TiendaInformatica");

    /* Comprobando si el usuario está configurado y si lo está, lo verifica en la base de datos y lo redirige a la página de productos. 
    Si no está en la base de datos, muestra un mensaje de error. */
    if (isset($_POST['user'])) {
        if (DAOProducto::comprobarUsuario($_POST['user'], $_POST['password'])) {
            $_SESSION['user'] = $_POST['user'];
            header('Location: ../Controlador/Productos.php');
        } else {
            echo "
            <div class='container'>
                <div class='row justify-content-center mx-auto mt-5'>
                    <div class='col-4'>
                        <div class='alert alert-danger' role='alert'>
                            Nombre de usuario o contraseña incorrectos.
                        </div>
                    </div>
                </div>
            </div>";
        }
    }
    $smarty->display("../Vista/login.tpl");
?>