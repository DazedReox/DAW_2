var numero1 = prompt("Introduce un primer numero");
var numero2 = prompt("Introduce un segundo numero");

if (numero1 > numero2){
    alert("El numero mas grande es: " + numero1);
}else if(numero2 > numero1){
    alert("El numero mayor es: " + numero2);
}else{
    alert("El numero 1 (" + numero1 + ") y el numero 2 (" + numero2 + ") son iguales");
}