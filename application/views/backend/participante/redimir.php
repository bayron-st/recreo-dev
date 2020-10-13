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

foreach ($data as $row) {
    $nCreditos = $row['nCreditos'];
}
foreach ($data2 as $row2) {
    $nCanjes = $row2['nCanjes'];
}
foreach ($data3 as $row3) {
    $lCodigo = $row3['CODIGO'];
}

if (($nCreditos - $nCanjes) < 6) {
    $btn = '<button class="btn btn-primary btn-lg btn-icon disabled" style="margin-bottom:10px;" disabled>Redimir nuevo Código <i class="fa fa-gamepad"></i></button>';
} elseif (($nCreditos - $nCanjes) >= 6) {
    $btn = '<button class="btn btn-success btn-lg btn-icon" style="margin-bottom:20px;">Redimir nuevo Código <i class="fa fa-gamepad"></i></button>';
}

if ($data3b >= 1) {
    foreach ($data3 as $row3) {
        $lCodigo = $row3['CODIGO'];
    }
} else {
    $lCodigo = 'Aún no tienes PINES para juegos';
}

?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="well bg-success">
            <h3 class="text-center">Pines para juegos Android <i class="fa fa-android text-success"></i></h3>
            <p style="font-size:20px; margin-bottom: 30px;" class="text-center">
                Redime tus créditos por pines de descarga para juegos Android.<br>
                <a href="https://elrecreoesdetodos.com/app/XONE-Tetrapak_v1.1.0.apk" target="_blank" class="text-info"><u>Descarga nuestra galeria </u></a> en tu celular, ingresa el PIN y elige el juego.
            </p>
            <?php echo form_open(site_url('participante/redimir_game/game/' . $id_participante), array('enctype' => 'multipart/form-data')); ?>
            <div class="text-center">
                <input type="hidden" name="lcode_game" value="<?php echo $lCodigo ?>">
                <?php
                echo '<h4 style="margin-bottom:15px;">Código de usuario: <span style="padding: 4px; font-size:20px; line-height:0px;"><u>' . $id_participante . '</u></span> - 
                        Tus créditos disponibles: <span style="padding: 4px; font-size:20px; line-height:0px;"><u>' . ($nCreditos - $nCanjes) . '</u></span></h4>';
                echo '<p>Tu último PIN redimido fue:<br><strong class="text-danger" style="font-size:20px;"><u>' . $lCodigo . '</u></strong></p><br>';
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

        <div class="well bg-warning">
            <h3 class="text-center">Pines para Netflix y Spotify</h3>
            <p style="font-size:20px; margin-bottom: 30px;" class="text-center">
                Próximamente podrás redimir tus créditos por pines para Netflix y Spotify.<br>
                Estos te serán acreditados en un plazo máximo de hasta 72 horas.
            </p>
        </div>
    </div>
</div>
