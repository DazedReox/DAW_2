var peliABuscar = "";
var paginaABuscar = "";

fetch("https://www.omdbapi.com/?apikey=1a3dcaad&s=star", {method: "GET"})
.then(response => response.json())
.then(datosRecibidos) =>{
    let miLista = document.getElementById("lista");
    miLista.innerHTML = "";
    console.log(datosRecibidos);
    for (pelicula of datosRecibidos.Search) {
        document.getElementById("numeroResultados").innerHTML = "Se han encontrado " + datosRecibidos.totalResults + " peliculas";

        let li = document.createElement("li");
        li.innerHTML = pelicula.Title +" - " + pelicula.Year;
        miLista.appendChild(li);
        let img = document.createElement("img");
        img.idPelicula = pelicula.imdbID;
        img.addEventListener("click", detalle(pelicula.imdbID));
        img.src = pelicula.Poster;
        li.appendChild(img);

    }
}

function detalle(idPelicula) {
    fetch("https://www.omdbapi.com/?apikey=1a3dcaad&i=" + idPelicula, {method: "GET"})
    .then(response => response.json())
    .then(datosRecibidos) => {
        console.log(datosRecibidos);
        document.getElementById("titulo").innerHTML = datosRecibidos.Title;
        document.getElementById("sinopsis").innerHTML = datosRecibidos.Plot;
        document.getElementById("poster").src = datosRecibidos.Poster;
    }
}