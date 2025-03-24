var añoDado = prompt("Introduce un año para saber si es bisiesto: ");

if(añoDado % 4 == 0){
    if(añoDado % 100 == 0 && añoDado % 400 == 0){
        alert("El año es bisiesto: " + añoDado);
    }else{
        alert("El año no es bisiesto: " + añoDado);
    }
}