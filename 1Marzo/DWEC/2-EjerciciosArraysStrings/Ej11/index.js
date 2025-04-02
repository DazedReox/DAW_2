const palabras = ["Casa", "Manzana", "Arbol", "Olfato", "Edificio"];

function palabrasVocal(array){
    return array.reduce((vocal, palabra) => {
        if(palabra.slice(0,1)=== 'a'||palabra.slice(0,1)=== 'e'|| palabra.slice(0,1)=== 'i'|| palabra.slice(0,1)=== 'o'|| palabra.slice(0,1)=== 'u'){
            vocal.push(palabra);
        }
        return vocal;
    }, []);
}

console.log(palabrasVocal(palabras));