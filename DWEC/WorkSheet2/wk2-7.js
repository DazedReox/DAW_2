let num = parseInt(prompt("Introduce un numero")); 

document.write("<table>");
for(let i = 0; num <= 180; i++){
    document.write("<tr><td>" + num + "</td>" + "<td>" + (Math.sin(num)) + "</tr>");
    num = num + 10;
}
document.write("</table>");
