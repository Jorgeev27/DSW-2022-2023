<?php
    declare(strict_types = 1);
    require_once("./Baraja.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jorge Escobar_DSW_ Juego Cartas Pareja</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nParejas">Nº Parejas:</label><br/>
        <input type="text" name="numParejas" id="nParejas"/>
        <button type="submit">Enviar</button>
    </form>
    <div id="mesa" style="display: block !important;">
        <?php
            /* Comprobando si el formulario ha sido enviado y si es así, crea una nueva instancia de la
            clase Baraja y llama a los métodos Baraja y crearMesa. */
            if(isset($_POST["numParejas"])){
                $nParejas = intval($_POST["numParejas"]);
                $baraja = new Baraja();
                $baraja->crearBaraja($nParejas);
                $baraja->crearMesa();
            }
            /* Comprobando si la cookie carta1 está puesta y si lo está, la imprime. */
            if(isset($_POST[$_COOKIE['carta1']])){
                echo $_COOKIE['carta1'];
            }
        ?>
    </div>
    <script src="assets/js/index.js"></script>
</body>
</html>