function lanzamiento(){
    let numero = Math.floor(Math.random()*6) + 1;
    document.write("<p>" + numero + "</p>");
}

let uno = 0;
let dos = 0;
let tres = 0;
let cuatro = 0;
let cinco = 0;
let seis = 0;

for(let i = 0; i <= 6000; i++){
    lanzamiento();
    if(numero == 1){
        uno++;
    }else if(numero == 2){
        dos++;
    }else if(numero == 3){
        tres++;
    }else if(numero == 4){
        cuatro++;
    }else if(numero == 5){
        cinco++;
    }else if(numero == 6){
        seis++;
    }
}

document.write("<p>El numero 1 ha salido: " + uno + " veces.</p>");
document.write("<p>El numero 2 ha salido: " + dos + " veces.</p>");
document.write("<p>El numero 3 ha salido: " + tres + " veces.</p>");
document.write("<p>El numero 4 ha salido: " + cuatro + " veces.</p>");
document.write("<p>El numero 5 ha salido: " + cinco + " veces.</p>");
document.write("<p>El numero 6 ha salido: " + seis + " veces.</p>");
