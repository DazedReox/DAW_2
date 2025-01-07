let contador = 0;
let suma = 0;
do{
    let numero = parseInt(prompt("Introduce un numero"));
    contador++;
    suma = suma + numero;
}while(contador != 10);
document.write(suma);