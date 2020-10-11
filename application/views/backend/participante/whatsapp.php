<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">

      <center> <h1>Para registrar tus compras envia una foto de tu factura a  nuestro whatsapp</h1></center>  <br><br>


      <center>


        <?php
                        $count=1;
                        $ID_PARTICIPANTE = $this->session->userdata('login_user_id');

                        $query = "SELECT  id_pais  from participantes where ID_PARTICIPANTE = $ID_PARTICIPANTE ";
                        $query = $this->db->query($query);
                        $data = $query->result_array();
                        foreach($data as $row):

                        $url_ws = '';
                        if ($row['id_pais'] == 'CO') {$url_ws = "https://api.whatsapp.com/send?phone=+573229341371";}
                        elseif ($row['id_pais'] == 'EC') {$url_ws = "https://api.whatsapp.com/send?phone=+5930986704692";}
                        elseif ($row['id_pais'] == 'PE') {$url_ws = "https://api.whatsapp.com/send?phone=+51902030519";}
                        else {$url_ws = "https://api.whatsapp.com/send?phone=+573229341371";}
                   ?>

                      <a  style='width:150px; height:30px' href="<?php echo $url_ws ?>" type="button" class="btn btn-green btn-icon">Registrar factura<i class="fa fa-whatsapp"></i></a>


            <?php endforeach;?>
          </center>
		</div>
	</div>
  <br>

  <hr style="border-color: #033f88;">

	<div class="row">
		<div class="col-md-4">

		<img src="<?php echo base_url('uploads/whatsapp/premios-playstation4.jpg');?>"/>

		</div>


		<div class="col-md-4">

      <img src="<?php echo base_url('uploads/whatsapp/premios-netflix_spotify.jpg');?>"/>

		</div>

		<div class="col-md-4">

      <img src="<?php echo base_url('uploads/whatsapp/premios-android.jpg');?>"/>

		</div>
	</div>
</div>