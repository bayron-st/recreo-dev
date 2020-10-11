<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Reta tu memoria</title>

        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" media="(min-width: 1280px) and (max-width: 1400px) and (orientation: landscape)" href="css/mediumWindows.css" />
        <link rel="stylesheet" media="(min-width: 1024px) and (max-width: 1280px) and (orientation: landscape)" href="css/smallWindows.css" />
        <link rel="stylesheet" media="(max-width: 1024px) or (orientation: portrait)" href="css/verticalWindows.css" />
        <!-- CSS PLUGIN INTROJS -->
        <link rel="stylesheet" href="plugin/introJS/introjs.css">
        <!-- ICONOS -->
        <link rel="stylesheet" href="css/icon/font-awesome-4.7.0/css/font-awesome.min.css">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="../assets/css/bootstrap.css" />
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php
            $servidor='localhost';
            $usuario='root';
            $pass='';
            $bd='elrecqcg_dashboard';
            $conexion = new mysqli($servidor, $usuario, $pass, $bd);
            $conexion->set_charset('utf8');
            if ($conexion->connect_errno) {
                echo "Error al conectar la base de datos {$conexion->connect_errno}";
            }

            if (!isset($_GET['player'])) {
                //echo"<script language='javascript'>window.location='https://elrecreoesdetodos.com/dashboard/index.php/participante/juego'</script>;";   
            } elseif (isset($_GET['player'])) {
                
                $id_player = $_GET['player'];
                $query1="SELECT COUNT(*) as exist_player FROM `game` where id_participante = $id_player";                
                $query2="SELECT * FROM `game` where id_participante = $id_player";

                $query3="SELECT SUM(CANTIDAD) as nCreditos FROM `creditos` WHERE TIPO = 'JUEGO' and id_participante = $id_player";

                $query4="UPDATE `game` SET `last_shot` = 'date('Y-m-d')', `game_count` = 'game_count + 1', `game_shot` = 'game_shot + 1', `game_shot_count` = ' game_shot_count - 1' WHERE id_participante = $id_player";

                $consulta1 = mysqli_query($conexion , $query1);
                $consulta2 = mysqli_query($conexion , $query2);
                $consulta3 = mysqli_query($conexion , $query3);
                $consulta4 = mysqli_query($conexion , $query4);

                // Inserta registro de nuevo jugador
                if ($consulta1) {
                    $datos1 = mysqli_fetch_assoc($consulta1);
                    $exist_player = $datos1['exist_player'];
                    if ($exist_player == 0) {
                        $date_start = date("Y-m-d");
                        $date_end = date("Y-m-d",strtotime($date_start ."+ 1 week"));
                        $new_player ="INSERT INTO `game` (`id_participante`, `game_level`, `date_start`, `date_end`, `last_shot`, `game_count`, `game_shot`) VALUES ($id_player , '1', '$date_start', '$date_end', '$date_start', '1', '1');";
                        $reg_player = mysqli_query($conexion , $new_player) or die (mysqli_error());
                        if ($reg_player) {
                            $text_msj = "Nuevo jugador registrado con exito";
                        }
                    } elseif ($exist_player == 1) {
                        $text_msj = 'Jugador registrado';
                    }
                }

                // Consulta la informacion del juego asociada al jugador
                if ($consulta2) {
                    $datos2 = mysqli_fetch_assoc($consulta2);
                    $game_level = $datos2['game_level'];
                    $game_start = $datos2['date_start'];
                    $game_end = $datos2['date_end'];
                    $last_shot = $datos2['last_shot'];
                    $game_count = $datos2['game_count'];
                    $game_shot = $datos2['game_shot'];
                } elseif (!$consulta2) {
                    $game_level = '';
                    $game_start = '';
                    $game_end = '';
                    $last_shot = '';
                    $game_count = '';
                    $game_shot = '';
                }

                // Consulta la informacion de créditos por juego asociada al jugador
                if ($consulta3) {
                    $datos3 = mysqli_fetch_assoc($consulta3);
                    $nCreditos = $datos3['nCreditos'];
                } elseif (!$consulta3) {
                    $nCreditos = '';
                }
            }
        ?>

        <div class="container">

            <div class="container" style="display:none">
                <div id="numPartidas" class="numPartidas">
                    Partida nº: <span id="numPartidasValue"></span>
                </div>
                <div id="maxScore" class="maxPuntos">
                    Puntuación Max.: <span id="puntosMaxValue">0</span>
                </div>
                <div id="score" class="puntos">
                    Puntos: <span id="puntosValue">0</span>
                </div>
                <!-- <div id="cronometro" class="cronometro">
                    <div class="reloj" id="Minutos">00</div>
                    <div class="reloj" id="Segundos">:00</div>
                </div> -->
            </div>

            <div class="page-header">
                <img src="img/logo.png"> 
            </div>
            <div class="row">
                <div class="col-md-4 col-xs-12 text-center">
                    <div class="well well-lg" id="cronometro" class="cronometro" style="color: #ff5733; font-size: 35px;">
                        <div class="reloj" id="Minutos">00</div>
                        <div class="reloj" id="Segundos">:00</div>
                    </div>
                    <div class="well well-sm hidden-xs" style="">Total créditos ganados: <?php echo $nCreditos;?></div>
                    <div class="well well-sm hidden-xs">Nivel del juego: <?php echo $game_level;?></div>
                    <div class="well well-sm hidden-xs">Intentos realizados: <?php echo $game_count;?></div>
                </div>
                <div class="col-md-8">
                    <div id="wrapper" class="wrapper"></div>
                </div>
            </div>
            <hr class="visible-xs">
            <div class="row">
                <div class="col-xs-12 visible-xs" style="margin-top:20px;">
                    <div class="well well-sm" style="">Total créditos ganados: <?php echo $nCreditos;?></div>
                    <div class="well well-sm">Nivel del juego: <?php echo $game_level;?></div>
                    <div class="well well-sm">Intentos realizados: <?php echo $game_count;?></div>
                </div>
            </div>



        </div>


        <!-- MODAL INICIAL ELEGIR DIFICULTAD -->
        <div id="modal" class="modalDialog">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="img/logo.png"> 
                </div>
                <div id="modal-body" class="modal-body">
