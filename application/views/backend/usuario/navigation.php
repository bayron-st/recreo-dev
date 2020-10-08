
	<header class="navbar"><!-- set fixed position by adding class "navbar-fixed-top" -->

		<div class="navbar-inner" >
			<!-- main menu -->
			<div class="navbar-brand">
			</div>


			<ul class="navbar-nav" >

        <!-- DASHBOARD -->
              <li class=" has-sub<?php if ($page_name == 'dashboard') echo 'active'; ?>">
                <a href="<?php echo site_url('usuario/dashboard'); ?>">
                      <i class="entypo-gauge"></i>
                      <span><?php echo 'INICIO'; ?></span>
                  </a>
              </li>


							<li class=" has-sub<?php if ($page_name == 'participantes') echo 'active'; ?>">
								<a href="<?php echo site_url('usuario/participantes'); ?>">
											<i class="entypo-gauge"></i>
											<span><?php echo 'PARTICIPANTES'; ?></span>
									</a>
							</li>

							<li class=" has-sub<?php if ($page_name == 'participantes') echo 'active'; ?>">
								<a href="<?php echo site_url('usuario/tiendas'); ?>">
											<i class="entypo-gauge"></i>
											<span><?php echo 'TIENDAS'; ?></span>
									</a>
							</li>

							<li class=" has-sub<?php if ($page_name == 'creditos') echo 'active'; ?>">
								<a href="<?php echo site_url('usuario/creditos'); ?>">
											<i class="entypo-gauge"></i>
											<span><?php echo 'CRÉDITOS'; ?></span>
									</a>
							</li>

							<li class=" has-sub<?php if ($page_name == 'canjes') echo 'active'; ?>">
								<a href="<?php echo site_url('usuario/canjes'); ?>">
											<i class="entypo-gauge"></i>
											<span><?php echo 'CANJES'; ?></span>
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
