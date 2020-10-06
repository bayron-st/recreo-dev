

	<header class="navbar"><!-- set fixed position by adding class "navbar-fixed-top" -->

		<div class="navbar-inner">
			<!-- main menu -->
			<div class="navbar-brand">
			</div>

			<ul class="navbar-nav pull-sm-left">
				<li class="has-sub" >
					<a href="https://elrecreoesdetodos.com/co/inicio/">
						<span class="title">Home</span>
					</a>
				</li>
				<li class="has-sub" >
					<a href="https://elrecreoesdetodos.com/co/como-participar/">
						<span class="title">Cómo participar</span>
					</a>
				</li>
				<li class="<?php if ($page_name == 'juego') echo 'active'; ?> ">
						<a href="<?php echo site_url('participante/juego'); ?>">

								<span><?php echo 'Juego'; ?></span>
						</a>
				</li>
				<li class="has-sub" >
					<a href="https://elrecreoesdetodos.com/co/premios/">
						<span class="title">Premios</span>
					</a>
				</li>
				<li class="<?php if ($page_name == 'Whatsapp') echo 'active'; ?> ">
						<a href="<?php echo site_url('participante/whatsapp'); ?>">
								<span><?php echo 'Registrar Compras'; ?></span>
						</a>
				</li>
				<li class="has-sub <?php if ($page_name == 'dashboard') echo 'active'; ?>" >
					<a href="<?php echo site_url('asesor/dashboard'); ?>">
						<span class="title">Mi cuenta</span>
					</a>
				</li>
			</ul>

			<!-- notifications and other links -->
			<ul class="nav navbar-right pull-right">

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
