
<div class="row">
    <div class="col-md-6 col-md-offset-3 well">
        <h3 class="text-center">!RETA A TU MEMORIA Y GANA MÁS CREDITOS CON NUESTRO JUEGO! <i class="fa fa-gamepad text-info"></i></h3>
        <p style="font-size:20px; margin-bottom: 30px;" class="text-center">
            Lo único que debes hacer es prestar mucha atención a las diferentes imágenes de los productos en envase Tetra Pak&reg; y formar las parejas correspondientes.<br>
           
            Recuerda que podrás jugar un maximo de 3 veces por semana, para acumular un total de 9 creditos adicionales.
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

            ?>

               
            <div class="text-center">
                <input type="hidden" name="lcode_game" value="<?php echo $lCodigo ?>">
                <?php 
                    echo '<h4 style="margin-bottom:15px;"> Tus créditos disponibles: <span style="padding: 4px; font-size:20px; line-height:0px;"><u>'.($nCreditos - $nCanjes).'</u></span></h4>';
                 
                    echo $btn;
                ?>

                <h3 class="text-center">¿Preparado?... ¡Vamos, muéstranos de que estas hecho!<i class="text-primary"></i></h3>

             <a href="<?php echo base_url('parejas-memoria/index.php?player='.$id_participante);?>" class="btn btn-success btn-lg btn-icon text-center" style="margin-bottom:10px;" >JUGAR<i class="fa fa-gamepad"></i></a>

            </div>

        
        <p class="text-center">
            * Para hacer uso de los códigos es necesaria nuestra aplicacion para dispositivos Android.<br>
            * Cada PIN le permitirá descargar e instalar un solo juego de nuestra galería de juegos.<br>
            * Para redimir un PIN necesitas tener en tu cuenta mínimo 6 créditos los cuales serán descontados de tu total acumulado.
        </p>
    </div>
</div>