// var user_level_game = $('#user_level_game').val();

var user_level_game = document.getElementById('user_level_game').value;

if (user_level_game == 1) {
    var centesimas = 0;
    var segundos = 50;
    var minutos = 0;
    var seg_level = 50;
    var min_level = 00;
} else if (user_level_game == 2) {
    var centesimas = 0;
    var segundos = 40;
    var minutos = 0;
    var seg_level = 40;
    var min_level = 00;
} else if (user_level_game == 3) {
    var centesimas = 0;
    var segundos = 30;
    var minutos = 0;
    var seg_level = 30;
    var min_level = 00;
} else {
    var centesimas = 0;
    var segundos = 20;
    var minutos = 0;
    var seg_level = 20;
    var min_level = 00;
}

// var centesimas = 0;
// var segundos = 10;
// var minutos = 0;
var control;


function inicio() {
    control = setInterval(cronometro, 10);
}

function parar() {
    clearInterval(control);
}

function perdio() {
    clearInterval(control);
}


function reinicio() {
    clearInterval(control);
    this.centesimas = 0;
    this.segundos = 0;
    this.minutos = 0;

    Segundos.innerHTML = ":" + seg_level;
    Minutos.innerHTML = min_level;
}

function cronometro() {

    if ((segundos == 60) && (minutos == -1)) {

        reinicio();
        partidaPerdida();
    }

    if (centesimas == 0) {
        centesimas = 100;
    }

    if (centesimas > 0) {
        centesimas--;

        if (centesimas < 10) {
            centesimas = "0" + centesimas;
        }

        centesimas.innerHTML = ":" + centesimas;
    }

    if (centesimas == 99) {

        segundos--;

        if (segundos < 10) {

            segundos = "0" + segundos;
        }

        Segundos.innerHTML = ":" + segundos;
    }

    if (segundos == 0) {
        segundos = 60;
    }

    if ((segundos == 60) && (centesimas == 99)) {
        minutos--;
        Minutos.innerHTML = minutos;
    }

}