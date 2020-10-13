<?php
	$ID_PARTICIPANTE = $this->session->userdata('login_user_id');
	$query = "SELECT NOMBRES  from 	participantes where ID_PARTICIPANTE = $ID_PARTICIPANTE ";
	$query = $this->db->query($query);
	$data = $query->result_array();
	foreach($data as $row){
		$nameUser = $row['NOMBRES'];
	}
?>

<nav class="navbar navbar-default" role="navigation" style="margin-bottom: 0px;">
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
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="font-size:18px !important;">
		<ul class="nav navbar-nav">
			<li class="<?php if ($page_name == 'dashboard') echo 'active'; ?> ">
				<a href="<?php echo site_url('participante/dashboard'); ?>">
					<span >Inicio <i class="fa fa-home"></i></span>
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
		<ul class="nav navbar-nav navbar-right" style="font-size:18px !important;">
			<li class="dropdown" style="margin-right: 10px;">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $nameUser ?><b class="caret"></b></a>
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




	