const miArray = "1, 2, 3, 4, 5, 6".split(", ").map(Number);
var contador = "0";
var posicion = "0";

console.log("Parte 1.1: ");

while (contador <= 6){
    console.log(miArray[posicion]);
    contador++;
    posicion++;
}

console.log("Parte 1.2: ");

for(let i = 0; i <= 6; i++){
    console.log(miArray[i]);
}

console.log("Parte 1.3: ");

miArray.forEach((element) => console.log(element));

console.log("Parte 1.4: ");

const sumados = miArray.map(num => num + 1);

console.log(sumados);

console.log("Parte 1.5: ");

const array2 = [];

miArray.forEach(number => array2.push(number + 1));

console.log(array2);

console.log("Parte 1.6: ");
let contador2 = 0;

for(let i = 0; i < miArray.length; i++){
    contador2 += miArray[i];
}
const media = contador2 / miArray.length;

console.log(media);

