let hermanos = parseInt(prompt("Introduce el numero de hermanos"));
let cantidad = parseInt(prompt("Introduce la cantidad"));
if(hermanos > 2){
    document.write((cantidad*1.15)-cantidad);
}else if (hermanos < 2){
    document.write((cantidad*1.05)-cantidad);
}else if (hermanos == 0){
    document.write(cantidad);
}