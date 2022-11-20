<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 04-05_Jorge Escobar</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <header>
        <h1>La Estilografía</h1>
    </header>
    <main>
        <div id="catalogo">
            <h2>Productos</h2>
            <?php
                require_once("./vistaCatalogo.php");
            ?>
        </div>
        <div id="carro">
            <h2>Carrito</h2>
            <?php
                require_once("./vistaCarrito.php");
            ?>
        </div>
    </main>
    <footer>
        La estrilografía, S.A.<br/>
        Carretera del Precipicio, nº porrazo<br/>
        Telef:123456789
    </footer>
    <script src="./assets/js/producto.js"></script>
</body>
</html>