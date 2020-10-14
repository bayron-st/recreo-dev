
<?php 
    $participante	= $this->db->select('*');
    $participante	= $this->db->from('participantes');
    $participante	= $this->db->where("ID_PARTICIPANTE",$this->session->userdata('login_user_id'));
    $participante	= $this->db->get()->result_array();
    foreach($participante as $row){
        $userCountry = $row['ID_PAIS'];
    }
    if ($userCountry == 'CO') {
        $video_promo = '<iframe width="560" height="315" src="https://www.youtube.com/embed/0zrb-0BhrWU?autoplay=1&amp;mute=1"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        $img3 = '<img class="img-responsive center-block" src="'.base_url('uploads/inicio/texto_1.png').'">';
    } elseif ($userCountry == 'EC') {
        $video_promo = '<iframe width="560" height="315" src="https://www.youtube.com/embed/zL1awpJ4pg0?autoplay=1&amp;mute=1"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        $img3 = '<img class="img-responsive center-block" src="'.base_url('uploads/inicio/texto_1_ecuador.png').'">';
    } elseif ($userCountry == 'PE') {
        $video_promo = '<iframe width="560" height="315" src="https://www.youtube.com/embed/sLCUs_8y8iY?autoplay=1&amp;mute=1"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        $img3 = '<img class="img-responsive center-block" src="'.base_url('uploads/inicio/texto_1_peru.png').'">';
    }
?>
<!--<div class="container-fluid" style="border-style: solid; border-color: #02336e; border-width: 15px;">-->
<div class="row">
    <div class="col-md-6">
        <img class="img-responsive center-block hidden-xs" style="margin-bottom: 20px;" src="<?php echo base_url('uploads/logo.png');?>">
        <img class="img-responsive center-block" style="margin-bottom: 20px;" src="<?php echo base_url('uploads/inicio/familia_inicio.jpg');?>">
    </div>
    <div class="col-md-6">
        <?php
            echo $img3;
        ?>
        <img style="margin-bottom: 10px;"class="img-responsive center-block" src="<?php echo base_url('uploads/inicio/premios-bienvenida_2celulares.jpg');?>">
        <img class="img-responsive center-block"src="<?php echo base_url('uploads/inicio/texto3.png');?>" >        
    </div>
</div>

<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">   
            <div class="modal-body">
                <div  class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                        <?php
                            echo $video_promo;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(window).on('load',function(){
        var delayMs = 500;
        setTimeout(function(){
            $('#myModal').modal('show');
        }, delayMs);
    });    
</script>
