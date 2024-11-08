switch (screen.orientation.type) {
    case "landscape-primary":
      console.log("Esta derecho");
      break;
    case "landscape-secondary":
      console.log("Esta del reves");
      break;
    case "portrait-secondary":
    case "portrait-primary":
      console.log("Deberias rotar tu pantalla");
      break;
    default:
      console.log("La API de orientacion no es soportada por tu navegador");
  }
