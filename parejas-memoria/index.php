<!DOCTYPE html>

<?php
    date_default_timezone_set('America/Bogota');
    $servidor='localhost';
    $usuario='elrecqcg_admin';
    $pass='7?0U4O7$9%^FvKzV';
    $bd='elrecqcg_dashboard';
    $conexion = new mysqli($servidor, $usuario, $pass, $bd);
    $conexion->set_charset('utf8');
    if ($conexion->connect_errno) {
        echo "Error al conectar la base de datos {$conexion->connect_errno}";
    }

	$host= $_SERVER["HTTP_HOST"];

    if (isset($_POST)) {

        if (isset($_POST['form_save_game_over'])) {
            $id_player_over = $_POST['id_player_over'];
            $id_game_over = $_POST['id_game_over'];
            $new_game_count = intval($_POST['new_game_count']) + 1;
            $new_game_shot = intval($_POST['new_game_shot']) + 1;
            $new_game_shot_count = intval($_POST['new_game_shot_count']) - 1;
            $new_game_shot_count2 = intval($_POST['new_game_shot_count2']) - 1;
            $date_last_game = date('Y-m-d');

            $query4 = "UPDATE `game` SET `last_shot` = '$date_last_game', `last_shot_status` = '2', `game_count` = $new_game_count, `game_shot` = $new_game_shot, `game_shot_count` = $new_game_shot_count , `game_shot_count2` = $new_game_shot_count2 WHERE id_participante = $id_player_over and id_game = $id_game_over";
            $consulta4 = mysqli_query($conexion , $query4);
        }

        if (isset($_POST['form_save_game_won'])) {
            $id_player_winner = $_POST['id_player_winner'];
            $id_game_winner = $_POST['id_game_winner'];
            $new_game_level = intval($_POST['new_game_level']) + 1;
            $new_game_count = intval($_POST['new_game_count']) + 1;
            $new_game_shot = intval($_POST['new_game_shot']) + 1;
            $new_game_shot_count = intval($_POST['new_game_shot_count']) - 1;
            $new_game_shot_count2 = intval($_POST['new_game_shot_count2']) - 1;
            $date_last_game = date('Y-m-d');

            if ($new_game_level > 3) {$new_game_level = 3;}

            $query5 = "UPDATE `game` SET `game_level` = $new_game_level, `last_shot` = '$date_last_game', `last_shot_status` = '1', `game_count` = $new_game_count, `game_shot` = $new_game_shot, `game_shot_count` = $new_game_shot_count, `game_shot_count2` = $new_game_shot_count2 WHERE id_participante = $id_player_winner and id_game = $id_game_winner";
            mysqli_query($conexion , $query5);

            $query6 = "INSERT INTO `creditos` (`ID_PARTICIPANTE`, `TIPO`, `CANTIDAD`, `FECHA`, `USUARIO`) VALUES ($id_player_winner, 'JUEGO', '3', '$date_last_game', 'SYSTEM');";
            mysqli_query($conexion , $query6);
        }
    
    }

    if (!isset($_GET['player'])) {
		if ($host == 'elrecreoesdetodos.com') {
			echo "<script language='javascript'>window.location='https://elrecreoesdetodos.com/'</script>;";
		}
    } elseif (isset($_GET['player'])) {

        //Starts Vars
        $id_game = '';
        $game_level = '';
        $game_start = '';
        $game_end = '';
        $last_shot = '';
        $last_shot_status = '';
        $game_count = '';
        $game_shot = '';
        $game_shot_count = '';
        $game_shot_count2 = '';

        $id_player = $_GET['player'];

        $query1="SELECT COUNT(id_participante) as exist_player FROM `game` where id_participante = $id_player";
        $query2="SELECT * FROM `game` where id_participante = $id_player";
        $query3="SELECT SUM(CANTIDAD) as nCreditos FROM `creditos` WHERE TIPO = 'JUEGO' and id_participante = $id_player";

        $consulta1 = mysqli_query($conexion , $query1);
        $consulta2 = mysqli_query($conexion , $query2);
        $consulta3 = mysqli_query($conexion , $query3);

        // Inserta registro de nuevo jugador
        if ($consulta1) {
            
            $datos1 = mysqli_fetch_assoc($consulta1);
            $exist_player = $datos1['exist_player'];

            //Si no existe el usuario
            if ($exist_player == 0) {

                if (date("D")=="Mon"){
                    $week_start = date("Y-m-d");
                } else {
                    $week_start = date("Y-m-d", strtotime('last Monday', time()));
                }
                if (date('D')=='Sun') {
                    $week_end = date('Y-m-d');
                } else {
                    $week_end = date('Y-m-d', strtotime('next Sunday', time()));
                }

                $player_start = date("Y-m-d");

                $new_player ="INSERT INTO `game` (`id_participante`, `game_level`, `date_start`, `date_end`, `last_shot`, 
                `last_shot_status`, `game_count`, `game_shot`, `game_shot_count`, `game_shot_count2`) 
                VALUES ($id_player , '1', '$week_start', '$week_end', '$player_start', '0', '0', '0', '2', '3');";
                
                if (mysqli_query($conexion , $new_player)) {
                    $text_msj = "Nuevo jugador registrado con exito";
                }

                $query2b="SELECT * FROM `game` where id_participante = $id_player";
                $consulta2b = mysqli_query($conexion , $query2b);

                if ($consulta2b) {
                    //Load user data into vars
                    $datos2b = mysqli_fetch_assoc($consulta2b);
                    $id_game = $datos2b['id_game'];
                    $game_level = $datos2b['game_level'];
                    $game_start = $datos2b['date_start'];
                    $game_end = $datos2b['date_end'];
                    $last_shot = $datos2b['last_shot'];
                    $last_shot_status = $datos2b['last_shot_status'];
                    $game_count = $datos2b['game_count'];
                    $game_shot = $datos2b['game_shot'];
                    $game_shot_count = $datos2b['game_shot_count'];
                    $game_shot_count2 = $datos2b['game_shot_count2'];
                    $custom_day = date('Y-m-d');
                }
            } 
            
            //Si Existe el usuario
            if ($exist_player == 1) {
                
                // Consulta la informacion del juego asociada al jugador
                if ($consulta2) {

                    $datos2 = mysqli_fetch_assoc($consulta2);

                    //Load user data into vars
                    $id_game = $datos2['id_game'];
                    $game_level = $datos2['game_level'];
                    $game_start = $datos2['date_start'];
                    $game_end = $datos2['date_end'];
                    $last_shot = $datos2['last_shot'];
                    $last_shot_status = $datos2['last_shot_status'];
                    $game_count = $datos2['game_count'];
                    $game_shot = $datos2['game_shot'];
                    $game_shot_count = $datos2['game_shot_count'];
                    $game_shot_count2 = $datos2['game_shot_count2'];
                    $custom_day = date('Y-m-d');

                    //Si la fecha se encuentra entre date_start y date_end
                    if ((strtotime($custom_day) >= strtotime($game_start)) && (strtotime($custom_day) <= strtotime($game_end))) {
                        $update_last_shot = "UPDATE `game` SET `last_shot` = '$custom_day' WHERE id_participante = $id_player and id_game = $id_game";
                        mysqli_query($conexion , $update_last_shot);
                    }

                    //Si la fecha de juego es mayor a la fecha final del rango semanal, 
                    //se realiza actualizacion de rangos nivel y contadores
                    if (strtotime($custom_day) > strtotime($game_end)) {

                        //Se realiza el recalculo del nuevo rango semanal que tendrá permitido el participante para jugar
                        if (date("D")=="Mon"){
                            $week_start = date("Y-m-d");
                        } else {
                            $week_start = date("Y-m-d", strtotime('last Monday', time()));
                        }
                        if (date('D')=='Sun') {
                            $week_end = date('Y-m-d');
                        } else {
                            $week_end = date('Y-m-d', strtotime('next Sunday', time()));
                        }

                        $reset_shots = "UPDATE `game` SET `game_level` = '1', `date_start` = '$week_start', `date_end` = '$week_end',
                        `last_shot` = '$custom_day', `last_shot_status` = '0', `game_shot` = '0', `game_shot_count` = '2', `game_shot_count2` = '3' 
                        WHERE id_participante = $id_player and id_game = $id_game";
                        mysqli_query($conexion , $reset_shots);
                        // echo $reset_shots;

                        $query2b="SELECT * FROM `game` where id_participante = $id_player";
                        $consulta2b = mysqli_query($conexion , $query2b);

                        if ($consulta2b) {
                            //Load user data into vars
                            $datos2b = mysqli_fetch_assoc($consulta2b);
                            $id_game = $datos2b['id_game'];
                            $game_level = $datos2b['game_level'];
                            $game_start = $datos2b['date_start'];
                            $game_end = $datos2b['date_end'];
                            $last_shot = $datos2b['last_shot'];
                            $last_shot_status = $datos2b['last_shot_status'];
                            $game_count = $datos2b['game_count'];
                            $game_shot = $datos2b['game_shot'];
                            $game_shot_count = $datos2b['game_shot_count'];
                            $game_shot_count2 = $datos2b['game_shot_count2'];
                            $custom_day = date('Y-m-d');
                        }
                    }
                }
            }
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


<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Reta tu memoria</title>
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" media="(max-width: 1024px) or (orientation: portrait)" href="css/verticalWindows.css" />
        <!-- <link rel="stylesheet" media="(min-width: 1280px) and (max-width: 1400px) and (orientation: landscape)" href="css/mediumWindows.css" /> -->
        <!-- <link rel="stylesheet" media="(min-width: 1024px) and (max-width: 1280px) and (orientation: landscape)" href="css/smallWindows.css" /> -->
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
                    <div class="well well-sm hidden-xs" style="font-size:20px; color:#333333">Total créditos ganados: <?php echo $nCreditos;?></div>
                    <div class="well well-sm hidden-xs" style="font-size:20px; color:#333333">Nivel del juego: <?php echo $game_level;?></div>
                    <div class="well well-sm hidden-xs" style="font-size:20px; color:#333333">Intentos restantes: <?php echo $game_shot_count2;?></div>
                </div>
                <div class="col-md-8 col-xs-12">
                    <div id="wrapper" class="wrapper"></div>
                    <input type="hidden" id="user_level_game" value="<?php echo $game_level; ?>">
                </div>
            </div>
            <hr class="visible-xs">
            <div class="row">
                <div class="col-xs-12 visible-xs" style="margin-top:20px;">
                    <div class="well well-sm" style="font-size:20px; color:#333333">Total créditos ganados: <?php echo $nCreditos;?></div>
                    <div class="well well-sm" style="font-size:20px; color:#333333">Nivel del juego: <?php echo $game_level;?></div>
                    <div class="well well-sm" style="font-size:20px; color:#333333">Intentos realizados: <?php echo $game_count;?></div>
                </div>
            </div>

            <form action="index.php?player=<?php echo $id_player ?>" method="post" id="save_game_won">
                <input type="hidden" name="form_save_game_won" value="1">
                <input type="hidden" name="id_player_winner" value="<?php echo $id_player; ?>">
                <input type="hidden" name="id_game_winner" value="<?php echo $id_game; ?>">
                <input type="hidden" name="new_game_level" value="<?php echo $game_level; ?>">
                <input type="hidden" name="new_game_count" value="<?php echo $game_count; ?>">
                <input type="hidden" name="new_game_shot" value="<?php echo $game_shot; ?>">
                <input type="hidden" name="new_game_shot_count" value="<?php echo $game_shot_count; ?>">
                <input type="hidden" name="new_game_shot_count2" value="<?php echo $game_shot_count2; ?>">
            </form>

            <form action="index.php?player=<?php echo $id_player ?>" method="POST" id="save_game_over">
                <input type="hidden" name="form_save_game_over" value="1">
                <input type="hidden" name="id_player_over" value="<?php echo $id_player; ?>">
                <input type="hidden" name="id_game_over" value="<?php echo $id_game; ?>">
                <input type="hidden" name="new_game_count" value="<?php echo $game_count; ?>">
                <input type="hidden" name="new_game_shot" value="<?php echo $game_shot; ?>">
                <input type="hidden" name="new_game_shot_count" value="<?php echo $game_shot_count; ?>">
                <input type="hidden" name="new_game_shot_count2" value="<?php echo $game_shot_count2; ?>">
            </form>

        </div>

        <!-- MODAL INICIAL ELEGIR DIFICULTAD -->
        <div id="modal" class="modalDialog">
            <div class="modal-content">
                <div class="modal-header">
                    <img class="modal-img-header" src="img/logo.png">
                </div>
                <div id="modal-body" class="modal-body">
                    <?php

                        if ($game_shot_count2 == 0) {$color_texto = '#ac1818'; $btn_color = 'btn-danger'; $btn_txt_color = '#ffffff';}
                        if ($game_shot_count2 == 1) {$color_texto = '#ec971f'; $btn_color = 'btn-warning'; $btn_txt_color = '#303030';}
                        if ($game_shot_count2 == 2) {$color_texto = '#2c7ea1'; $btn_color = 'btn-info'; $btn_txt_color = '#ffffff';}
                        if ($game_shot_count2 == 3) {$color_texto = '#5cb85c'; $btn_color = 'btn-success'; $btn_txt_color = '#ffffff';}
                        
                        //cuando no tiene ningun juego inicializado (Perdido o ganado)
                        if ($last_shot_status == 0) {
                            echo '
                                <h2 style="font-size:30px;">Tetra Pak&reg;</h2>
                                <h3>Reta tu memoria</h3>
                                <p style="font-size:18px;">Nivel <strong>'.$game_level.'</strong> - Te quedan <strong style="color:'.$color_texto.'">'.$game_shot_count2.'</strong> intentos.</p>
                            ';
                            if ($game_shot_count2 == 0) {
                                echo '
                                    <p class="text-danger" style="font-size:20px"><strong>Has alcanzado el límite de intentos por semana</strong></p>
                                    <a href="https://elrecreoesdetodos.com/dashboard/index.php/participante/juego" class="btn btn-info btn-lg" style="font-size: 18px;">Regresar a mi cuenta <i class="fa fa-user"></i></a>
                                ';
                            }
                            if ($game_shot_count2 > 0) {
                                echo '
                                    <div id="dificultadBtn">
                                        <button type="submit" id="start" class="btn '.$btn_color.' btn-lg" style="font-size: 18px; color:'.$btn_txt_color.'">Iniciar Juego <i class="fa fa-gamepad"></i> </button>
                                        <a href="https://elrecreoesdetodos.com/dashboard/index.php/participante/juego" class="btn btn-info btn-lg" style="font-size: 18px;">Regresar a mi cuenta <i class="fa fa-user"></i></a>
                                    </div>
                                    <p class="text-secondary" style="margin-top:15px">Al iniciar el juego se descontará un intento.</p>
                                ';
                            }
                        }

                        //Cuando tiene un juego inicializado como ganado.
                        if ($last_shot_status == 1) {
                            echo '
                                <h2 style="font-size:30px;">¡Felicidades!</h2>
                                <h3>Has superado el nivel '.($game_level - 1).'</h3>
                                <h3>Has ganado <span style="font-size:20px; color:#5CB85C;"><strong>3</strong></span> nuevos créditos</h3>
                                <p style="font-size:18px;">Te quedan <strong style="color:'.$color_texto.'">'.$game_shot_count2.'</strong> intentos.</p>
                                <img src="img/emogis/020-cool-1.png" style="margin: 20px" width="70" height="70">
                            ';
                            if ($game_shot_count2 == 0) {
                                echo '
                                    <p class="text-danger" style="font-size:20px"><strong>Has alcanzado el límite de intentos por semana</strong></p>
                                    <a href="https://elrecreoesdetodos.com/dashboard/index.php/participante/juego" class="btn btn-info btn-lg" style="font-size: 18px;">Regresar a mi cuenta <i class="fa fa-user"></i></a>
                                    <p style="font-size:18px; margin-top: 15px;">Regresa de nuevo la próxima semana para tener<br>más intentos y nuevas oportunidades de ganar créditos.</p>
                                ';
                            } elseif ($game_shot_count2 > 0) {
                                echo '
                                    <div id="dificultadBtn">
                                        <button type="submit" id="start" class="btn '.$btn_color.' btn-lg" style="font-size: 18px; color:'.$btn_txt_color.'">Iniciar siguiente Juego <i class="fa fa-gamepad"></i> </button>
                                        <a href="https://elrecreoesdetodos.com/dashboard/index.php/participante/juego" class="btn btn-info btn-lg" style="font-size: 18px;">Regresar a mi cuenta <i class="fa fa-user"></i></a>
                                    </div>
                                    <p class="text-secondary" style="margin-top:15px">Al iniciar el juego se descontará un intento.</p>
                                ';
                            }
                            $reset_shots_status = "UPDATE `game` SET `last_shot_status` = '0' WHERE id_participante = $id_player and id_game = $id_game";
                            mysqli_query($conexion , $reset_shots_status);
                        }

                        //Cuando tiene un juego inicializado como perdido.
                        if ($last_shot_status == 2) {
                            echo '
                                <h2 style="font-size:30px;">¡Lo sentimos!</h2>
                                <h3 class="text-danger">Alcanzaste el tiempo límite.</h3>
                                <h3>Te quedan <span style="font-size:20px; color:#AC1818;"><strong>'.$game_shot_count2.'</strong></span> intentos esta semana.</h3>
                                <img src="img/emogis/085-sad.png" style="margin: 20px" width="70" height="70">
                            ';
                            if ($game_shot_count2 == 0) {
                                echo '
                                    <p class="text-danger" style="font-size:20px"><strong>Has alcanzado el límite de intentos por semana</strong></p>
                                    <a href="https://elrecreoesdetodos.com/dashboard/index.php/participante/juego" class="btn btn-info btn-lg" style="font-size: 18px;">Regresar a mi cuenta <i class="fa fa-user"></i></a>
                                ';
                            } elseif ($game_shot_count2 > 0) {
                                echo '
                                    <div id="dificultadBtn">
                                        <button type="submit" id="start" class="btn '.$btn_color.' btn-lg" style="font-size: 18px; color:'.$btn_txt_color.'">Nuevo intento <i class="fa fa-gamepad"></i> </button>
                                        <a href="https://elrecreoesdetodos.com/dashboard/index.php/participante/juego" class="btn btn-info btn-lg" style="font-size: 18px;">Regresar a mi cuenta <i class="fa fa-user"></i></a>
                                    </div>
                                    <p class="text-secondary" style="margin-top:15px">Al iniciar el juego se descontará un intento.</p>
                                ';
                            }
                            $reset_shots_status = "UPDATE `game` SET `last_shot_status` = '0' WHERE id_participante = $id_player and id_game = $id_game";
                            mysqli_query($conexion , $reset_shots_status);
                        }
                    ?>
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