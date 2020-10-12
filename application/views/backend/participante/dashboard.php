
<html>
<head>
    <style>

        .modal-dialog {

            z-index: 10000000 !important;
        }

    </style>
    

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title></title>

                <script>
                    $(window).on('load',function(){
                        var delayMs = 1500; // delay in milliseconds

                        setTimeout(function(){
                            $('#myModal').modal('show');
                        }, delayMs);
                    });    
            </script>

<body>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Subscribe our Newsletter</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Subscribe to our mailing list to get the latest updates straight in your inbox.</p>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email Address">
                    </div>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>                <?php
                                  
                                  $participante	= $this->db->select('*');
                                  $participante	= $this->db->from('participantes');
                                  $participante	= $this->db->where("ID_PARTICIPANTE",$this->session->userdata('login_user_id'));

                                  $participante	= $this->db->get()->result_array();

                                  foreach($participante as $row):?>



<body>

       <?php  if ($row['ID_PAIS'] == "CO") { ?>

        <p><a id="yt" title="" href="https://www.youtube.com/watch?v=0zrb-0BhrWU&feature=emb_logo&ab_channel=ELRECREOESDETODOS"></a></p>
       
       <?php }  
        elseif ($row['ID_PAIS'] == "EC") {?>

        <p><a id="yt" title="" href="https://www.youtube.com/watch?v=zL1awpJ4pg0&feature=youtu.be&ab_channel=ELRECREOESDETODOS"></a></p>
                

        <?php }  
                elseif ($row['ID_PAIS'] == "PE") {?>

        <p><a id="yt" title="" href="https://www.youtube.com/watch?v=sLCUs_8y8iY&feature=youtu.be&ab_channel=ELRECREOESDETODOS"></a></p>

                <?php }  ?>
</body>
</html>


  

<!--<div class="container-fluid" style="border-style: solid; border-color: #02336e; border-width: 15px;">-->
<div class="container-fluid">

	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div align="center"class="col-md-12">
                    <img src="<?php echo base_url('uploads/logo.png');?>" >
					<div class="row">
						<div class="col-md-12"> <br>
                        <img src="<?php echo base_url('uploads/inicio/familia_inicio.jpg');?>" >

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
                <div align="center" class="col-md-12"> <br></BR>


                <?php  if ($row['ID_PAIS'] == "CO") { ?>

                    <img src="<?php echo base_url('uploads/inicio/texto_1.png');?>" >  <?php }  
                elseif ($row['ID_PAIS'] == "EC") {?>

                    <img src="<?php echo base_url('uploads/inicio/texto_1_ecuador.png');?>" > <?php }  
                        elseif ($row['ID_PAIS'] == "PE") {?>

                    <img src="<?php echo base_url('uploads/inicio/texto_1_peru.png');?>" ><?php }  ?>
                                
                
					<div class="row">
						<div class="col-md-12">
                        <img src="<?php echo base_url('uploads/inicio/premios-bienvenida_2celulares.jpg');?>" >
                        
                        <br><br><br><img src="<?php echo base_url('uploads/inicio/texto3.png');?>" >
                        
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php endforeach;?>