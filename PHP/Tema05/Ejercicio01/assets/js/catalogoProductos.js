/**
 * Cambia el texto del botón, hace que los campos de texto sean editables y cuando se vuelve a
 * presionar el botón, envía los datos al servidor.
 * @param idProd - El id del producto a modificar.
 */
function ponerFilaEditable(idProd){
    let tr = document.getElementById("producto_" + idProd);
    let btn = tr.cells[tr.cells.length - 1].firstChild;
    if(btn.textContent == "Modificar"){
        btn.textContent = "Guardar";
        for(let i = 1; i < tr.cells.length - 2; i++){
            tr.cells[i].firstChild.readOnly = false;
            tr.cells[i].firstChild.style.backgroundColor = "lightblue";
        }
    }else{
        let form = document.createElement("form");
        const nombreCampos = ['id', 'descripcion', 'nombre', 'precio', 'imagen'];
        form.setAttribute("action", "../../Controlador/Productos/modificacion.php");
        form.setAttribute("method", "post");
        form.setAttribute("enctype", "multipart/form-data");
        for(let i = 1; i < tr.cells.length - 2; i++){
            let valor = tr.cells[i].firstChild.value;
            let input = document.createElement("input");
            input.setAttribute("name", nombreCampos[i]);
            input.setAttribute("value", valor);
            form.appendChild(input);
            tr.cells[i].firstChild.readOnly = true;
            tr.cells[i].firstChild.style.backgroundColor = "white";
        }
        btn.textContent = "Modificar";
        fetch(form.action, {body: new FormData(form), method: post})
            .then(respuesta => respuesta.text())
            .then(respTxt =>{
                try{
                    let resultado = JSON.parse(respTxt).resultado;
                }catch(e){
                    console.log("ERROR!! en la cadena JSON: " + respTxt);
                }
                if(resultado == true){
                    alert("Datos modificados correctamente");
                }else{
                    alert("ERROR!! Al actualizar los datos");
                }
            })
    }
}