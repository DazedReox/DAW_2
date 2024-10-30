//Crear color aleatorio
function ColorAleatorio(){
    const r = Math.floor(Math.random() * 256);
    const g = Math.floor(Math.random() * 256);
    const b = Math.floor(Math.random() * 256);
    return `rgb(${r}, ${g}, ${b})`;
}

const valorRgb = document.getElementById("rgb");
const contenedorOpcionesColor = document.getElementById("contenedorOpciones");
const mensaje = document.getElementById("mensaje");

let ColorCorrecto;

function empezarPartida(){
    contenedorOpcionesColor.innerHTML = "";
    mensaje.textContent= "";

    const color = Array.from({length: 6}, ColorAleatorio);
    ColorCorrecto = color[Math.floor(Math.random() * color.length)];
    valorRgb.textContent = `RGB: ${ColorCorrecto}`;

    color.forEach(color => {
        const opcionColor = document.createElement("div");
        opcionColor.style.backgroundColor = color;
        opcionColor.classList.add("opcionColor");
        opcionColor.addEventListener("click", () => seleccionarColor(color));
        contenedorOpcionesColor.appendChild(opcionColor);
    });
}

function comprobarIntento(){
    if(color === ColorCorrecto){
        mensaje.textContent = "Correcto";
    }else{
        mensaje.textContent = "Prueba de nuevo";
    }
}

empezarPartida();