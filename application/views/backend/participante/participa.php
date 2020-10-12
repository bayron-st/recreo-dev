<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
                        <br><br>

                                <?php
                                  
                                  $participante	= $this->db->select('*');
                                  $participante	= $this->db->from('participantes');
                                  $participante	= $this->db->where("ID_PARTICIPANTE",$this->session->userdata('login_user_id'));

                                  $participante	= $this->db->get()->result_array();

                                  foreach($participante as $row):?>


                        
                    <center> <img  src="<?php echo base_url('uploads/participa/texto_1.png');?>" > </center> <br><br>
                    
                            <div class="col-md-12">

                    <?php  if ($row['ID_PAIS'] == "CO") { ?>
                             <iframe width="100%" height="350" src="https://www.youtube.com/embed/0zrb-0BhrWU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <?php }  elseif ($row['ID_PAIS'] == "EC") {?>
                             <iframe width="100%" height="350" src="https://www.youtube.com/embed/zL1awpJ4pg0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <?php }  elseif ($row['ID_PAIS'] == "PE") {?>       
                             <iframe width="100%" height="350" src="https://www.youtube.com/embed/sLCUs_8y8iY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <?php }  ?>      

                            </div>
					</div>
				</div>
			</div>
        </div>
        

		<div class="col-md-6">
			<div class="row">

            
               <center> <img  src="<?php echo base_url('uploads/participa/texto_2.png');?>" > </center> <br><br>
                    <div align="center" class="col-md-12">

                    <?php  if ($row['ID_PAIS'] == "CO") { ?>
                        <img src="<?php echo base_url('uploads/participa/texto_3.png');?>" >
                         <img src="<?php echo base_url('uploads/participa/texto_4.png');?>" >
                    <?php }  elseif ($row['ID_PAIS'] == "EC") {?>
                        <img src="<?php echo base_url('uploads/participa/texto_3_ecuador.png');?>" >
                         <img src="<?php echo base_url('uploads/participa/texto_4_ecuador.png');?>" >
                    <?php }  elseif ($row['ID_PAIS'] == "PE") { ?>       
                        <img src="<?php echo base_url('uploads/participa/texto_3_peru.png');?>" >
                         <img src="<?php echo base_url('uploads/participa/texto_4_peru.png');?>" >
                    <?php }  ?>   
            
                    <?php endforeach;?>
                         <img src="<?php echo base_url('uploads/participa/texto_5.png');?>" >
                         <img src="<?php echo base_url('uploads/participa/texto_6.png');?>" >
                    </div>
             </div>
		</div>
	</div>
</div>      