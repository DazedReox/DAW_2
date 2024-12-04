window.onload = () => {
    let peliABuscar = "";
    let paginaActual = 1; 
    let cargando = false;
    function peticionAjax(reset = false) {
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
        fetch(`https://www.omdbapi.com/?apikey=1a3dcaad&s=${encodeURIComponent(peliABuscar)}&page=${paginaActual}`)
            .then(response => response.json())
            .then(datosRecibidos => {
                cargando = false;

                if (datosRecibidos.Response === "True") {
                    document.getElementById("numeroResultados").innerHTML = `Se han encontrado ${datosRecibidos.totalResults} películas.`;

                    let miLista = document.getElementById("lista");

                    for (let pelicula of datosRecibidos.Search) {
                        let li = document.createElement("li");
                        li.innerHTML = `<span>${pelicula.Title} - ${pelicula.Year}</span>`;
                        let img = document.createElement("img");
                        img.src = pelicula.Poster !== "N/A" ? pelicula.Poster : "https://via.placeholder.com/300x450?text=No+Image";
                        img.alt = pelicula.Title;
                        img.addEventListener("click", () => mostrarDetalles(pelicula.imdbID));
                        li.appendChild(img);
                        miLista.appendChild(li);
                    }

                    paginaActual++;
                } else {
                    if (reset) document.getElementById("numeroResultados").innerHTML = "No se encontraron resultados.";
                }
            })
            .catch(error => {
                cargando = false;
                console.error("Error al obtener los datos:", error);
                document.getElementById("numeroResultados").innerHTML = "Ocurrió un error al cargar las películas. Inténtalo de nuevo.";
            });
    }

    function mostrarDetalles(idPelicula) {
        fetch(`https://www.omdbapi.com/?apikey=1a3dcaad&i=${idPelicula}`)
            .then(response => response.json())
            .then(datosRecibidos => {
                if (datosRecibidos.Response === "True") {
                    let modal = document.getElementById("modal");
                    let modalContent = document.getElementById("modal-content");

                    modalContent.innerHTML = `
                        <button id="modal-close" onclick="cerrarModal()">×</button>
                        <h2>${datosRecibidos.Title || "Sin título"}</h2>
                        <img src="${datosRecibidos.Poster !== "N/A" ? datosRecibidos.Poster : "https://via.placeholder.com/300x450?text=No+Image"}" alt="${datosRecibidos.Title}">
                        <p>${datosRecibidos.Plot || "No hay sinopsis disponible."}</p>
                        <p><strong>Género:</strong> ${datosRecibidos.Genre || "N/A"}</p>
                        <p><strong>Director:</strong> ${datosRecibidos.Director || "N/A"}</p>
                        <p><strong>Año:</strong> ${datosRecibidos.Year || "N/A"}</p>
                        <p><strong>País:</strong> ${datosRecibidos.Country || "N/A"}</p>
                        <p><strong>Idioma:</strong> ${datosRecibidos.Language || "N/A"}</p>
                        <p><strong>Duración:</strong> ${datosRecibidos.Runtime || "N/A"}</p>
                        <p><strong>Rating:</strong> ${datosRecibidos.imdbRating || "N/A"}</p>
                    `;
                    modal.style.display = "flex";
                } else {
                    alert("No se pudieron cargar los detalles de la película.");
                }
            })
            .catch(error => {
                console.error("Error al obtener los detalles:", error);
                alert("Error al cargar los detalles de la película.");
            });
    }

    function cerrarModal() {
        let modal = document.getElementById("modal");
        modal.style.display = "none";
    }

   
    document.getElementById("buscarBtn").addEventListener("click", () => peticionAjax(true));

    
    window.addEventListener("scroll", () => {
        if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 100 && !cargando) {
            peticionAjax(false); 
        }
    });

    
    document.getElementById("resetBtn").addEventListener("click", () => {
        document.getElementById("lista").innerHTML = "";
        document.getElementById("numeroResultados").innerHTML = "";
        document.getElementById("buscador").value = "";
        paginaActual = 1;
        cargando = false;
    });
};
