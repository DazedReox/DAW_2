const con1 = prompt("Introduce un conjunto de numeros separados por comas: ");
const con2 = prompt("Introduce otro conjunto de numeros separados por comas: ");

const array1 = [];
const array2 = [];

array1.push(con1.split(", "));
array2.push(con2.split(", "));

if(array1.length == array2.length){
    console.log("Los dos conjuntos tienen la misma cantidad de numeros.");
}else{
    console.log("Los conjuntos de numeros tiene cantidades diferentes de numeros.");
}