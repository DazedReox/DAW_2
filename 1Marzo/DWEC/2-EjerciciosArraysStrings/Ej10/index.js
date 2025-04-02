const numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
function numerosPares(array) {
    return array.reduce((pares, numero) => {
        if(numero % 2 === 0) {
            pares.push(numero);
        }
        return pares;
    }, []);
}

console.log(numerosPares(numeros));
