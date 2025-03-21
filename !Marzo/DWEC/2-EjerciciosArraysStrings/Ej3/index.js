var numero = prompt("Introduce el numero de aleatorios a generar");

const array = [];

for(let i = 0; i < numero; i++){
    array.push(Math.random()*100);
}