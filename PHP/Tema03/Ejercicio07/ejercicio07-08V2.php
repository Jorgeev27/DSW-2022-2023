<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="en">
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
    <?php
        /**
         * Función que convierte las lineas del texto CSV a td
         */

        function lineaCsvToTr(string $linea, string $tipoCelda="td", string $separador=";"): string{
            $res="";
            $campos = explode($separador, $linea);
            $res.="<tr>\n";
            foreach($campos as $campo){
                $res.="<$tipoCelda>.$campo.</$tipoCelda>";
            }
            $res.="</tr>\n";
            return $res;
        }

        if(isset($_POST['btnficheroCsv'])){ //Si hay POST del fichero de CSV
            $fichero = $_FILES['ficheroCsv']['tmp_name']; //Cogemos el fichero
            $fDCsv = fopen($fichero['tmp_name'], "r"); //Abrimos el fichero que esta en "/tmp", en modo lectura
            $linea = ""; //Variable linea
            echo "<table>\n"; //Abrir tabla
            echo lineaCsvToTr(fgets($fDCsv)), "th";
            while($linea = fgets($fDCsv)){ //Si no lee nada del fichero
                echo lineaCsvToTr($linea);
            }
            echo "</table>\n";
        }else if(isset($_POST['btntextoCsv'])){ //Si hay POST del texto de CSV
            $contenidoCsv = $_POST['txtCsv']; //Contenido del fichero en el POST
            $lineas = explode("\n", $contenidoCsv); //Separa con un salto de linea
            echo "<table>\n"; //Abrir tabla
            echo "<thead>\n";
            lineaCsvToTr($lineas[0], "th");
            echo "</thead>\n";
            echo "<tbody>\n";
            for($i = 1; $i < count($lineas); $i++){
                lineaCsvToTr($lineas[$i]);
            }
            echo "</tbody>\n";
            echo "</table>\n";
        }else if(isset($_POST['btnSubirImagen'])){ //Si hay POST de la imagen
            $ficheroImg = $_FILES["fImagen"]["tmp_name"]; //La ruta de la imagen
            $imgBase64 = base64_encode(file_get_contents($ficheroImg)); //Base 64 de la imagen
            echo "<img src='data:",$FILES['fImagen']['type'],";base64,",$imgBase64,"'/>\n";
        }else{
    ?>
    <table>
        <tr>
            <td>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="ficheroCsv">FicheroCsv: </label>
                <input type="file" name="ficheroCsv"/><br/>
                <button type="submit" name="btnficheroCsv">Enviar Fichero</button>
            </form>
            </td>
        </tr>
        <tr>
            <td>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="txtCsv">TextoCsv: </label>
                    <textarea name="txtCsv" cols="80" rows="20"></textarea><br/>
                    <button type="submit" name="btntextoCsv">Enviar Texto</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="fImagen">Fichero de imagen a subir: </label>
                    <input type="file" name="fImagen"accept="image/*"/>
                    <button type="submit" name="btnSubirImagen">Enviar Imagen</button>
                </form>
            </td>
        </tr>
    </table>
    <?php
        }
    ?>
</body>
</html>