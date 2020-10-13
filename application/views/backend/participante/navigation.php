<nav class="navbar navbar-default" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			
			</div>
		
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="font-size:16px !important;">
				<ul class="nav navbar-nav">


					<?php
						$count=1;
						$ID_PARTICIPANTE = $this->session->userdata('login_user_id');

						$query = "SELECT id_pais from participantes where ID_PARTICIPANTE = $ID_PARTICIPANTE ";
						$query = $this->db->query($query);
						$data = $query->result_array();

						$loc = '';
						$loc2 = '';

						foreach($data as $row):

						if($row['id_pais'] == 'CO') {$loc = "co"; $loc2 = "";}
						if($row['id_pais'] == 'EC') {$loc = "ec"; $loc2 = "-ec";}
						if($row['id_pais'] == 'PE') {$loc = "pe"; $loc2 = "-pe";}
					?>

						<li class="<?php if ($page_name == 'dashboard') echo 'active'; ?> ">
							<a href="<?php echo site_url('participante/dashboard'); ?>">
								<span >Inicio <i class="fa fa-file"></i></span>
							</a>
						</li> 

						<li class="<?php if ($page_name == 'participa') echo 'active'; ?> ">
							<a href="<?php echo site_url('participante/participa'); ?>">
								<span>Cómo participar <i class="fa fa-file"></i></span>
							</a>
						</li> 

						<li class="<?php if ($page_name == 'juego') echo 'active'; ?> ">
							<a href="<?php echo site_url('participante/juego'); ?>">
								<span>Juego <i class="fa fa-gamepad"></i></span>
							</a>
						</li>

						<li class="<?php if ($page_name == 'premios') echo 'active'; ?> ">
							<a href="<?php echo site_url('participante/premios'); ?>">
								<span>Premios <i class="fa fa-gamepad"></i></span>
							</a>
						</li>
		
				</ul>
				<?php endforeach;?>

				<ul class="nav navbar-nav navbar-right" style="font-size:16px !important;">
					
					<li class="dropdown">

					<?php
						$ID_PARTICIPANTE = $this->session->userdata('login_user_id');
						$query = "SELECT NOMBRES  from 	participantes where ID_PARTICIPANTE = $ID_PARTICIPANTE ";
						$query = $this->db->query($query);
						$data = $query->result_array();
						foreach($data as $row):
					?>

						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $row['NOMBRES'];endforeach;?> <b class="caret"></b></a>
						<ul class="dropdown-menu" style="font-size:16px !important;">
						<li  <?php if ($page_name == 'cuenta') echo 'active'; ?>">
								<a href="<?php echo site_url('participante/cuenta'); ?>">
									<span class="title"> Mi cuenta <i class="fa fa-user"> </i> </span>
								</a>
							</li>

							<li class="<?php if ($page_name == 'redimir') echo 'active'; ?> ">
								<a href="<?php echo site_url('participante/redimir'); ?>">
									<span>Redimir <i class="fa fa-tags"></i></span>
								</a>
							</li> 

							<li class="<?php if ($page_name == 'whatsapp') echo 'active'; ?> ">
								<a href="<?php echo site_url('participante/whatsapp'); ?>">
									<span>Registrar Compras <i class="fa fa-file"></i></span>
								</a>
							</li>

							<li class="has-sub">
								<a href="<?php echo site_url('login/logout');?>">
								<span class="title" >Cerrar Sesión</span><i class="entypo-logout right"></i>
								</a>
							</li>
	
						</ul>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</nav>
	



	