<?php
    $id_participante = $this->session->userdata('login_user_id');
    $query0 = "SELECT * FROM `participantes` WHERE ID_PARTICIPANTE = $id_participante";
    $query0 = $this->db->query($query0);
    $data0 = $query0->result_array();
    foreach ($data0 as $row0) {$countryUser = $row0['ID_PAIS'];}

    if ($countryUser == 'CO') {
        $img1 = 'https://i1.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/texto_5-1.png?w=315&ssl=1';
        $img2 = 'https://i2.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/texto_6-1.png?fit=274%2C55&ssl=1';
        $img3 = 'https://i0.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/texto_7.png?w=304&ssl=1';
    } 
    if ($countryUser == 'EC') {
        $img1 = 'https://i2.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/texto_5_ecuador.png?w=315&ssl=1';
        $img2 = 'https://i2.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/texto_6_ecuador.png?fit=274%2C55&ssl=1';
        $img3 = 'https://i1.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/texto_7_ecuador.png?w=304&ssl=1';
    }
    if ($countryUser == 'PE') {
        $img1 = 'https://i2.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/texto_5_peru.png?w=315&ssl=1';
        $img2 = 'https://i0.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/texto_6_peru.png?fit=274%2C55&ssl=1';
        $img3 = 'https://i1.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/texto_7_peru.png?w=304&ssl=1';
    }
?>
<h1 class="text-center" style="color: #0050B0">PREMIOS</h1>
<hr>
<div class="row">
    <div class="col-md-4 text-center">
        <img class="img-responsive center-block" style="margin-bottom: 10px;" src="https://i2.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/texto_2-2.png?w=325&ssl=1" alt="">
        <img class="img-responsive center-block" style="margin-bottom: 10px;" src="https://i0.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/premios-playstation4.jpg?w=324&ssl=1" alt="">
        <img class="img-responsive center-block" style="margin-bottom: 10px;" src="<?php echo $img1;?>" alt="">
        <p style="font-size:16px;">Próximamente</p>
        <button class="btn btn-lg btn-blue disabled" style="font-size:20px; margin: 10px 0px; width:250px" data-toggle="modal" data-target="#myModal1">VER RANKING <i class="fa fa-trophy"></i></button>
        <p style="font-size:14px;">Sigue acumulando compras para participar por este premio</p>
    </div>
    <div class="col-md-4 text-center" style="padding-top: 10px; background-color: #75BEE9;">
        <img class="img-responsive center-block" style="margin-bottom: 10px;" src="https://i1.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/texto_3-1.png?w=326&ssl=1" alt="">
        <img class="img-responsive center-block" style="margin-bottom: 10px;" src="https://i0.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/premios-netflix_spotify.jpg?w=324&ssl=1" alt="">
        <img class="img-responsive center-block" style="margin-bottom: 10px;" src="<?php echo $img2;?>" alt="">
        <a href="<?php echo site_url('/participante/redimir') ?>" class="btn btn-lg btn-blue" style="font-size:20px; margin: 30px 0px; width:250px">REDIMIR PREMIOS <i class="fa fa-tags"></i></a href="#">
    </div>
    <div class="col-md-4 text-center">
        <img class="img-responsive center-block" style="margin-bottom: 10px;" src="https://i2.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/texto_4-1.png?w=325&ssl=1" alt="">
        <img class="img-responsive center-block" style="margin-bottom: 10px;" src="https://i0.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/Premios-tipo-C.jpg?w=340&ssl=1" alt="">
        <img class="img-responsive center-block" style="margin-bottom: 10px;" src="<?php echo $img3;?>" alt="">
        <a href="<?php echo site_url('/participante/redimir') ?>" class="btn btn-lg btn-blue" style="font-size:20px; margin: 10px 0px; width:250px">REDIMIR PREMIOS <i class="fa fa-tags"></i></a href="#">
    </div>
</div>