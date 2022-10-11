<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 08_Jorge Escobar</title>
</head>
<body>
<?php
    if($_POST || $_FILES){ //Si los datos se están enviando por POST o se está enviando la imagen
        $fichero = $_FILES['fichero']; //Nombre de la imagen
        $destination = "/var/www/phpdata/".$fichero['name']; //Ruta para mover la imagen
        if(file_exists($destination)){ //Si existe la imagen
            echo "El fichero: ".$fichero['name'].", ya existe"; //Mensaje de: Ya existe
        }else{
            move_uploaded_file($fichero['name'], $destination); //Mueve el fichero de la imagen hacia la ruta correspondiente
            $archivoCode = base64_encode($fichero); //Base 64 de la imagen
            echo $archivoCode; //Muestra el archivo en Base 64
        }
    }else{
    ?>
    <form action="" method="post" enctype=multipart/form-data>
        <label for="">Fichero</label>
        <input type="file" name="fichero" id="fichero"><br/>
        <button type="submit">Enviar</button>
    </form>
    <?php
    }
    ?>
</body>
</html>