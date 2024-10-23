try{
navigator.geolocation.getCurrentPosition(function(position) {
    console.log("Latitud: ", position.coords.latitude);
    console.log("Longuitud: ", position.coords.longitude);
})
}
catch(e){
    console.log("Ha ocurrido un error: ", e);
}

function actualizarPosicion(posicion){
    const posicion = {
        lat: posicion.coords.latitude,
        lng: posicion.coords.longitude,
        acc: posicion.coords.accuracy
    };
}
navigator.geolocation.watchPosition(actualizarPosicion);
console.log(posicion);
