function chequearDatos(){
    const pass = document.forms['formAlta'].pass.value;
    const pass2 = document.forms['formAlta'].pass2.value;
    //const pass = document.getElementById('pass');
    //const pass2 = document.getElementById('pass');
    if(pass != pass2){
        alert("No coinciden");
        return false;
    }else{
        return true;
    }
}