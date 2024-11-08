const contenedor = document.getElementById("contenedor");

const boton = document.createElement("button"); 
boton = document.addEventListener("click", function() {
    console.log("Has pulsado el boton " + boton.id);
});
    