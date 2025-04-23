const numero = prompt("Introduce el numero a buscar: ");

const array = [[1,2,3],[4,5,6]];

for(let i = 0; i < array.length; i++){
    if(numero = array[i]){
        console.log("El numero: " + numero + ", está en la posicion: " + i + ", del array");
    }
}
