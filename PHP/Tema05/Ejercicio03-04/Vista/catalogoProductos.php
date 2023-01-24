<?php 
    declare(strict_types = 1); 
    require_once("../Modelo/BaseDAO.php");
    require_once("../Modelo/DAOProducto.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 03-04_Jorge Escobar</title>
</head>
<body>
    <h1>Gestisimal</h1>
    <table>
        <tr>
            <th>Codigo</th>
            <th>Descripción</th>
            <th>PCompra</th>
            <th>PVenta</th>
            <th>Stock</th>
        </tr>
        <?php
        ?>
    </table>
    <table>
        <form action="" method="post" enctype="multipart/form-data">
            <tr>
                <th>Codigo</th>
                <th>Descripción</th>
                <th>PCompra</th>
                <th>PVenta</th>
                <th>Stock</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="codigo"/>
                </td>
                <td>
                    <input type="text" name="descripcion"/>
                </td>
                <td>
                    <input type="number" name="pCompra"/>
                </td>
                <td>
                    <input type="number" name="pVenta"/>
                </td>
                <td>
                    <input type="number" name="stock"/>
                </td>
                <td>
                    <button type="submit">Crear</button>
                </td>
            </tr>
        </form>
    </table>
</body>
</html>