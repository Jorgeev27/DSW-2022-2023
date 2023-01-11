/* Agregar un detector de eventos al documento, de modo que cuando el usuario haga clic en el
documento, se llame a la función. */
document.addEventListener("click", (div) => {
    document.cookie = "carta1=" + div.target.name;
    console.log(div.target);
    div.target.src = `img/${div.target.name.replace(/\d+/,"")}/${div.target.name}.png`;
    const mesa = document.getElementById("mesa");
    for(const child of mesa.children){
        console.log(child.childNodes[0]);
    }
})