<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 07_Jorge Escobar</title>
</head>
<style>
    body {
        font-family: Arial;
    }

    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    .tab button:hover {
        background-color: #ddd;
    }

    .tab button.active {
        background-color: #ccc;
    }

    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }
</style>
<script>
    function ficheroCsv(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
    }
</script>
<body>
    <div class="tab">
        <button class="tablinks" onclick="ficheroCsv(event, 'Fichero')">Fichero</button>
        <button class="tablinks" onclick="ficheroCsv(event, 'csv')">csv</button>
    </div>

    <div id="Fichero" class="tabcontent">
        <?php
        /**
         * Funcion que genera la tabla
         */
            function generaTabla($lineaCsv,$separador=";"){
                echo "<table>\n"; //Creamos tabla
                $separador = preg_split("/;/", $lineaCsv); //Variable separador que lo separa por ";"
                echo "<tr>\n";
                for($i = 0; $i < $separador; $i++){
                    echo "<td>\n";
                    echo "$separador\n";
                    echo "</td>\n";
                }
                echo "<tr>\n";
                echo "</table>\n";
            }
            if($_POST || $_FILES){ //Si los datos o el fichero se están enviando por POST
                $fichero = $_FILES['fichero']; //Nombre del fichero
                $destination = "/var/www/phpdata/".$fichero['name']; //Ruta para mover el fichero
                if(file_exists($destination)){ //Si existe el fichero en esa ruta
                    echo "El fichero: ".$fichero['name'].", ya existe"; //Mensaje de: Ya existe
                }else{
                    move_uploaded_file($fichero['name'], $destination); //Mueve el fichero hacia la ruta correspondiente
                }
            }else{
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="myfile">Subir fichero:</label>
                    <input type="file" id="file" name="file" multiple="multiple"/><br/>
                    <button type="submit">Enviar</button>
                </form>
                <?php
                }
                ?>
    </div>
    <div id="csv" class="tabcontent">
        <form action="" method="post" enctype="multipart/form-data">
            <textarea name="csv">Pega tu contenido CSV:</textarea>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>