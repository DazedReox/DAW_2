window.onload = ()=>{
    var pelota = document.getElementById("pelota");
    var posicionX = 50;
    var poscionInicial = Math.random()
    var limiteX = 960;
    var velocidad = 5;



    setInterval(()=>{
        posicionX = posicionX + velocidad;
        
        pelota.setAttribute("cx",posicionX);

        if(posicionX >= limiteX){
            velocidad *= -1;
        }
        if(posicionX <= 40){
            velocidad *= -1;
        }
    },30);
}