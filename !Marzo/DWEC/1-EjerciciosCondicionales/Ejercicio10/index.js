var nRandom = Math.floor(Math.random() * 10) + 1;
var nUser = prompt("Adivina el numero entre el 1 y 10: ");

if(nRandom == nUser){
    alert("buen trabajo");
}else{
    alert("No corresponde");
}