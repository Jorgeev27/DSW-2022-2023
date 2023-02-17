/**
 * Recarga la página actual, pero con el número de página y el tamaño de página especificado por el
 * usuario
 */
function recargarPagina() {
    var pag = document.querySelector("#pag").value;
    var tamPag = document.querySelector("#tamPag").value;
    document.location="?pag="+pag+"&tamPag="+tamPag;
}

/**
 * Obtiene el valor del elemento de selección con el id "familia" y redirige el navegador a la misma
 * página con el valor del elemento de selección adjunto a la URL
 */
function filtrarFamilia() {
    var seleccion = document.getElementById("familia").value;
    document.location="?familia="+seleccion;
}