let edad = parseInt(prompt("Introduce tu edad"));
let localidad = prompt("Introduce tu localidad");
if(localidad == "Madrid" && (edad >= 18||edad <= 30)){
    document.write("Puede acceder al canet de empresarios emprededores");
}