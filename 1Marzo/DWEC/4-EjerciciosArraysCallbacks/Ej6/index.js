function igualesMayoresCinco(array1){
    
    const array = [];

    for(let i = 0; i < array1.lenght; i++){
        if(array1[i] = 5 || array1[i] > 5){
            array = array[i].push;
        }
    }
    
    return array;
}

function soloPares(array1){
    const array = [];

    for(let i = 0; i < array1.lenght; i++){
        if(array1[i] % 2 == 0){
            array = array[i].push;
        }
    }

    return array;
}

const arrayNumeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14 ,15, 16];

console.log(arrayNumeros.filter(igualesMayoresCinco));
console.log(arrayNumeros.filter(soloPares)); 