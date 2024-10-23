function invierteCadena(cad_arg){
    return cad_arg.split("").reverse().join("");
}
function inviertePalabras(cad_arg){
    return cad_arg.split(" ").reverse().join(" ");
}
function encuetraPalabraMasLarga(cad_arg){
    const palabras = cad_arg.split(" ");
    let max = 0;
    let maxPalabra ="";
    for(let i; i<palabras.length; i++){
        if(palabras[i] > max){
            max = palabras[i];
            maxPalabra = palabras[i];
        }
    }
}

function filtraPalabrasMasLargas(cad_arg, i){
    const palabras = cad_arg.split(" ");
    return palabras > i;
}

function cadenaBienFormada(cad_arg){
    return cad_arg.charAt(0).toUpperCase() + cad_arg.slice(1).toLowerCase();
}
