const array = [[1,2,3],[4,5,6]];
const mayor = 0;

for(let i = 0; i < array.length; i++){
    if(mayor <= array[i]){
        mayor = array[i];
    }   
}

console.log(array);
console.log("El mayor es: " + mayor);
