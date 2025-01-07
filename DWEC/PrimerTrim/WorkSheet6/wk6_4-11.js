let ncolumnas = parseInt(prompt("Introduce el numero de columnas"));
let alto = parseInt(prompt("Introduce el alto"));
let ancho = parseInt(prompt("Introduce el ancho"));

document.write('<table border="0", cellspacing="2", bgcolors="black", width ="200">');
document.write('<tr bgcolor="white" height = "5">');
for(let i = 0; i <= ncolumnas; i++){
    document.write('<td width=" + ancho + ">" + "&nbsp;" + "</td>');
}

// EJ 12
let ncolumnas2 = parseInt(prompt("Introduce el numero de columnas"));
let alto2 = parseInt(prompt("Introduce el alto"));
let ancho2 = parseInt(prompt("Introduce el ancho"));

document.write('<table border="0", cellspacing="2", bgcolors="black", width ="200">');
document.write('<tr height = "50">');
for(let i = 0; i <= ncolumnas; i++){
    document.write('<td bgcolor="black" width=" + ancho + ">" + "&nbsp;" + "</td>');
    document.write('<td bgcolor="white" width=" + ancho + ">" + "&nbsp;" + "</td>');
}