var angulo1 = prompt("Introduce el valor del primer angulo: ");
if(angulo1 > 178 || angulo1 < 1){
    alert("Este primer angulo no es posible: " + angulo1);
}


var angulo2 = prompt("Introduce el valor del segundo angulo: ");
if(angulo2 > 178 || angulo2 < 1){
    alert("Este segundo angulo no es posible: " + angulo1);
}
if(angulo1 + angulo2 > 179){
    alert("Este segundo angulo no es posible: " + angulo1);
}
if(angulo1 >= 90 && angulo2 >= 90){
    alert("Este segundo angulo no es posible: " + angulo1);
}


var angulo3 = prompt("Introduce el valor del tercer angulo: ");
if(angulo3 > 178 || angulo3 < 1){
    alert("Este tercer angulo no es posible: " + angulo1);
}
if(angulo2 > angulo3){
        if((angulo1 >= 90 && angulo2 < 90) && (angulo3 < 1 || angulo3 > 89)){
        alert("Este tercer angulo no es posible: " + angulo1);
    }
}
if(angulo2 > angulo3){
        if((angulo2 >= 90 && angulo1 < 90) && (angulo3 < 1 || angulo3 > 89)){
        alert("Este tercer angulo no es posible: " + angulo1);
    }
}
if(angulo3 > angulo2){
    if((angulo1 >= 90 && angulo3 < 90) && (angulo2 < 1 || angulo2 > 89)){
        alert("Este segundo angulo no es posible: " + angulo1);
    } 
}
if(angulo3 > angulo2){
    if((angulo3 >= 90 && angulo1 < 90) && (angulo2 < 1 || angulo2 > 89)){
        alert("Este segundo angulo no es posible: " + angulo1);
    } 
}
if(angulo2 > angulo1){
    if((angulo3 >= 90 && angulo2 < 90) && (angulo1 < 1 || angulo1 > 89)){
        alert("Este primer angulo no es posible: " + angulo1);
    } 
}
if(angulo2 > angulo1){
    if((angulo2 >= 90 && angulo3 < 90) && (angulo1 < 1 || angulo1 > 89)){
        alert("Este primer angulo no es posible: " + angulo1);
    } 
}


if(angulo1 + angulo2 + angulo3 > 180 || angulo1 + angulo2 + angulo3 < 180){
    alert("Este triangulo no es posible ya que sus angulos suman mas de 180º");
}else{
    alert("Este triangulo es posible.")
}

