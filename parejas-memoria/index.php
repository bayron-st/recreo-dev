<!DOCTYPE html>

   
<html lang="es">

<head>
    <meta charset="UTF-8">
    <!-- FAVICON ANIMADO -->
    <link rel="shortcut icon" href="css/icon/favicon.gif" type="image.gif">
    <!-- CSS -->
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" media="(min-width: 1280px) and (max-width: 1400px) and (orientation: landscape)" href="css/mediumWindows.css" />
    <link rel="stylesheet" media="(min-width: 1024px) and (max-width: 1280px) and (orientation: landscape)" href="css/smallWindows.css" />
    <link rel="stylesheet" media="(max-width: 1024px) or (orientation: portrait)" href="css/verticalWindows.css" />
    <!-- CSS PLUGIN INTROJS -->
    <link rel="stylesheet" href="plugin/introJS/introjs.css">
    <!-- ICONOS -->
    <link rel="stylesheet" href="css/icon/font-awesome-4.7.0/css/font-awesome.min.css">
    <title> Encuentra la pareja </title>
</head>

<body>
    <!-- MODAL INICIAL ELEGIR DIFICULTAD -->
    <div id="modal" class="modalDialog">
        <div class="modal-content">
            <div class="modal-header"> Bienvenido al reto de memoria de Tetra Pak </div>
            <div id="modal-body" class="modal-body">

                 <h2> Recuerda que tienes 3 oportunidades por semana para ganar creditos con nuestro reto de memoria.</h2>
                <div id="dificultadBtn" class="modal-body">


                    <button id="facil" class="btn"> Iniciar </button>
                  
                </div>
                
                <div id="otherBtn" class="modal-body">
                    <button id="tablaPuntuaciones" class="btn neutral"> Ver tabla de puntuaciones </button>
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
            <div class="reloj" id="Segundos">:60</div>
        </div>
        <div id="wrapper" class="wrapper"></div>
    </div>

    <script src="js/cronometro.js"></script>
    <script src="js/imagenes.js"></script>
    <script src="js/modalScore.js"></script>
    <script src="plugin/introJS/intro.js"></script>
    <script src="js/main.js"></script>
</body>

</html>