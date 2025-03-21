const array = ["azul", "amarillo", "rojo", "verde", "café", "rosa"];

const color = prompt("Introduce un colo para comprobar si esta en el array:" );

array.forEach(element => {
    if(element = color){
        console.log("Esta en el array");
    }else{
        console.log("No esta en el array");
    }
});

for (color in array){
    console.log(array[color]);
}