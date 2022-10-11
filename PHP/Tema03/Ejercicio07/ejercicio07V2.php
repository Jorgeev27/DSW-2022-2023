<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 07_Jorge Escobar</title>
</head>
<body>
    <?php
        if(isset($_POST['btnficheroCsv'])){ //Si hay POST del fichero de CSV
            $fd = fopen($_FILES['ficheroCsv']['tmp_name'], "r"); //Abrimos el fichero que esta en "/tmp", en modo lectura
            while($linea = fgets($fd)!= ""){
                
            }
        }else if(isset($_POST['btntextoCsv'])){ //Si hay POST del texto de CSV

        }else{
    ?>
    <table>
        <tr>
            <td>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="ficheroCsv">FicheroCsv</label>
                <input type="file" name="ficheroCsv"/><br/>
                <button type="submit" name="btnficheroCsv">Enviar Fichero</button>
            </form>
            </td>
        </tr>
        <tr>
            <td>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="txtCsv">TextoCsv</label>
                    <textarea name="txtCsv" cols="80" rows="20"></textarea><br/>
                    <button type="submit" name="btntextoCsv">Enviar Texto</button>
                </form>
            </td>
        </tr>
    </table>
    <?php
        }
    ?>
</body>
</html>