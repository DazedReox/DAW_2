function calcularMedia(numeros){
    const initialValue = 0;
    const sumWithInitial = numeros.reduce(
        (accumulator, currentValue) => accumulator + currentValue, initialValue,
    );
    return sumWithInitial/numeros.length;
}