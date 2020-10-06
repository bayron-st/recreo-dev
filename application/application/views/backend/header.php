<div class="row">
	<div class="col-md-12 col-sm-12 clearfix" style="text-align:center;">
		<h2 style="font-weight:200; margin:0px;"><?php echo $system_name;?></h2>
    </div>
	<!-- Raw Links -->
	<div class="col-md-12 col-sm-12 clearfix ">

        <ul class="list-inline links-list pull-left">
        <!-- Language Selector -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
									<img src="<?php echo $this->crud_model->get_image_url($this->session->userdata('login_type') ,
													$this->session->userdata('login_user_id'));?>" alt="" class="img-circle" style="height:80px;">
									<h4 style="font-weight:100;margin:0px;">
										<?php echo $this->db->get_where($this->session->userdata('login_type'),
																	array( 		$this->session->userdata('login_type').'_id' =>
																				$this->session->userdata('login_user_id')))->row()->name;?>
									</h4>
                    </a>



				<?php if ($account_type != 'parent'):?>
				<ul class="dropdown-menu <?php if ($text_align == 'right-to-left') echo 'pull-right'; else echo 'pull-left';?>">
					<li>
						<a href="<?php echo site_url($account_type . '/manage_profile');?>">
                        	<i class="entypo-info"></i>
							<span><?php echo 'Editar perfil'?></span>
						</a>
					</li>
					<li>
						<a href="<?php echo site_url($account_type . '/manage_profile');?>">
                        	<i class="entypo-key"></i>
							<span><?php echo 'Cambiar contraseña'?></span>
						</a>
					</li>
				</ul>
				<?php endif;?>
				<?php if ($account_type == 'parent'):?>
				<ul class="dropdown-menu <?php if ($text_align == 'right-to-left') echo 'pull-right'; else echo 'pull-left';?>">
					<li>
						<a href="<?php echo site_url('parents/manage_profile');?>">
                        	<i class="entypo-info"></i>
							<span><?php echo 'Editar perfil'?></span>
						</a>
					</li>
					<li>
						<a href="<?php echo site_url('parents/manage_profile');?>">
                        	<i class="entypo-key"></i>
							<span><?php echo 'Cambiar contraseña'?></span>
						</a>
					</li>
				</ul>
				<?php endif;?>
			</li>
        </ul>


		<ul class="list-inline links-list pull-right">

		<li class="dropdown language-selector">
			<a href="https://elrecreoesdetodos.com/" target="_blank">
				<i class="entypo-globe"></i> Sitio Web
			</a>


			<li>
				<a href="<?php echo site_url('login/logout');?>">
					<?php echo 'Cerrar Sesión' ?><i class="entypo-logout right"></i>
				</a>
			</li>
		</ul>
	</div>

</div>


<hr style="margin-top:0px;" />

<script type="text/javascript">
	function get_session_changer()
	{
		$.ajax({
            url: '<?php echo site_url('admin/get_session_changer');?>',
            success: function(response)
            {
                jQuery('#session_static').html(response);
            }
        });
	}
</script>
