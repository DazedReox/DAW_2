const array1 = ["pera", "manzana", "naranja", "platano", "sandia"];

const array2 = ["manzana", "sandia", "pera", "melon", "fresa"];

const array3 = [];
for(let i = 0; i <=array1.length; i++){
    for(let j = 0; j <= array1.length; j++){
        if(array1[i] = array2[j]){
            array3.push(array2[j]);
        }
    }
}

console.log(array3);