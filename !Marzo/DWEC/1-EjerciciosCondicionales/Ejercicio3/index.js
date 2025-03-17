var numero = prompt("Introduce un numero");

if(numero % 11 == 0){
    console.log("El numero es divisible por 11");
}else if (numero % 5 == 0){
    console.log("El numero es divisible por 5");
}else{
    console.log("El numero no es divisible ni por 11 ni por 5");
}
