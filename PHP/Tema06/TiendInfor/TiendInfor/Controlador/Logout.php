<?php
    /* Eliminación de la variable de sesión. */
    unset($_SESSION['user']);

    //Destruye la sesión
    session_destroy();

    /* Redirige al usuario a la página de inicio de sesión. */
    header('Location: ../Controlador/Login.php');
?>