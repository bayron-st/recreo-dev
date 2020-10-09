
<div class="container-fluid">
	<div class="row">

		<?php
			$id_participante = $this->session->userdata('login_user_id');
			$query = "SELECT SUM(cantidad) as CANTIDAD from creditos where ID_PARTICIPANTE = $id_participante";
			$query2 = "SELECT SUM(cantidad) as CANTIDAD2 from creditos where ID_PARTICIPANTE = $id_participante AND TIPO = 'JUEGO'";
			$query3 = "SELECT SUM(cantidad) as CANTIDAD3 from creditos where ID_PARTICIPANTE = $id_participante AND TIPO = 'FACTURA'";
            $query4 = "SELECT sum(CANTIDAD) as CANTIDAD4 FROM canjes WHERE ID_PARTICIPANTE = $id_participante";

			$query = $this->db->query($query);
			$query2 = $this->db->query($query2);
			$query3 = $this->db->query($query3);
            $query4 = $this->db->query($query4);
			
			$data = $query->result_array();
			$data2 = $query2->result_array();
			$data3 = $query3->result_array();
            $data4 = $query4->result_array();
			
			foreach ($data as $row) {$nCreditos = $row['CANTIDAD'];}
			foreach ($data2 as $row2) {$nCreditos2 = $row2['CANTIDAD2'];}
			foreach ($data3 as $row3) {$nCreditos3 = $row3['CANTIDAD3'];}
			foreach ($data4 as $row4) {$nCreditos4 = $row4['CANTIDAD4'];}
		
		
		?>

		<div class="col-md-6 col-xs-12">
		

			<div class="panel" style="margin-top:20px"> 
				<div class="panel-heading"> 
					<div class="panel-title"><h2 class="text-info">Datos de usuario</h2></div> 
				</div> 
				<div class="panel-body"> 
					<form role="form" class="form-horizontal form-groups-bordered"> 
						<div class="form-group"> 
							<label for="field-1" class="col-sm-3 control-label">NOMBRE</label> 
							<div class="col-sm-9"> 
								<input type="text" class="form-control" id="field-1" placeholder="Nombres" value="">
							</div>
						</div> 
						<div class="form-group"> 
							<label for="field-1" class="col-sm-3 control-label">NOMBRE</label> 
							<div class="col-sm-9"> 
								<input type="text" class="form-control" id="field-1" placeholder="Nombres" value="">
							</div>
						</div> 				
						<div class="form-group"> 
							<div class="col-sm-offset-3 col-sm-5"> 
								<button type="submit" class="btn btn-default">Sign in</button>
							</div> 
						</div> 
					</form> 
				</div> 
			</div>









		</div>
		<div class="col-md-6 col-xs-12">
			<H2 class="text-info">TOTAL CRÉDITOS ACUMULADOS</H2>
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="tile-stats tile-blue">
						<br style="margin-top:5px;">
						<div class="icon"><img src="<?php echo site_url('../uploads/imagen_creditos_color.png');?>"></div>
						<div class="num"><?php if($nCreditos > 0){echo $nCreditos;} else echo '0';?></div>
						<h3 style="color:#ffffff">TOTAL CREDITOS</h3>
						<br style="margin-bottom:5px;">
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="tile-stats tile-gray" style="padding:10px;">
						<div class="icon">	<img src="<?php echo site_url('../uploads/imagen_creditos_color.png');?>"></div>
						<p style="font-size:20px"><?php if($nCreditos2 > 0){echo $nCreditos2;} else echo '0';?></p>
						<p style="">RETO MENTAL</p>
					</div>
					<div class="tile-stats tile-gray" style="padding:10px;">
						<div class="icon"> <img src="<?php echo site_url('../uploads/imagen_creditos_color.png');?>"></div>
						<p style="font-size:20px"><?php if($nCreditos3>0){echo $nCreditos3;} else echo '0';?></p>
						<p style="">COMPRAS REGISTRADAS</p>
					</div>
				</div>
			</div>
			<p>Número total de créditos acumulados durante la promoción para participar por una consola PlayStation&reg; 4.</p>
			<hr>
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<H3 class="text-info">CREDITOS REDIMIDOS</H3>
					<div class="tile-stats tile-aqua">
						<div class="icon"><img src="<?php echo site_url('../uploads/imagen_creditos_gris.png');?>"></div>
						<div class="num"><?php if($nCreditos4>0){echo $nCreditos4;} else echo '0';?></div>
						<h3>CREDITOS REDIMIDOS:</h3>
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					<H3 class="text-info">CREDITOS NO REDIMIDOS</H3>
					<div class="tile-stats tile-aqua">
						<div class="icon"><img src="<?php echo site_url('../uploads/imagen_creditos_gris.png');?>"></div>
						<div class="num"><?php if($nCreditos4>0){echo ($nCreditos - $nCreditos4);} else echo '0';?></div>
						<h3>CREDITOS NO REDIMIDOS</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
