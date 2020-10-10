<!DOCTYPE html>
 
  <?php


// Datos de conexion a la base de datos
$servidor='localhost';
$usuario='root';
$pass='';
$bd='elrecqcg_dashboard';

// Nos conectamos a la base de datos
$conexion = new mysqli($servidor, $usuario, $pass, $bd);

// Definimos que nuestros datos vengan en utf8
$conexion->set_charset('utf8');

// verificamos si hubo algun error y lo mostramos
if ($conexion->connect_errno) {
    echo "Error al conectar la base de datos {$conexion->connect_errno}";
}

        if (!$_GET['player']) {
            echo"<script language='javascript'>window.location='https://elrecreoesdetodos.com/dashboard/index.php/participante/juego'</script>;";   
        }


        if (isset($_POST['new_game'])) {
            # code...
            $id_player = $_GET['player'];

            $query="SELECT * FROM `participantes` where id_participante = $id_player";
            $query2="SELECT * FROM `game` where id_participante = $id_player";

            $consulta = mysqli_query($conexion , $query2);

             if ($consulta) {

                $datos = mysqli_num_rows($consulta);

                if ($datos = 0) {
                    # code...

                    $date_start = date("Y-m-d");
                    $date_end = date("Y-m-d",strtotime($date_start ."+ 1 week"));

                    $new_player ="INSERT INTO `game` 
                    (`id_participante`, `game_level`, `date_start`, `date_end`, `last_shot`, 
                    `game_count`, `game_shot`) VALUES ($id_player , '1', '$date_start', '$date_end', 
                    '$date_start', '1', '1');";

                    $reg_player = mysqli_query($conexion , $id_player) or die (mysqli_error());

                    if ($reg_player) {
                        echo "registro exitoso";
                    }
                }

            }
        }




               
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <!-- FAVICON ANIMADO -->
    <link rel="shortcut icon" href="css/icon/favicon.gif" type="image.gif">
    <!-- CSS -->
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />

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
            <div class="modal-header">
                
                <img src="img/logo.png"> 

            </div>
            <div id="modal-body" class="modal-body">
                

                <h2> Reta tu memoria <br> Tetra Pak&reg; </h2>
                <p style="font-size: 18px;">Tienes  hasta 3 intentos por semana para ganar hasta 9 creditos.</p>

                <div id="dificultadBtn">
                    <form name="new_game" action="index.php" method="POST">
                        
                        <input type="hidden" name="id_player" value="<?php echo $id_player;?>" >
                   
                     <button type="submit" id="start" class="btn btn-info btn-lg" style="font-size: 18px; "> Iniciar Juego </button>
                 </form>
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

    <script src="js/cronometro.js"></script>
    <script src="js/imagenes.js"></script>
    <script src="js/modalScore.js"></script>
    <script src="plugin/introJS/intro.js"></script>
    <script src="js/main.js"></script>
</body>

</html>