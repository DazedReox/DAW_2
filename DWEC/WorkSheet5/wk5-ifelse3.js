let edad = parseInt(prompt("Introduce tu edad"));
if(edad <= 5){
    document.write("Debes de estar en el jardin de infancia");
}else if(edad > 5 && edad <= 11){
    document.write("Debes de estar en primaria");
}else if(edad > 11 && edad <= 16){
    document.write("Debes de estar en la ESO");
}else if(edad > 16 && edad <= 21){
    document.write("Debes de estar en Bachillerato");
}else if(edad > 21){
    document.write("Debes de estar en la universidad");
}