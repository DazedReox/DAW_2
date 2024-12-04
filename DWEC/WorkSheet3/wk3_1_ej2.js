function dado(){
    return Math.floor(Math.random() * 6) + 1;
}
document.write("<p>Ha salido: " + dado() + "</p>");