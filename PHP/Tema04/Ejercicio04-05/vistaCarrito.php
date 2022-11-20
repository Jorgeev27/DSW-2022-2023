<?php
    foreach ($listaProductosCarro as $prod) {
        $ruta=ROOT_PATH."/img/productos/".$prod->imagen;
        echo "<div class='producto'>
            <p>",$prod->nombre,"</p>
            <img src='$ruta'/><br/>
            <p>Precio: ", $prod->precio,"€<br/>
            <p>Cantidad:",$prod->cantidad," </p>
            <p>Coste Unidades:",$prod->cantidad*$prod->precio," </p>
            <form action='' method='post' enctype?='multipart/form-data'>
                <input type='hidden' id='idProd_$prod->id' name='idProd' value='$prod->id'/>
                <input type='hidden' name='operacion' value='eliminar'/>
                <button type='submit'>Eliminar</button>
            </form>
            </div>
            <hr/>
        ";
    }
?>