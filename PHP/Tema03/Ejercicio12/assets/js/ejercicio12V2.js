/**
 * Recarga la página, pasando los números de fila y columna como parámetros
 * @param f - el numero de fila
 * @param c - columna
 */
function recarga(f, c){
    document.location="?fila=" + f + "&col=" + c;
}