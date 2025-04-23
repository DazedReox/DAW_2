const array = [[1,2,3],[4,5,6]];

const suma = 0;

for(let i = 0; i < array.length; i++){
    for(let j = 0; j < array.length; j++){
        if(i == j){
            suma = array[[i][j]];
        }
    }
}

console.log(suma);