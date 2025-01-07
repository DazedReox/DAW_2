window.onload = ()=>{
    var pelota = document.getElementById("pelota");
    var posicionX = 50;
    var limiteX = 960;
    var velocidad = 5;
    var posicionInicial;
    var spawnX;
    var spawnY;
    var posicionY1 = 100;
    var posicionY2 = 800;


    function spawn(){
        spawnX = 500;
        spawnY = Math.random()*500;
    }

    setInterval(()=>{
        posicionInicial = spawn()
        
        pelota.setAttribute("cx", "cy", spawn.spawnX, spawn.spawnY);
 
        if(posicionX >= limiteX){
            velocidad *= -1;
        }
        if(posicionX <= 40){
            velocidad *= -1;
        }
    },30);

    function cambiarYr1(){
        posicionY1 = posicionY1.addEventListener("W", ()=>{posicionY1 += 10;});
        posicionY1 = posicionY1.addEventListener("S", ()=>{posicionY1 -= 10;});
    }

    function cambiarYr2 (){
        posicionY2 = posicionY2.addEventListener("up arrow", ()=>{posicionY2 += 10;});
        posicionY2 = posicionY2.addEventListener("down arrow", ()=>{posicionY2 -= 10;});
    }
}