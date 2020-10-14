<?php
$id_participante = $this->session->userdata('login_user_id');

$query = "SELECT sum(CANTIDAD) as nCreditos FROM `creditos` WHERE id_participante = $id_participante";
$query = $this->db->query($query);
$data = $query->result_array();

$query2 = "SELECT sum(CANTIDAD) as nCanjes FROM `canjes` WHERE ID_PARTICIPANTE = $id_participante";
$query2 = $this->db->query($query2);
$data2 = $query2->result_array();

$query3 = "SELECT * FROM `codigos` where TIPO_CODIGO = 'JUEGO' and LAST = 1 and ID_PARTICIPANTE = $id_participante";
$query3 = $this->db->query($query3);
$data3 = $query3->result_array();
$data3b = $query3->num_rows();

$query4 = "SELECT * FROM `canjes` WHERE TIPO_CANJE = 'NETFLIX' and ID_PARTICIPANTE = $id_participante ORDER BY `canjes`.`FECHA` DESC LIMIT 1";
$query4 = $this->db->query($query4);
$data4 = $query4->result_array();
$data4b = $query4->num_rows();

$query5 = "SELECT * FROM `canjes` WHERE TIPO_CANJE = 'SPOTIFY' and ID_PARTICIPANTE = $id_participante ORDER BY `canjes`.`FECHA` DESC LIMIT 1";
$query5 = $this->db->query($query5);
$data5 = $query5->result_array();
$data5b = $query5->num_rows();


foreach ($data as $row) {
    $nCreditos = $row['nCreditos'];
}
foreach ($data2 as $row2) {
    $nCanjes = $row2['nCanjes'];
}
foreach ($data3 as $row3) {
    $lCodigo = $row3['CODIGO'];
}
if ($data3b >= 1) {
    foreach ($data3 as $row3) {
        $lCodigo = $row3['CODIGO'];
    }
} else {
    $lCodigo = 'Aún no tienes PINES para juegos';
}
if ($data4b >= 1) {
    foreach ($data4 as $row4) {
        $netflix_request_status = $row4['STATUS'];
    }
} else {
    $netflix_request_status = 'Sin Solicitudes activas';
}
if ($data5b >= 1) {
    foreach ($data5 as $row5) {
        $spotify_request_status = $row5['STATUS'];
    }
} else {
    $spotify_request_status = 'Sin Solicitudes activas';
}



