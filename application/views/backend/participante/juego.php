
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">


                  <?php

                 $ID_PARTICIPANTE = $this->session->userdata('login_user_id');
                 echo $ID_PARTICIPANTE

                

              ?>

               <a href="http://localhost/recreo-dev/parejas-memoria/juego2.php?variable1=valor1&variable2=valor2">Mi enlace</a>

            <a href="http://localhost/recreo-dev/parejas-memoria/juego2.php?.$idparticipantes">Mi enlace</a>

                 <a href="<?php echo site_url('hola'); ?>">
                            <span>JUGAR</span>
                </a>
           
            </div>
        </div>
    </div>
</div>


