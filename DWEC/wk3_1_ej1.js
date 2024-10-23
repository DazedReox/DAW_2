var numero1 = parseInt(prompt("Introduce un numero"));
var numero2 = parseInt(prompt("Introduce otro numero"));
var numero3 = parseInt(prompt("Introduce un numero ")); 
var numero4 = parseInt(prompt("Introduce un numero "));

function mayor(){
    if(numero1 > numero2 && numero1 > numero3 && numero1 > numero4){
        document.write("<p>El numero mayor es: " + numero1 + "</p>");
    }else if(numer2 > numero1 && numero2 > numero3 && numero2 > numero4){
        document.write("<p>El numero mayor es: " + numero2 + "</p>");
    }else if(numero3 > numero1 && numero3 > numero2 && numero3 > numero4){
        document.write("<p>El numero mayor es: " + numero3 + "</p>");
    }else if(numero4 > numero1 && numero4 > numero2 && numero4 > numero3){
        document.write("<p>El numero mayor es: " + numero4 + "</p>");
    }
}