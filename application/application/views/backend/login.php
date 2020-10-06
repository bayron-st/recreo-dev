<!doctype html>
<?php
//$system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
$system_name  = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
?>

<html class="no-js" lang="">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>
        <?php echo get_phrase('login'); ?> | <?php echo $system_name; ?>
      </title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">

	    <link rel="shortcut icon" href="<?php echo base_url('assets/login_page/img/favicon.png');?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/login_page/css/font-awesome.min.css');?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/login_page/css/normalize.css');?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/login_page/css/main.css');?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/login_page/css/style.css');?>">
      <script src="<?php echo base_url('assets/login_page/js/vendor/modernizr-2.8.3.min.js');?>"></script>
		  <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

    </head>
    <body>
		<div class="main-content-wrapper">
			<div class="login-area">
				<div class="login-header">
					<a href="<?php echo site_url('login');?>" class="logo">
						<img src="<?php echo base_url('assets/login_page/img/logo.png');?>"  alt="">
					</a>
					<h2 class="title"><?php echo $system_name; ?></h2>
				</div>
				<div class="login-content">
					<form method="post" role="form" id="form_login"
            action="<?php echo site_url('login/validate_login');?>">
						<div class="form-group">

						<input type="text" class="form-control" name="num_documento" onkeyup="format(this)" onchange="format(this)" value="" placeholder="<?php echo 'N° Identificacion'?>"
                required autocomplete="off">
						</div>

						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="<?php echo 'Contraseña'?>"
                required>
						</div>

						<button type="submit" class="btn btn-primary"><?php echo 'Iniciar sesión' ?><i class="fa fa-lock"></i></button>
					</form>

					<div class="login-bottom-links">
						<a href="<?php echo site_url('login/forgot_password');?>" class="link">
							<?php echo '¿Olvidaste tu contraseña?' ?>
						</a>
            <a href="<?php echo site_url('login/register_account');?>" class="link">
              <?php echo '¿Desea registrarse?' ?>
            </a>
					</div>
				</div>
			</div>
			<div class="image-area"></div>
		</div>

    <script src="<?php echo base_url('assets/login_page/js/vendor/jquery-1.12.0.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-notify.js');?>"></script>



    <script type="text/javascript">
    		function format(input)
    		{
    			var num = input.value.replace(/\./g,'');
    			if(!isNaN(num)){
    			num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
    			num = num.split('').reverse().join('').replace(/^[\.]/,'');
    			input.value = num;
    			}

    			else{ $.notify({
            // options
            title: '<strong><?php echo get_phrase('solo se permiten numeros');?>!!</strong>',
            message: '<?php echo $this->session->flashdata('Solo se permiten Numeros');?>'
            },{
            // settings
            type: 'danger'
          });;
    			input.value = input.value.replace(/[^\d\.]*/g,'');
    			}
    		}
    </script>

    <?php if ($this->session->flashdata('login_error') != '') { ?>
      <script type="text/javascript">
        $.notify({
          // options
          title: '<strong><?php echo get_phrase('error');?>!!</strong>',
          message: '<?php echo $this->session->flashdata('login_error');?>'
          },{
          // settings
          type: 'danger'
        });
      </script>
    <?php } ?>

    </body>
</html>
