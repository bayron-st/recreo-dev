
    <link rel="stylesheet" href="<?php echo base_url('assets/juego/css/icon/favicon.gif');?>" type="image.gif">

    <!-- CSS -->

       <script>
var base_url = "<?php echo base_url();?>";
</script>

    <link rel="stylesheet" href="<?php echo base_url('assets/juego/css/main.css');?>" type="image.gif">

    <link rel="stylesheet" media="(min-width: 1280px) and (max-width: 1400px) and (orientation: landscape)" href="<?php echo base_url('assets/juego/css/mediumWindows.css');?>" />
    <link rel="stylesheet" media="(min-width: 1024px) and (max-width: 1280px) and (orientation: landscape)" href="<?php echo base_url('assets/juego/css/smallWindows.css');?>" />
    <link rel="stylesheet" media="(max-width: 1024px) or (orientation: portrait)" href="<?php echo base_url('assets/juego/css/verticalWindows.css');?>" />
    <!-- CSS PLUGIN INTROJS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/juego/plugin/introJS/introjs.css');?>">
    <!-- ICONOS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/juego/css/icon/font-awesome-4.7.0/css/font-awesome.min.css');?>">




    <!-- MODAL INICIAL ELEGIR DIFICULTAD -->
    <div id="modal" class="modalDialog">
        <div class="modal-content">
            <div class="modal-header"> Seleccione un nivel de dificultad </div>
            <div id="modal-body" class="modal-body">
                <div id="dificultadBtn" class="modal-body">
                    <button id="facil" class="btn"> Fácil </button>
                    <button id="medio" class="btn"> Medio </button>
                    <button id="dificil" class="btn"> Dificil </button>
                </div>

                <div id="otherBtn" class="modal-body">
                    <button id="tablaPuntuaciones" class="btn neutral"> Ver tabla de puntuaciones </button>
                    <button id="ayuda" class="btn neutral">
                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                    </button>
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
                    <label class='titlePtos'>Puntos</label>
                    <label class='titlePtos'>Tiempo</label>
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
                    <button id='limpiar' class='btn cancel'>Limpiar historial partidas</button>
                    <button id='cerrar' class='btn cancel'>Cerrar</button>
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
            <div class="reloj" id="Minutos">00</div>
            <div class="reloj" id="Segundos">:00</div>
        </div>
        <div id="wrapper" class="wrapper"></div>
</div>

    <script src="<?php echo base_url('assets/juego/js/cronometro.js');?>"></script>
    <script src="<?php echo base_url('assets/juego/js/imagenes.js');?>"></script>
    <script src="<?php echo base_url('assets/juego/js/modalScore.js');?>"></script>
    <script src="<?php echo base_url('assets/juego/plugin/introJS/intro.js');?>"></script>
    <script src="<?php echo base_url('assets/juego/js/main.js');?>"></script>
