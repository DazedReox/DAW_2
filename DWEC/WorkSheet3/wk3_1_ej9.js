let palabra = prompt("Introduce una palabra");

document.write("<table>");
document.write("<tr>");
for(let i = 0; i < palabra.length; i++){
    document.write("<td>" + palabra[i] + "</td>");
}

document.write("</tr>");
document.write("<tr>");
for(let i = 1; i < 2; i++){
    document.write("<td>" + palabra[i] + "</td>");
    for(let j = 0; j <= (palabra.length-2); j++){
        document.write("<td>" + " " + "</td>");
    }
    document.write("<td>" + palabra[palabra.length-1] + "</td>");
}
document.write("</tr>");

document.write("<tr>");
for(let i = 1; i < 2; i++){
    document.write("<td>" + palabra[palabra.length-1] + "</td>");
    for(let j = 0; j <= (palabra.length-2); j++){
        document.write("<td>" + " " + "</td>");
    }
    document.write("<td>" + palabra[i] + "</td>");
}
document.write("</tr>");

document.write("<tr>");
for(let i = 0; i < palabra.length; i++){
    document.write("<td>" + palabra[i] + "</td>");
}
document.write("</tr>");
document.write("</table>");