
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">


            <?php
                 $id_participante = $this->session->userdata('login_user_id');
            ?>

    <a href=" <?php echo 'http://localhost/recreo-dev/parejas-memoria/index.php?player='.$id_participante; ?>">JUGAR</a>

            </div>
        </div>
    </div>
</div>


