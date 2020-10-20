<!-- Footer -->
<footer class="main" style="background-color: #CCCCCC; padding: 25px 15px;">
<div class="container-fluid" >
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
                 <img class="img-responsive" src="<?php echo base_url('uploads/logo_header.png'); ?>" />
				</div>
				<div align="center" class="col-md-3">

                <?php 
        $participante	= $this->db->select('*');
        $participante	= $this->db->from('participantes');
        $participante	= $this->db->where("ID_PARTICIPANTE",$this->session->userdata('login_user_id'));
        $participante	= $this->db->get()->result_array();

        foreach($participante as $row):?>

        <?php  if ($row['ID_PAIS'] == "CO") { ?>     
                            <a style="font-size:14px !important;" href="https://elrecreoesdetodos.com/TYC/Colombia-T&amp;C.pdf" target="_blank">Terminos y Condiciones</a> <br>
                            <a style="font-size:14px !important;"href="https://www.tetrapak.com/co/about/legal-information" target="_blank">Políticas de privacidad</a> <br>
                            <a style="font-size:14px !important;" href="https://elrecreoesdetodos.com/TYC/Usabilidad_de_plataforma_web.pdf" target="_blank">Sobre el uso de la plataforma</a> 
       <?php }  elseif ($row['ID_PAIS'] == "EC") {?>
                            <a style="font-size:14px !important;" href="https://elrecreoesdetodos.com/TYC/Ecuador-T&amp;C.pdf" target="_blank">Terminos y Condiciones</a><br>        
                            <a style="font-size:14px !important;" href="https://www.tetrapak.com/ec/about/legal-information" target="_blank">Políticas de privacidad</a><br>
                            <a style="font-size:14px !important;" href="https://elrecreoesdetodos.com/TYC/Usabilidad_de_plataforma_web.pdf" target="_blank">Sobre el uso de la plataforma</a>
        <?php }   elseif ($row['ID_PAIS'] == "PE") {?>
                            <a style="font-size:14px !important;" href="https://elrecreoesdetodos.com/TYC/Peru-T&amp;C.pdf" target="_blank">Terminos y Condiciones</a><br>
                            <a style="font-size:14px !important;" href="https://www.tetrapak.com/pe/about/legal-information" target="_blank">Políticas de privacidad</a><br>
                            <a style="font-size:14px !important;"href="https://elrecreoesdetodos.com/TYC/Usabilidad_de_plataforma_web.pdf" target="_blank">Sobre el uso de la plataforma</a>
        <?php }  ?>
                    <br><a style="font-size:14px !important;"href="mailto:centrodecontacto@elrecreoesdetodos.com" target="_blank">Preguntas, Quejas y Reclamos</a>

                                            
				</div>
				<div class="col-md-3 text-center">
                    <p>Estas navegando para</p>

                    <?php  if ($row['ID_PAIS'] == "CO") { ?>     
                        <img style="width: 70px;" class="img-responsive center-block" src="<?php echo base_url('uploads/banderas/colombia.png'); ?>" />                         
                    <?php }  elseif ($row['ID_PAIS'] == "EC") {?>
                        <img style="width: 70px;" class="img-responsive center-block" src="<?php echo base_url('uploads/banderas/ecuador.png'); ?>" />  
                    <?php }   elseif ($row['ID_PAIS'] == "PE") {?>
                        <img style="width: 70px;" class="img-responsive center-block" src="<?php echo base_url('uploads/banderas/peru.png'); ?>" />  
                    <?php }  ?>
				</div>
				<div class="col-md-3">

                <?php  if ($row['ID_PAIS'] == "CO") { ?>     
                    <a target="_blank" style="width: 100%;" href="https://www.rappi.com.co/tiendas/exito/mundo-tetra-pak?_branch_match_id=843950165437867036" type="button" class="btn btn-orange"> Compra y recibe a domicilio <i class="fa fa-bicycle"></i> </a>                        
                    <?php }  elseif ($row['ID_PAIS'] == "EC") {?>
                        <a target="_blank" style="width: 100%;" href="https://www.rappi.com.ec/tiendas/supermaxi/tetra-pak?_branch_match_id=843950165437867036" type="button" class="btn btn-orange"> Compra y recibe a domicilio <i class="fa fa-bicycle"></i> </a> 
                    <?php }   elseif ($row['ID_PAIS'] == "PE") {?>
                        <a target="_blank" style="width: 100%;" href="https://www.rappi.com.pe/tiendas/wong/mundo-tetra-pak?_branch_match_id=843950165437867036" type="button" class="btn btn-orange"> Compra y recibe a domicilio <i class="fa fa-bicycle"></i> </a> 
                    <?php }  ?>
                    
                    <div class="text-center"style="margin-top: 15px;"> 
                    
                    <?php  if ($row['ID_PAIS'] == "CO") { ?>     
                        <a href="https://www.facebook.com/TetraPakColombia/" target="_blank" style="margin: 3px;" ><i class="fa fa-facebook fa-3x text-info"></i></a>      
                    <?php }  elseif ($row['ID_PAIS'] == "EC") {?>
                        <a href="http://www.facebook.com/tetrapakecuador" target="_blank" style="margin: 3px;" ><i class="fa fa-facebook fa-3x text-info"></i></a>      
                         
                    <?php }   elseif ($row['ID_PAIS'] == "PE") {?>
                        <a href=" http://www.facebook.com/tetrapakperu" target="_blank" style="margin: 3px;" ><i class="fa fa-facebook fa-3x text-info"></i></a>      
                    <?php }  ?>
                   
                        <a href="https://www.instagram.com/TetraPakAndina/" target="_blank" style="margin: 3px;" ><i class="fa fa-instagram fa-3x text-info"></i></a>
                        <a href="https://www.youtube.com/channel/UChbiQa6dP4GNzsp1CNUBX2w" target="_blank" style="margin: 3px;" ><i class="fa fa-youtube-play fa-3x text-info"></i></a>
                        <a href="http://twitter.com/TetraPakAndina" target="_blank" style="margin: 3px;" ><i class="fa fa-twitter fa-3x text-info"></i></a>
                        <a href="http://linkedin.com/company/tetra-pak/" target="_blank" style="margin: 3px;" ><i class="fa fa-linkedin fa-3x text-info"></i></a>
                    </div>






				</div>
			</div>
		</div>
	</div>
</div>
</footer>
<?php endforeach;?>