
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">

        <?php
												$count=1;
  									    $ID_PARTICIPANTE = $this->session->userdata('login_user_id');

												$query = "SELECT  SUM(cantidad) as CANTIDAD from creditos where ID_PARTICIPANTE = $ID_PARTICIPANTE ";
												$query = $this->db->query($query);
												$data = $query->result_array();


                        foreach($data as $row):
                   ?>


		<H2 align="center" style="color:blue">TOTAL CRÉDITOS ACUMULADOS</H2>

			 <div class="col-sm-4 col-xs-6">
          <div class="tile-stats tile-blue">
            <div class="icon"><img src="<?php echo site_url('../uploads/imagen_creditos_color.png');?>"></div>
          		<div class="num"><?php if($row['CANTIDAD']>0){echo $row['CANTIDAD'];} else echo '0';?></div>
							<h3>TOTAL CREDITOS</h3>
        </div>
  		</div>

<?php endforeach;?>

<?php
								$count=1;
								$ID_PARTICIPANTE = $this->session->userdata('login_user_id');

								$query = "SELECT  SUM(cantidad) as CANTIDAD2 from creditos where ID_PARTICIPANTE = $ID_PARTICIPANTE AND TIPO = 'JUEGO'";
								$query = $this->db->query($query);
								$data = $query->result_array();


								foreach($data as $row):
					 ?>

			<div class="col-sm-4 col-xs-6">

				<div class="tile-stats tile-green">
					<div class="icon">	<img src="<?php echo site_url('../uploads/imagen_creditos_color.png');?>"></div>
					<div class="num"><?php if($row['CANTIDAD2']>0){echo $row['CANTIDAD2'];} else echo '0';?></div>

					<h3>RETO MENTAL</h3>

				</div>

			</div>

<?php endforeach;?>

<?php
								$count=1;
								$ID_PARTICIPANTE = $this->session->userdata('login_user_id');

								$query = "SELECT  SUM(cantidad) as CANTIDAD3 from creditos where ID_PARTICIPANTE = $ID_PARTICIPANTE AND TIPO = 'FACTURA'";
								$query = $this->db->query($query);
								$data = $query->result_array();


								foreach($data as $row):
					 ?>
			<div class="col-sm-4 col-xs-6">

				<div class="tile-stats tile-green">
					<div class="icon"> <img src="<?php echo site_url('../uploads/imagen_creditos_color.png');?>"> </div>
					<div class="num"><?php if($row['CANTIDAD3']>0){echo $row['CANTIDAD3'];} else echo '0';?></div>

					<h3>COMPRAS REGISTRADAS</h3>

				</div>

			</div>
<?php endforeach;?>

				</div>
			</div>



			<div class="row">
				<br><br>

				<H2 align="center" style="color:blue">MANEJO DE CRÉDITOS </H2>

					 <div class="col-sm-6 col-xs-6">
							<div class="tile-stats tile-blue">
								<div class="icon"><img src="<?php echo site_url('../uploads/imagen_creditos_gris.png');?>"></div>
									<div class="num">0</div>
									<h3>CREDITOS REDIMIDOS: </h3>
						</div>
					</div>


						 <div class="col-sm-6 col-xs-6">
								<div class="tile-stats ">
									<div class="icon"><img src="<?php echo site_url('../uploads/imagen_creditos_gris.png');?>"></div>
										<div class="num">0</div>
										<h3>CREDITOS NO REDIMIDOS </h3>
							</div>
						</div>


				</div>

			</div>
		</div>
