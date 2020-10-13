
      <?php 
        $participante	= $this->db->select('*');
        $participante	= $this->db->from('participantes');
        $participante	= $this->db->where("ID_PARTICIPANTE",$this->session->userdata('login_user_id'));
        $participante	= $this->db->get()->result_array();

        foreach($participante as $row):?>

<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">   
            <div class="modal-body">
                <div  class="modal-body mb-0 p-0">
                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                        <?php  if ($row['ID_PAIS'] == "CO") { ?>
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/0zrb-0BhrWU"  allowfullscreen></iframe>                   
                        <?php }  elseif ($row['ID_PAIS'] == "EC") {?>
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=zL1awpJ4pg0"  allowfullscreen></iframe>                   
                        <?php }   elseif ($row['ID_PAIS'] == "PE") {?>
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=sLCUs_8y8i"  allowfullscreen></iframe>                   
                        <?php }  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                       
       <?php  if ($row['ID_PAIS'] == "CO") { ?>     
            <p><a id="yt" title="" href="https://www.youtube.com/watch?v=0zrb-0BhrWU&feature=emb_logo&ab_channel=ELRECREOESDETODOS"></a></p>
       <?php }  elseif ($row['ID_PAIS'] == "EC") {?>
            <p><a id="yt" title="" href="https://www.youtube.com/watch?v=zL1awpJ4pg0&feature=youtu.be&ab_channel=ELRECREOESDETODOS"></a></p>        
       <?php }   elseif ($row['ID_PAIS'] == "PE") {?>
            <p><a id="yt" title="" href="https://www.youtube.com/watch?v=sLCUs_8y8iY&feature=youtu.be&ab_channel=ELRECREOESDETODOS"></a></p>
        <?php }  ?>

                    
  

<!--<div class="container-fluid" style="border-style: solid; border-color: #02336e; border-width: 15px;">-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <img class="img-responsive center-block" src="<?php echo base_url('uploads/logo.png');?>" >
                            <div class="row">
                                <div class="col-md-12"> <br>
                                <img class="img-responsive center-block" src="<?php echo base_url('uploads/inicio/familia_inicio.jpg');?>" >

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

		        <div class="col-md-6">			
                    <?php  if ($row['ID_PAIS'] == "CO") { ?>

                    <img class="img-responsive center-block" src="<?php echo base_url('uploads/inicio/texto_1.png');?>" >  <?php }  
                    elseif ($row['ID_PAIS'] == "EC") {?>

                    <img class="img-responsive center-block" src="<?php echo base_url('uploads/inicio/texto_1_ecuador.png');?>" > <?php }  
                    elseif ($row['ID_PAIS'] == "PE") {?>

                    <img class="img-responsive center-block" src="<?php echo base_url('uploads/inicio/texto_1_peru.png');?>" ><?php }  ?>                    
                    <img style="margin-bottom: 10px;"class="img-responsive center-block" src="<?php echo base_url('uploads/inicio/premios-bienvenida_2celulares.jpg');?>" >
                    <img class="img-responsive center-block"src="<?php echo base_url('uploads/inicio/texto3.png');?>" >        
                </div>
            </div>
        </div>

<?php endforeach;?>

            <script>
                $(window).on('load',function(){
                    var delayMs = 1000; // delay in milliseconds
                    setTimeout(function(){
                        $('#myModal').modal('show');
                    }, delayMs);
                });    
            </script>
