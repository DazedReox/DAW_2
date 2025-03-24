var nombre = prompt("Introduce tu nombre de usuario: ");

var namePartido = nombre.slice(0, 1);
if (namePartido / 1 == namePartido){
    alert("Tu nombre empieza por un numero: " + namePartido);
}else{
    alert("Tu nombre empieza por letra: " + namePartido);
}
//parseInt("s")==NaN