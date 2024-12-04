let numero = parseInt(prompt("Introduce el numero"));
if(numero > 100){
    let numero = numero - numero*0.15;
    document.write("El nuevo precio es: " + numero);
}