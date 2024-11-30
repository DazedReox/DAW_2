window.onload = () => {
    let peliABuscar = "";
    const apiKey = "1a3dcaad";

    // Función para realizar la búsqueda
    function peticionAjax() {
        peliABuscar = document.getElementById("buscador").value.trim();
        if (!peliABuscar) {
            alert("Por favor, ingresa un término de búsqueda.");
            return;
        }

        fetch("https://www.omdbapi.com/?apikey=" + apiKey + "&s=" + encodeURIComponent(peliABuscar), { method: "GET" })
            .then(response => response.json())
            .then(datosRecibidos => {
                if (datosRecibidos.Response === "False") {
                    alert("No se encontraron resultados.");
                    return;
                }

                let miLista = document.getElementById("lista");
                miLista.innerHTML = ""; 

                document.getElementById("numeroResultados").innerHTML = 
                    `Se han encontrado ${datosRecibidos.totalResults} películas`;
                document.getElementById("numeroResultados").style.display = "block"; 
                
                for (let pelicula of datosRecibidos.Search) {
                    let li = document.createElement("li");
                    li.innerHTML = `${pelicula.Title} - ${pelicula.Year}`;
                    miLista.appendChild(li);

                    let img = document.createElement("img");
                    img.src = pelicula.Poster !== "N/A" ? pelicula.Poster : "placeholder.jpg";
                    img.alt = pelicula.Title;
                    img.style.cursor = "pointer";
                    img.addEventListener("click", () => detalle(pelicula.imdbID));
                    li.appendChild(img);
                }

                document.getElementById("lista").miLista.appendChild(li);
            })
            .catch(error => console.error("Error en la petición:", error));
    }

    function detalle(idPelicula) {
        reset();

        fetch("https://www.omdbapi.com/?apikey=" + apiKey + "&s=" + encodeURIComponent(peliABuscar), { method: "GET" })
            .then(response => response.json())
            .then(datosRecibidos => {
                if (datosRecibidos.Response === "False") {
                    alert("No se pudo cargar la información de la película.");
                    return;
                }

                document.getElementById("titulo").innerHTML = datosRecibidos.Title;
                document.getElementById("sinopsis").innerHTML = datosRecibidos.Plot;

                const poster = document.getElementById("poster");
                if (datosRecibidos.Poster !== "N/A") {
                    poster.src = datosRecibidos.Poster;
                    //poster.style.display = "block"; 
                } else {
                    poster.style.display = "none";
                }

                document.getElementById("genero").innerHTML = datosRecibidos.Genre;
                document.getElementById("director").innerHTML = datosRecibidos.Director;
                document.getElementById("anio").innerHTML = datosRecibidos.Year;
                document.getElementById("pais").innerHTML = datosRecibidos.Country;
                document.getElementById("idioma").innerHTML = datosRecibidos.Language;
                document.getElementById("duracion").innerHTML = datosRecibidos.Runtime;
                document.getElementById("rating").innerHTML = datosRecibidos.imdbRating;
                document.getElementById("detalles").style.display = "block";
            })
            .catch(error => console.error("Error en la petición:", error));
    }


    function reset() {
        //lista
        document.getElementById("lista").innerHTML = "";
        document.getElementById("numeroResultados").innerHTML = "";
        //document.getElementById("numeroResultados").style.display = "none";
        //document.getElementById("lista").style.display = "none";

        //detalles
        document.getElementById("titulo").innerHTML = "";
        document.getElementById("sinopsis").innerHTML = "";
        document.getElementById("poster").src = "";
        //document.getElementById("poster").style.display = "none";
        document.getElementById("genero").innerHTML = "";
        document.getElementById("director").innerHTML = "";
        document.getElementById("anio").innerHTML = "";
        document.getElementById("pais").innerHTML = "";
        document.getElementById("idioma").innerHTML = "";
        document.getElementById("duracion").innerHTML = "";
        document.getElementById("rating").innerHTML = "";
        //document.getElementById("detalles").style.display = "none";
        document.getElementById("buscador").value = "";
    }

    document.getElementById("buscarBtn").addEventListener("click", peticionAjax);
    document.getElementById("resetBtn").addEventListener("click", reset);

    
};