<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <!-- FAVICON ANIMADO -->

   
    <link rel="shortcut icon" href="<?php echo base_url('assets/game/css/icon/favicon.gif" type="image.gif');?>">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/game/css/main.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">

    <link rel="stylesheet" media="(min-width: 1280px) and (max-width: 1400px) and (orientation: landscape)" href="<?php echo base_url('assets/game/css/mediumWindows.css');?>" />
    <link rel="stylesheet" media="(min-width: 1024px) and (max-width: 1280px) and (orientation: landscape)" href="<?php echo base_url('assets/game/css/smallWindows.css');?>" />
    <link rel="stylesheet" media="(max-width: 1024px) or (orientation: portrait)" href="<?php echo base_url('assets/game/css/verticalWindows.css');?>"/>
    <!-- CSS PLUGIN INTROJS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/game/plugin/introJS/introjs.css');?>">
    <!-- ICONOS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/game/css/icon/font-awesome-4.7.0/css/font-awesome.min.css');?>">
    <title> Encuentra la pareja </title>
</head>

<body>
    <!-- MODAL INICIAL ELEGIR DIFICULTAD -->
    <div id="modal" class="modalDialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <img src="<?php echo base_url('assets/game/img/logo.png');?>"> 

            </div>
            <div id="modal-body" class="modal-body">
                

                <h2> Reta tu memoria <br> Tetra Pak&reg; </h2>
                <p style="font-size: 18px;">Tienes  hasta 3 intentos por semana para ganar hasta 9 creditos.</p>

                <div id="dificultadBtn">
                    
                     <button id="facil" class="btn"> Fácil </button>
                  </div>
                
           
            </div>
        </div>
    </div>




    <!-- MODAL GUARDAR PARTIDA -->
    <div id="modalScore" class="hide">
        <div class="modal-content">
            <div class="modal-header"> Guardar puntuación </div>
            <div id="modal-score-body" class="modal-score-body">

                <div class='tabla'>
                    <label class='titlePtos'>Nombre</label>
                    <label class='titlePtos'>Creditos</label>
                    <label class='titlePtos'>Vivtorias</label>
                </div>

                <div class="tabla">
                    <input id="nombreJugador" type="text">
                    <label id="puntosPartida"></label>
                    <label id="tiempoPartida"></label>
                </div>

                <div class="tabla footer">
                    <div></div>
                    <button id="guardarJugador" class="btn">Guardar</button>
                    <button id="cancelar" class="btn cancel">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL TABLA DE PUNTUACIONES -->
    <div id="modalTableScore" class="hide">
        <div class="modal-content">
            <div class="modal-header"> Tabla de puntuaciones </div>
            <div id="modalTableScoreBody" class="modal-tscore-body">
                <div id="tPartidas" class="modal-tscore-body"></div>
                <div class='footer'>
                    
                    <button id='limpiar' class='btn cancel'>Cerrar</button>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div id="numPartidas" class="numPartidas">
            Partida nº: <span id="numPartidasValue"></span>
        </div>
        <div id="maxScore" class="maxPuntos">
            Puntuación Max.: <span id="puntosMaxValue">0</span>
        </div>
        <div id="score" class="puntos">
            Puntos: <span id="puntosValue">0</span>
        </div>
        <div id="cronometro" class="cronometro">
            <div class="reloj" id="Minutos">01</div>
            <div class="reloj" id="Segundos">:59</div>
        </div>
        <div id="wrapper" class="wrapper"></div>
    </div>

    <script src="<?php echo base_url('assets/game/js/cronometro.js');?>"></script>
    <script src="<?php echo base_url('assets/game/js/imagenes.js');?>"></script>
    <script src="<?php echo base_url('assets/game/js/modalScore.js');?>"></script>
    <script src="<?php echo base_url('assets/game/plugin/introJS/intro.js');?>"></script>
    <script src="<?php echo base_url('assets/game/js/main.js');?>"></script>

</body>

</html>