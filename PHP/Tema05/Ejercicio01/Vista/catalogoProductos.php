<?php 
    declare(strict_types = 1); 
    require_once("../Modelo/DAOProducto.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 01_Jorge Escobar</title>
</head>
<body>
    <h1>Catalogo de Productos - Impresa S.A.</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Descripción</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Imagen</th>
        </tr>
    <?php
        /* Creación de una tabla con la información de los productos. */
        
        $paginaProductos = DAOProducto::getPaginaProducto(1);
        foreach($paginaProductos as $producto){
            echo "<tr id='producto_$producto->id'>
                <td><input type='text' size='6' maxlength='6' readonly='readonly' value='$producto->id'/></td>
                <td><input type='text' size='40' maxlength='256' value='$producto->descripcion'/></td>
                <td><input type='text' size='40' maxlength='40' readonly='readonly' value='$producto->nombre'/></td>
                <td><input type='number' size='11' maxlength='11' readonly='readonly' value='$producto->precio' step='0.01'/></td>
                <td><input type='text' size='40' maxlength='40' readonly='readonly' value='$producto-> imagen'/></td>
                <td><button type='button' onclick='eliminarProducto(\"$producto->id\")'>Eliminar</button></td>
                <td><button type='button' onclick='modificarGuardarProducto(\"$producto->id\")'>Modificar</button></td>
            </tr>";
        }
    ?>
    </table>
    <script src="../assets/js/catalogoProductos.js"></script>
</body>
</html>