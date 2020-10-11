var centesimas = 0;
var segundos = 10;
var minutos = 0;
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

    Segundos.innerHTML = ":10";
    Minutos.innerHTML = "00";
}

             function cronometro () {

                    if((segundos == 60)&&(minutos == -1)){

                    reinicio();
                    partidaPerdida();
                }

                if(centesimas == 0){
                        centesimas = 100;
                }

                if(centesimas > 0){
                    centesimas--;
                
                if(centesimas < 10){
                    centesimas = "0"+centesimas;
                }

                centesimas.innerHTML = ":"+centesimas;
                 }

                if(centesimas == 99){

                     segundos--;

                if(segundos < 10){

                        segundos = "0"+segundos;
                }

                        Segundos.innerHTML = ":"+segundos;
                }

                if(segundos == 0){
                         segundos = 60;
                }

                if((segundos == 60) && (centesimas == 99)){
                    minutos--;
                Minutos.innerHTML = minutos;
                }

            }
