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
                   ?>

        <a  style='width:150px; height:30px' href="<?php if($row['id_pais'] == 'CO'){echo "https://api.whatsapp.com/send?phone=+573229341371";}
          elseif ($row['id_pais'] == 'EC') {echo "https://api.whatsapp.com/send?phone=+5930986704692";}
            elseif ($row['id_pais'] == 'PE') {echo "https://api.whatsapp.com/send?phone=+51902030519";}
            ?> " type="button" class="btn btn-green btn-icon"> ENVIAR FACTURA
            <i class="entypo-list"></i>
          </a>


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

      <img src="<?php echo base_url('uploads/whatsapp/premios-tipo-c.jpg');?>"/>

		</div>
	</div>
</div>



      <center>	</center>
