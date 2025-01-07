var numero = parseInt(prompt("Introduce un numero"));
function intervalo(){
    document.write(numero);
    numero++;
}
setInterval(intervalo, 1000);