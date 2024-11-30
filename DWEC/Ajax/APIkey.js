window.onload =()=>{
    var peliABuscar = "";
    var paginaABuscar = "";
    function peticionAjax(){
        peliABuscar = document.getElementById("buscador").value;
        console.log(peliABuscar);
        fetch("https://www.omdbapi.com/?apikey=1a3dcaad&s", {method: "GET"})
        .then(response => response.json())
        .then(datosRecibidos=>{
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
        });
    }

    function detalle(idPelicula) {
        fetch("https://www.omdbapi.com/?apikey=1a3dcaad&i=" + idPelicula, {method: "GET"})
        .then(response => response.json())
        .then(datosRecibidos=>{ 
            console.log(datosRecibidos);
            for(pelicula of datosRecibidos.Search){
                let li = document.createElement("li");
                li.innerHTML = pelicula.Title +" - " + pelicula.Year + "<br>" + pelicula.Poster + "<br>"
                + pelicula.Plot + "<br>" + pelicula.Genre + "<br>" + pelicula.Director + "<br>"
                + pelicula.Year + "<br>" + pelicula.Country + "<br>" + pelicula.Language + "<br>" 
                + pelicula.Runtime + "<br>" + pelicula.imdbRating;
                miLista.appendChild(li);
                document.getElementById("titulo").innerHTML = datosRecibidos.Title;
                document.getElementById("sinopsis").innerHTML = datosRecibidos.Plot;
                document.getElementById("poster").src = datosRecibidos.Poster;
                document.getElementById("genero").innerHTML = datosRecibidos.Genre;
                document.getElementById("director").innerHTML = datosRecibidos.Director;
                document.getElementById("año").innerHTML = datosRecibidos.Year;
                document.getElementById("pais").innerHTML = datosRecibidos.Country;
                document.getElementById("idioma").innerHTML = datosRecibidos.Language;
                document.getElementById("duracion").innerHTML = datosRecibidos.Runtime;
                document.getElementById("rating").innerHTML = datosRecibidos.imdbRating;   
            }
        })
    }

    function reset() {
        document.getElementById("titulo").innerHTML = "";
        document.getElementById("sinopsis").innerHTML = "";
        document.getElementById("poster").src = "";
        document.getElementById("genero").innerHTML = "";
        document.getElementById("director").innerHTML = "";
        document.getElementById("año").innerHTML = "";
        document.getElementById("pais").innerHTML = "";
        document.getElementById("idioma").innerHTML = "";
        document.getElementById("duracion").innerHTML = "";
        document.getElementById("rating").innerHTML = "";
    }
}