function validarMayuscula(texto){
    const mayuscula = /[A-Z]/;
    return mayuscula.test(texto);
}
function validarCaracteresEspeciales(){
    const caraterEspecial = /[!@#$%^&]/;
    return caraterEspecial.test(texto);
}

function validarCorreo(){
    const correo = /^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,10}$/;
    return correo.test(texto);
}

function validarTarjetaCredito(){
    const tarjeta = /^(?:\d{4}[-\s]?){3}\d{4}|\d{16,19}$/;
    return tarjeta.test(texto);
}

function validarLonguitud(){
    const long = /^.{8,}$/;
    return long.test(texto);
}

function validarNumero(){
    const num = /\d/;
    return num.test(texto);
}