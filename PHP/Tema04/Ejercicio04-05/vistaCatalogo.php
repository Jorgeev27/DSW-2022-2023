<script>
    /**
     * Muestra u oculta los detalles de un producto.
     */
    function mostrarOcultarDetalle(idProd){
        let btnDetalle=document.getElementById("btn_"+idProd); 
        let capaDetalle=document.getElementById("prod_"+idProd);
        if(btnDetalle.textContent=='Detalle'){
            btnDetalle.textContent='Ocultar';
            capaDetalle.classList.remove('oculto');
        }else{
            btnDetalle.textContent='Detalle';
            capaDetalle.classList.add('oculto');
        }
    }
</script>
<style>
    .oculto{
        display: none;
    }
</style>
<?php
    require_once("./Carrito.php");
    foreach($listaProductos as $prod){
        $ruta=ROOT_PATH."/img/productos/".$prod->imagen;
        echo "<div class='producto'>",
            $prod->nombre,"<br/>
            <img src='$ruta'/><br/>
            Precio: ", $prod->precio,"€<br/>
            <div class='oculto' id='prod_$prod->id'>
                $prod->descripcion
            </div>
            <form action='' method='post' enctype?='multipart/form-data'>
                <input type='hidden' id='idProd_$prod->id' name='idProd' value='$prod->id'/>
                <input type='hidden' name='operacion' value='comprar'/>
                <button type='submit'>Comprar</button>
                <button onclick='mostrarOcultarDetalle($prod->id)' id='btn_$prod->id' type='button'>Detalle</button>
            </form>
            </div>
            <hr/>
        ";
    }
?>