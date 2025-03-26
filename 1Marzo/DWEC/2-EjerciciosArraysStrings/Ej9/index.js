const con1 = prompt("Introduce un conjunto de numeros separados por comas: ");
const con2 = prompt("Introduce otro conjunto de numeros separados por comas: ");

const array1 = [];
const array2 = [];

array1.push(con1.split(", "));
array2.push(con2.split(", "));

const array3 = [];

if(array1.length == array2.length){
    for(let i = 0; i <= array1.length; i++){
        array3.push(array1[i] + array2[i]);
    }
}else{
    console.log("No tiene la misma cantidad de numeros.");
}

console.log(array3);