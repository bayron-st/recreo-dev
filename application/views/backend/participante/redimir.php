
<div class="row">
    <div class="col-md-6 col-md-offset-3 well">
        <h3 class="text-center">Códigos para juegos Android</h3>
        <p style="font-size:20px;" class="text-justify">
            Si tienes sufucientes créditos puedes usarlos para redimirlos por códigos y usarlos en nuestra app Store<br>
            Descargar nuetra app desde este link y sigue los pasos para ingresar tu código y disfrutar nuestros juegos.
        </p>

            <?php
                
                $id_participante = $this->session->userdata('login_user_id');

                $query = "SELECT sum(CANTIDAD) as nCreditos FROM `creditos` WHERE id_participante = $id_participante";
                $query = $this->db->query($query);
                $data = $query->result_array();

                $query2 = "SELECT sum(CANTIDAD) as nCanjes FROM `canjes` WHERE ID_PARTICIPANTE = $id_participante";
                $query2= $this->db->query($query2);
                $data2 = $query2->result_array();

                $query3 = "SELECT * FROM `codigos` where TIPO_CODIGO = 'JUEGO' and LAST = 1 and ID_PARTICIPANTE = $id_participante";
                $query3= $this->db->query($query3);
                $data3 = $query3->result_array();

                foreach ($data as $row) {if(isset($row['nCreditos'])){$nCreditos = $row['nCreditos'];} elseif(!isset($row['nCreditos'])){$nCreditos = 0;}}
                foreach ($data2 as $row2) {if(isset($row2['nCanjes'])){$nCanjes = $row2['nCanjes'];} elseif(!isset($row2['nCanjes'])){$nCanjes = 0;}}
                foreach ($data3 as $row3) {if(isset($row3['CODIGO'])){$lCodigo = $row3['CODIGO'];} elseif(!isset($row3['CODIGO'])){$lCodigo = 0;}}

                if ($nCreditos<6) {
                    $btn = '<button class="btn btn-blue btn-icon disabled" style="margin-bottom:10px;" disabled>Redimir nuevo Código <i class="fa fa-gamepad"></i></button>';
                } elseif ($nCreditos>=6) {
                    $btn = '<button class="btn btn-blue btn-icon" style="margin-bottom:20px;">Redimir nuevo Código <i class="fa fa-gamepad"></i></button>';
                }?>

                <?php echo form_open(site_url('participante/redimir_game/game/'.$id_participante) , array('enctype' => 'multipart/form-data'));?>
                    <div class="text-center">
                        <input type="hidden" name="lcode_game" value="<?php echo $lCodigo ?>">
                        <?php 
                            echo '<h4 style="margin-bottom:15px;">Usuario No: <span class="label label-primary">'.$id_participante.'</span> - Créditos disponibles: <span class="label label-primary">'.($nCreditos - $nCanjes).'</span></h4>';
                            echo '<p>Último codigo redimido: <strong>'.$lCodigo.'</strong></p><br>';
                            echo $btn;
                        ?>
                        <p>Para redimir este crédito necesitas 6 créditos los cuales se descontaran de tu total acumulado</p>
                    </div>
                <?php echo form_close();?>

  </div>
</div>