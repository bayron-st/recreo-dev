
	<header class="navbar"><!-- set fixed position by adding class "navbar-fixed-top" -->

		<div class="navbar-inner">
			<!-- main menu -->
			<div class="navbar-brand">
			</div>
			<?php

				$count=1;
				$ID_PARTICIPANTE = $this->session->userdata('login_user_id');

				$query = "SELECT  id_pais  from participantes where ID_PARTICIPANTE = $ID_PARTICIPANTE ";
				$query = $this->db->query($query);
				$data = $query->result_array();

				$loc = '';
				$loc2 = '';

				foreach($data as $row):

				if($row['id_pais'] == 'CO') {$loc = "co"; $loc2 = "";}
				if($row['id_pais'] == 'EC') {$loc = "ec"; $loc2 = "-ec";}
				if($row['id_pais'] == 'PE') {$loc = "pe"; $loc2 = "-pe";}
			?>
			<ul class="navbar-nav pull-sm-left">
				<li class="has-sub" >
					<?php echo '<a href="https://elrecreoesdetodos.com/'.$loc.'/inicio'.$loc2.'/">'; ?>
						<span class="title">Home</span>
					</a>
				</li>
				<li class="has-sub" >
					<?php echo '<a href="https://elrecreoesdetodos.com/'.$loc.'/como-participar'.$loc2.'/">'; ?>
						<span class="title">Cómo participar</span>
					</a>
				</li>


				<!--href="<?php echo site_url('participante/juego'); ?>" -->
				<li class="<?php if ($page_name == 'juego') echo 'active'; ?> ">
						<a  id="message" >
								<span><?php echo 'Juego'; ?></span>
						</a>
				</li>
				<li c lass="has-sub" >
					<?php echo '<a href="https://elrecreoesdetodos.com/'.$loc.'/premios'.$loc2.'/">'; ?>
						<span class="title">Premios</span>
					</a>
				</li>
				<li class="<?php if ($page_name == 'Whatsapp') echo 'active'; ?> ">
						<a href="<?php echo site_url('participante/whatsapp'); ?>">
								<span><?php echo 'Registrar Compras'; ?></span>
						</a>
				</li>

			<!--	<li class="<?php if ($page_name == 'redimir') echo 'active'; ?> ">
						<a href="<?php echo site_url('participante/redimir'); ?>">
								<span><?php echo 'Redimir'; ?></span>
						</a>
				</li> -->

				<li class="has-sub <?php if ($page_name == 'dashboard') echo 'active'; ?>" >
					<a href="<?php echo site_url('participante/dashboard'); ?>">
						<span class="title">Mi cuenta</span>
					</a>
				</li>
			</ul>

			<?php endforeach;?>
			<!-- notifications and other links -->
			<ul class="nav navbar-right pull-right">

				<li class="has-sub">

					<?php

													$ID_PARTICIPANTE = $this->session->userdata('login_user_id');

													$query = "SELECT NOMBRES  from 	participantes where ID_PARTICIPANTE = $ID_PARTICIPANTE ";
													$query = $this->db->query($query);
													$data = $query->result_array();

													foreach($data as $row):
										 ?>


										 <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">


	<span class="title">

											<?php echo $row['NOMBRES'];	 endforeach;?>
									</span>
                    </a>


						</li>


				<li class="has-sub">
					<a href="<?php echo site_url('login/logout');?>">
					<span class="title" style="font-size:16px !important;">Cerrar Sesión</span><i class="entypo-logout right"></i>
					</a>
				</li>
				<!-- mobile only -->
				<li class="visible-xs">

					<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
					<div class="horizontal-mobile-menu visible-xs">
						<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
							<i class="entypo-menu"></i>
						</a>
					</div>

				</li>

			</ul>

		</div>

	</header>
