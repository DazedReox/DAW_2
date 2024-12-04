window.onload = ()=>{

    var myJsonJose = jsonAJAX1 = {"name": "Jose", "apellido": "Pino", "edad": 30};
    var myJsonGorka = jsonAJAX1 = {"name": "Gorka", "apellido": "Nomacuerdo", "edad": 19}; 

    document.getElementById("btn").addEventListener("click", peticionAjax);
    document.getElementById("btn2").addEventListener("click", peticionAjax2);
    document.getElementById("btn3").addEventListener("click", peticionAjax3);
}

function peticionAjax(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("titulo").innerHTML = this.responseText;
    }
    };
    xhttp.open("GET", "titulo.txt", true);
    xhttp.send();
}


function peticionAjax2(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("nombre1").innerHTML = this.responseText;
    }
    };
    xhttp.open("GET", "myJsonJose", true);
    xhttp.send();    
}

function peticionAjax3(){
    var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
    document.getElementById("nombre2").innerHTML = this.responseText;
}
};
xhttp.open("GET", "myJsonGorka", true);
xhttp.send();
}