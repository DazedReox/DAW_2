window.onload = () => {
    let peliABuscar = "";
    const apiKey = "1a3dcaad";
    let paginaActual = 1;
    let cargando = false;

    //buscar
    function peticionAjax(reset = false) {
        /**peliABuscar = document.getElementById("buscador").value.trim();
        if (!peliABuscar) {
            alert("Por favor, ingresa un término de búsqueda.");
            return;
        }**/
        if (reset) {
            document.getElementById("lista").innerHTML = "";
            paginaActual = 1;
        }
            
        peliABuscar = document.getElementById("buscador").value.trim();
        if (peliABuscar === "") {
            document.getElementById("numeroResultados").innerHTML = "Introduce una película para buscar.";
            return;
        }

        cargando = true;
        fetch("https://www.omdbapi.com/?apikey=" + apiKey + "&s=" + encodeURIComponent(peliABuscar), { method: "GET" })
            .then(response => response.json())
            .then(datosRecibidos => {
                cargando = false;
                if (datosRecibidos.Response === "False") {
                    alert("No se encontraron resultados.");
                    return;
                }

                let miLista = document.getElementById("lista");
                miLista.innerHTML = ""; 

                document.getElementById("numeroResultados").innerHTML = 
                    `Se han encontrado ${datosRecibidos.totalResults} películas`;
                document.getElementById("numeroResultados").style.display = "block"; 
                
                /***for (let pelicula of datosRecibidos.Search) {
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

                document.getElementById("lista").miLista.appendChild(li);***/

                for (let pelicula of datosRecibidos.Search) {
                    let li = document.createElement("li");
                    li.innerHTML = `${pelicula.Title} - ${pelicula.Year}`;
                    
                    let img = document.createElement("img");
                    img.src = pelicula.Poster !== "N/A" ? pelicula.Poster : "placeholder.jpg";
                    img.alt = pelicula.Title;
                    img.style.cursor = "pointer";
                
                    img.addEventListener("click", () => detalle(pelicula.imdbID));
                
                    li.appendChild(img);
                    document.getElementById("lista").appendChild(li);
                }
                
                paginaActual++;
            })
            .catch(error =>{
                cargando = false;
                console.error("Error al hacer la peticion:", error);
                document.getElementById("numeroResultados").innerHTML = "Error al cargar. Intentalo de nuevo";
                document.getElementById("numeroResultados").style.display = "block";
            });
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
                document.getElementById("año").innerHTML = datosRecibidos.Year;
                document.getElementById("pais").innerHTML = datosRecibidos.Country;
                document.getElementById("idioma").innerHTML = datosRecibidos.Language;
                document.getElementById("duracion").innerHTML = datosRecibidos.Runtime;
                document.getElementById("rating").innerHTML = datosRecibidos.imdbRating;
                document.getElementById("detalles").style.display = "block";
            })
            .catch(error => {
                console.error("Error en la petición:", error);
                alert("Error al cargar los detalles de la película.");
            });
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
        document.getElementById("año").innerHTML = "";
        document.getElementById("pais").innerHTML = "";
        document.getElementById("idioma").innerHTML = "";
        document.getElementById("duracion").innerHTML = "";
        document.getElementById("rating").innerHTML = "";
        //document.getElementById("detalles").style.display = "none";
        document.getElementById("buscador").value = "";
        paginaActual = 1;
        cargando = false;
    }

    document.getElementById("buscarBtn").addEventListener("click", peticionAjax);
    document.getElementById("resetBtn").addEventListener("click", reset);

    //mostrar los detalles

    //a veces da error los detalles por pedirlos muchas veces

    function detalle(idPelicula) {
        fetch(`https://www.omdbapi.com/?apikey=1a3dcaad&i=${idPelicula}`)
            .then(response => response.json())
            .then(datosRecibidos => {
                if (datosRecibidos) {
                    document.getElementById("modal-titulo").innerText = datosRecibidos.Title || "Sin título";
                    document.getElementById("modal-poster").src = datosRecibidos.Poster !== "N/A" ? datosRecibidos.Poster : "placeholder.jpg";
                    document.getElementById("modal-sinopsis").innerText = datosRecibidos.Plot || "Sin descripción.";
                    document.getElementById("modal-genero").innerText = datosRecibidos.Genre || "Desconocido";
                    document.getElementById("modal-director").innerText = datosRecibidos.Director || "Desconocido";
                    document.getElementById("modal-año").innerText = datosRecibidos.Year || "Desconocido";
                    document.getElementById("modal-pais").innerText = datosRecibidos.Country || "Desconocido";
                    document.getElementById("modal-idioma").innerText = datosRecibidos.Language || "Desconocido";
                    document.getElementById("modal-duracion").innerText = datosRecibidos.Runtime || "Desconocido";
                    document.getElementById("modal-rating").innerText = datosRecibidos.imdbRating || "Desconocido";
                } else {
                    console.error("No se encontraron datos para esta película.");
                }
    
                document.getElementById("modal").style.display = "flex";
            })
            .catch(error => console.error("Error al obtener los detalles de la película:", error));
            fetch(`https://www.omdbapi.com/?apikey=1a3dcaad&i=${idPelicula}`)
            .then(response => response.json())
            .then(datosRecibidos => {
                console.log("Datos recibidos para la película:", datosRecibidos);
        
            })
        .catch(error => console.error("Error al obtener los detalles de la película:", error));

    }
    //cerrar
    document.getElementById("closeModal").addEventListener("click", () => {
            document.getElementById("modal").style.display = "none";
    });
    //cerar 2
    document.getElementById("modal").addEventListener("click", (event) => {
        if (event.target.id === "modal") {
            document.getElementById("modal").style.display = "none";
        }
    });

    window.addEventListener("scroll", () => {
        if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 100 && !cargando) {
            peticionAjax(false); 
        }
    });
}
