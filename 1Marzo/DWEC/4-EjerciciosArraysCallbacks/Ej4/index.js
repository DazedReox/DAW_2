function iniciales(nombre, apellido){
    const mapa = new Map();
    mapa["Nombre"] = nombre;
    mapa["Apellido"] = apellido;

    const inNombre = slice(mapa.get("Nombre"), 1);
    const inApellido = slice(mapa.get("Apellido"), 1);

    return console.log(inNombre, inApellido);
}