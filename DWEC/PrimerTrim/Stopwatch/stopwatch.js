window.onload = function() {

    clock = document.getElementById("time");

    function start() {
        interval = setInterval(function() {
            var minutos = 0;
            var segundos = 0;
            var milisegundos = 0;
            if (milisegundos < 10) {
                milisegundos = "0" + milisegundos;
            }
            if (segundos < 10) {
                segundos = "0" + segundos;
            }
            if (minutos < 10) {
                minutos = "0" + minutos;
            }
            clock.innerHTML = minutos + ":" + segundos + ":" + milisegundos;
            milisegundos++;
            if (milisegundos == 100) {
                segundos++;
                milisegundos = 0;
            }
            if (segundos == 60) {
                minutos++;
                segundos = 0;
            };
        });
    };

    function stop() {
        clearInterval(interval);
    };

    function reset() {
        clearInterval(interval);
        clock.innerHTML = "00:00:00";
        milisegundos = 0;
        segundos = 0;
        minutos = 0;
    };
}