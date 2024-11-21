window.onload = ()=>{
    var nPelotas = parseInt(prompt("Introduce el numero de pelotas"));

    for(var i = 0; i < nPelotas; i++){
        var pelota = document.createElementNS("http://www.w3.org/2000/svg","circle");
        pelota.setAttribute("cx", 50);
        pelota.setAttribute("cy", 50);
        pelota.setAttribute("r", 40);
        pelota.setAttribute("stroke", "green");
        pelota.setAttribute("stroke-width", 4);
        pelota.setAttribute("fill", "yellow");
        document.body.appendChild(pelota);
    }

    class bola{
        
    }
}