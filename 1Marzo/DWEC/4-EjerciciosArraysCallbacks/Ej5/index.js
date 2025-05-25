function diferenciaMayorMenor(edad){
    const map = new Map();

    const edadAlta = 0;
    const edadBaja = 0;
    for(let i = 0; i < edad.length; i++){
        map["edad" + i] = edad.age(i);
        if(map.get["edad" + i] > edadAlta){
            edadAlta = map.get["edad" + i];
        }else if(map.get["edad" + i] < edadBaja){
            edadBaja = map.get["edad" + i];
        }
    }

    return console.log("Edad más alta: " + edadAlta + "\nEdad más baja: " + edadBaja);
}