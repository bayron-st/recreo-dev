<?php
	$participante	= $this->db->select('*');
	$participante	= $this->db->from('participantes');
	$participante	= $this->db->where("ID_PARTICIPANTE", $this->session->userdata('login_user_id'));
	$participante	= $this->db->get()->result_array();
	foreach ($participante as $row) {
		if ($row['ID_PAIS'] == 'CO') {
			$video_loc = '<iframe width="100%" height="350" src="https://www.youtube.com/embed/0zrb-0BhrWU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
			$img_1 = '<img class="img-responsive center-block" src="' . base_url('uploads/participa/texto_3.png') . '">';
			$img_2 = '<img class="img-responsive center-block" src="' . base_url('uploads/participa/texto_4.png') . '">';
		} elseif ($row['ID_PAIS'] == 'EC') {
			$video_loc = '<iframe width="100%" height="350" src="https://www.youtube.com/embed/zL1awpJ4pg0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
			$img_1 = '<img class="img-responsive center-block" src="' . base_url('uploads/participa/texto_3_ecuador.png') . '">';
			$img_2 = '<img class="img-responsive center-block" src="' . base_url('uploads/participa/texto_4_ecuador.png') . '">';
		} elseif ($row['ID_PAIS'] == 'PE') {
			$video_loc = '<iframe width="100%" height="350" src="https://www.youtube.com/embed/sLCUs_8y8iY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
			$img_1 = '<img class="img-responsive center-block" src="' . base_url('uploads/participa/texto_3_peru.png') . '">';
			$img_2 = '<img class="img-responsive center-block" src="' . base_url('uploads/participa/texto_4_peru.png') . '">';
		}
	}
?>

<div class="row">
	<div class="col-md-6 col-xs-12">
		<div style="padding:20px; background-color: #033F88; margin-bottom: 20px;">
			<p style="font-size:26px; color: #ffffff;" class="text-uppercase">¿Cómo participar en nuestra plataforma<br>el recreo es de todos?</p>
		</div>
		<?php
			echo $video_loc;
		?>
	</div>
	<div class="col-md-6 col-xs-12">
		<?php
			echo $img_1;
			echo $img_2;
			echo '<img class="img-responsive center-block" src="' . base_url('uploads/participa/texto_5.png') . '">';
			echo '<img class="img-responsive center-block" src="' . base_url('uploads/participa/texto_6.png') . '">';
		?>
	</div>
</div>