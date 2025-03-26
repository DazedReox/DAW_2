const array1 = [1,2,3];
const array2 = [1,2,4];
const array3 = [];

for(let i = 0; i <= array1.length+array2.length; i++){
    array3.push(array1[i]);
    array3.push(array2[i]);
}

console.log(array3);