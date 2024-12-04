document.write("<p>Numero aleatorio entre 0 y 1: " + Math.random() + "</p>");
document.write("<p>Numero aleatorio entre 100 y 200: " + (Math.random()*100)+100 + "</p>");

let numero1 = parseInt(prompt("Introduce un numero"));
let numero2 = parseInt(prompt("Introduce un numero otra vez"));

document.write("<p>El numero aleatorio entre " + numero1 + " y " + numero2 + " es: " + (Math.random()*(numero2-numero1)+numero1) + "</p>");
