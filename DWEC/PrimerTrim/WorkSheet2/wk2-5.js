let coefA = parseInt(prompt("Introduce el coef 'a' en la ecuacion ax^2 + bx + c = 0"));
let coefB = parseInt(prompt("Introduce el coef 'b' en la ecuacion ax^2 + bx + c = 0"));
let coefC = parseInt(prompt("Introduce el coef 'c' en la ecuacion ax^2 + bx + c = 0"));

document.write("<p>La primera solucion de la ecuacion es:" + (-coefB + Math.sqrt(Math.pow(coefB, 2) - 4*coefA*coefC))/(2*coefA) +  "</p>");
document.write("<p>La segunda solucion de la ecuacion es:" + (-coefB - Math.sqrt(Math.pow(coefB, 2) - 4*coefA*coefC))/(2*coefA) +  "</p>");