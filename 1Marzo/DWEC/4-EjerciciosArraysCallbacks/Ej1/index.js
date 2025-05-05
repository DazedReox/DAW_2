function arraySquared(numeros){
    const newMap = new Map();

    for(let i = 0; i < numeros.length; i++){
        newMap.set(i, numeros[i]*2);
    }

    return newMap;
}