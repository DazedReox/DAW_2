let numero = parseInt(prompt("Introduce un numero"));
let adivinanza = Math.random()*100;
while(numero != adivinanza){
    if(numero > adivinanza){
        document.write("<p>El numero es mas bajo</p>");
    }else{
        document.write("<p>El numero es mas alto</p>");
    }
    numero = parseInt(prompt("<p>Introduce un numero</p>"));
};
document.write("<p>Has acertado</p>");