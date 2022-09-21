<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <form action="sumaMedia.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="numero1">Inserte el primer número</label></td>
                <td><input type="number" name="numero1" id="numero1"></td>
            </tr>
            <tr>
                <td><label for="numero2">Inserte el segundo número</label></td>
                <td><input type="number" name="numero2" id="numero2"></td>
            </tr>
        </table>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