if (($nCreditos - $nCanjes) < 6) {
    $btn = '<button class="btn btn-primary btn-lg btn-icon disabled" style="margin-bottom:10px;" disabled>Redimir nuevo Código <i class="fa fa-gamepad"></i></button>';
} elseif (($nCreditos - $nCanjes) >= 6) {
    $btn = '<button class="btn btn-success btn-lg btn-icon" style="margin-bottom:20px;">Redimir nuevo Código <i class="fa fa-gamepad"></i></button>';
}
if (($nCreditos - $nCanjes) < 36) {
    $btn2 = '<button class="btn btn-primary btn-lg btn-icon disabled" style="margin-bottom:10px;" disabled>Solicitar nuevo PIN de Netflix <i class="fa fa-tags"></i></button>';
    $btn3 = '<button class="btn btn-primary btn-lg btn-icon disabled" style="margin-bottom:10px;" disabled>Solicitar nuevo PIN de Spotify <i class="fa fa-tags"></i></button>';
} elseif (($nCreditos - $nCanjes) >= 6) {
    $btn2 = '<button class="btn btn-danger btn-lg btn-icon" style="margin-bottom:20px;">Solicitar nuevo PIN de Netflix <i class="fa fa-tags"></i></button>';
    $btn2 = '<button class="btn btn-success btn-lg btn-icon" style="margin-bottom:20px;">Solicitar nuevo PIN de Spotify <i class="fa fa-tags"></i></button>';
}
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="well bg-success">
            <h3 class="text-center">Pines para juegos Android <i class="fa fa-android"></i></h3>
            <p style="font-size:20px; margin-bottom: 30px;" class="text-center">
                Redime tus créditos por pines de descarga para juegos Android.<br>
                <a href="https://elrecreoesdetodos.com/app/XONE-Tetrapak_v1.1.0.apk" target="_blank" class="text-info"><u>Descarga nuestra galeria </u></a> en tu celular, ingresa el PIN y elige el juego.
            </p>
            <?php echo form_open(site_url('participante/redimir_pin/game/' . $id_participante), array('enctype' => 'multipart/form-data')); ?>
            <div class="text-center">
                <input type="hidden" name="lcode_game" value="<?php echo $lCodigo ?>">
                <?php
                    echo '
                        <h4 style="margin-bottom:15px;">Créditos necesarios: <span style="padding: 4px; font-size:20px; line-height:0px;"><u>6</u></span> - 
                        Tus créditos disponibles: <span style="padding: 4px; font-size:20px; line-height:0px;"><u>' . ($nCreditos - $nCanjes) . '</u></span></h4>
                        <p>Tu último PIN redimido fue:<br><strong class="text-danger" style="font-size:20px;"><u>' . $lCodigo . '</u></strong></p><br>
                    ';
                    echo $btn;
                ?>
            </div>
            <?php echo form_close(); ?>
        
            <p class="text-center">
                * Para hacer uso de los códigos es necesaria nuestra aplicacion para dispositivos Android.<br>
                * Cada PIN le permitirá descargar e instalar un solo juego de nuestra galería de juegos.<br>
                * Para redimir un PIN necesitas tener en tu cuenta mínimo 6 créditos los cuales serán descontados de tu total acumulado.
            </p>
        </div>

        <div class="well bg-danger">
            <h3 class="text-center">Pines para Netflix <i class="fa fa-tags"></i></h3>
            <p style="font-size:20px; margin-bottom: 30px;" class="text-center">
                Con tus créditos podrás solicitar pines para Netflix.<br>Estos te serán acreditados en un plazo máximo de hasta 72 horas
            </p>
            <?php echo form_open(site_url('participante/redimir_pin/netflix/' . $id_participante), array('enctype' => 'multipart/form-data')); ?>
            <div class="text-center">
                <input type="hidden" name="netflix_request" value="<?php echo $id_participante ?>">
                <?php
                    echo '
                        <h4 style="margin-bottom:15px;">Créditos necesarios: <span style="padding: 4px; font-size:20px; line-height:0px;"><u>36</u></span> - 
                        Tus créditos disponibles: <span style="padding: 4px; font-size:20px; line-height:0px;"><u>' . ($nCreditos - $nCanjes) . '</u></span></h4>
                        <p>Tu última solicitud ha sido:<br><strong class="text-danger" style="font-size:20px;"><u>' . $netflix_request_status . '</u></strong></p><br>
                    ';
                    echo $btn2;
                ?>
            </div>
            <?php echo form_close(); ?>
            <p class="text-center">
                * Cada solicitud será atendida en un plazo máximo de hasta 72 horas despues de la solicitud.<br>
                * Para redimir un PIN necesitas tener en tu cuenta mínimo 36 créditos los cuales serán descontados de tu total acumulado.
            </p>
        </div>

        <div class="well bg-success">
            <h3 class="text-center">Pines para Spotify <i class="fa fa-tags"></i></h3>
            <p style="font-size:20px; margin-bottom: 30px;" class="text-center">
                Con tus créditos podrás solicitar pines para Spotify.<br>Estos te serán acreditados en un plazo máximo de hasta 72 horas
            </p>
            <?php echo form_open(site_url('participante/redimir_pin/spotify/' . $id_participante), array('enctype' => 'multipart/form-data')); ?>
            <div class="text-center">
                <input type="hidden" name="spotify_request" value="<?php echo $id_participante ?>">
                <?php
                    echo '
                        <h4 style="margin-bottom:15px;">Créditos necesarios: <span style="padding: 4px; font-size:20px; line-height:0px;"><u>36</u></span> - 
                        Tus créditos disponibles: <span style="padding: 4px; font-size:20px; line-height:0px;"><u>' . ($nCreditos - $nCanjes) . '</u></span></h4>
                        <p>Tu última solicitud ha sido:<br><strong class="text-danger" style="font-size:20px;"><u>' . $spotify_request_status . '</u></strong></p><br>
                    ';
                    echo $btn3;
                ?>
            </div>
            <?php echo form_close(); ?>
            <p class="text-center">
                * Cada solicitud será atendida en un plazo máximo de hasta 72 horas despues de la solicitud.<br>
                * Para redimir un PIN necesitas tener en tu cuenta mínimo 36 créditos los cuales serán descontados de tu total acumulado.
            </p>
        </div>
    </div>
</div>
