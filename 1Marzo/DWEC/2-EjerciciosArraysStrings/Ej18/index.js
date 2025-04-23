const array = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];

const array2 = [[],[],[]];

for(let i = 0; i < array.length; i++){
    for(let j = 0; j < array.length; j++){
        array2[[i][j]].push(array[i][j]);
    }
}

console.log(array2);