<<<<<<< HEAD
                    <h2> Reta tu memoria <br> Tetra Pak&reg; </h2>
                    <p style="font-size: 18px;">Tienes  hasta 3 intentos por semana para ganar hasta 9 creditos.</p>
                    <div id="dificultadBtn">
                        <button type="submit" id="start" class="btn btn-info btn-lg" style="font-size: 18px; "> Iniciar Juego </button>
                    </div>
=======
                    <h2 style="font-size:30px;">Tetra Pak&reg;</h2>
                    <h3>Reta tu memoria</h3>
                    <?php
                        if ($game_shot_count == 0) {$color_texto = 'text-danger';}
                        if ($game_shot_count == 1) {$color_texto = 'text-warning';}
                        if ($game_shot_count == 2) {$color_texto = 'text-info';}
                        if ($game_shot_count == 3) {$color_texto = 'text-success';}
                    ?>
                    <p style="font-size:18px;">Te quedan <?php echo '<strong class="'.$color_texto.'">'.$game_shot_count.'</strong>';?> intentos.</p>
                    <?php
                        if ($game_shot_count == 0) {
                            echo '
                                <p class="text-danger" style="font-size:20px"><strong>Has alcanzado el límite de intentos por semana</strong></p>
                                <p style="font-size:18px">Regresa de nuevo la próxima semana para tener<br>más intentos y nuevas oportunidades de ganar créditos.</p>
                            ';
                        } elseif ($game_shot_count > 0) {
                            echo '
                                <div id="dificultadBtn">
                                    <button type="submit" id="start" class="btn btn-info btn-lg" style="font-size: 18px; ">Iniciar Juego <i class="fa fa-gamepad"></i> </button>
                                </div>
                                <p class="text-secondary" style="margin-top:15px">Al iniciar el juego se descontará un intento por semana</p>
                            ';
                        }
                    ?>
>>>>>>> parent of 210c14d... Nuevos ajustes flujo winner
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


<<<<<<< HEAD
        <!-- MODAL PERDER PARTIDA -->
=======
  

>>>>>>> parent of 210c14d... Nuevos ajustes flujo winner
        <div id="modalLoose" class="hide">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="img/logo.png"> 
                </div>
                <div id="modal-body" class="modal-body">
                    <h2> Reta tu memoria <br> Tetra Pak&reg; </h2>
                    <p style="font-size: 18px;">Alcanzaste el tiempo limite</p>

                    <div class="well well-sm hidden-xs">Intentos realizados: <?php echo $game_count;?></div>

                    <div >
                     <img src="img/png/085-sad.png" width="100" height="100"> 
                        <br>
                    </div>


                 <form action="index.php?player=<?php echo $id_player?>" name="loose_game" method="POST">
                                          

                        <div >
             <button  id="start" class="btn btn-info btn-lg" style="font-size: 18px; "> Siguiente intento </button>

                            <a href="participante/dashboard">Mi cuenta</a>
                        </div>

                 </form>
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

        <script src="js/cronometro.js"></script>
        <script src="js/imagenes.js"></script>
        <script src="js/modalScore.js"></script>
        <script src="plugin/introJS/intro.js"></script>
        <script src="js/main.js"></script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>