const array = [[1,2,3],[4,5,6]];

const array2 = [[],[]];

const multi = prompt("Introduce el numero por el que multiplicar el array: ");

for(let i = 0; i < array.length; i++){
    for(let j = 0; j< array.length; j++){
        array2.push(array[i][j]*multi);
    }
}

console.log(array2);