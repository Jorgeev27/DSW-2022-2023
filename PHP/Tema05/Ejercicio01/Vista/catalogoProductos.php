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
    <div id="controlPag">
        <label for="pag">Pág:</label>
        <select onchange="recargarPagina();" id="pag" name="pag">
            <?php
                for($i = 1; $i < $numPaginas; $i++){
                    if($i == $pag){
                        echo "<option selected>$i</option>";
                    }else{
                        echo "<option>$i</option>";
                    }
                }
            ?>
        </select>
        <label for="tampag">Tamaño de la Página:</label>
        <select onchange="recargarPagina();" id="tamPag" name="tamPag" value="<?=$pag;?>">
            <?php
                for($i = 10; $i <= 50; $i += 5){
                    if($i == $tamPag){
                        echo "<option selected>$i</option>";
                    }else{
                        echo "<option>$i</option>";
                    }
                }
            ?>
        </select>
    </div>
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
                    <td><input type='text' size='40' maxlength='512' value='$producto->descripcion'/></td>
                    <td><input type='text' size='40' maxlength='40' readonly='readonly' value='$producto->nombre'/></td>
                    <td><input type='number' size='11' maxlength='11' readonly='readonly' value='$producto->precio' step='0.01'/></td>
                    <td><input type='text' size='40' maxlength='40' readonly='readonly' value='$producto-> imagen'/></td>
                    <td><button type='button' onclick='eliminarProducto(\"$producto->id\");'>Eliminar</button></td>
                    <td><button type='button' onclick='modificarGuardarProducto(\"$producto->id\");'>Modificar</button></td>
                </tr>";
            }
        ?>
        <form action="Productos/insertar.php" method="POST" enctype="multipart/form-data">
        <tr>
            <td>
                <input required name="id" type='text' size='6' maxlength='6' readonly='readonly' value='<?=$siguienteNumero?>;'/>
            </td>
            <td>
                <input required name="descripcion" type='text' size='40' maxlength='512'/>
            </td>
            <td>
                <input required name="nombre" type='text' size='40' maxlength='40'/>
            </td>
            <td>
                <input required name="precio" type='number' size='11' maxlength='11' step='0.01'/>
            </td>
            <td>
                <input required name="imagen" type='text' size='40' maxlength='40'/>
            </td>
            <td>
                <button type='submit'>Nuevo Producto</button>
            </td>
        </tr>
        </form>
    </table>
    <script src="../assets/js/catalogoProductos.js"></script>
</body>
</html>