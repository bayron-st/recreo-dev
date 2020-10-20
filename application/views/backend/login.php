<!doctype html>
<?php
	//$system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
	$system_name  = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
	$host= $_SERVER["HTTP_HOST"];
	$url= $_SERVER["REQUEST_URI"];

	if (!$_GET['loc']) {
		if ($host == 'elrecreoesdetodos.com') {
			echo "<script language='javascript'>window.location='https://elrecreoesdetodos.com/'</script>;";
		}
	}
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
      	<style>
			input[type=number]::-webkit-outer-spin-button,
			input[type=number]::-webkit-inner-spin-button {
				-webkit-appearance: none !important;
				margin: 0 !important;
			}
			input[type=number] {
				-moz-appearance: textfield !important;
			}
      	</style>
    </head>
    <body>
		<div class="main-content-wrapper">
			<div class="login-area">
				<div align="center" class="login-header">
					<a href="<?php echo site_url('login');?>" class="logo">
						<img class="img-responsive" src="<?php echo base_url('assets/login_page/img/logo.png');?>"  alt="">
					</a>
					<h2 class="title"><?php echo $system_name; ?></h2>
				</div>

        		<h3 style= "color: #ffffff">¿No tienes una cuenta?</h3>
				<?php
					$loc = 'w';
					$loc = strtolower($_GET['loc']);
					if ($loc != 'w' && $loc == 'co') {
						echo '<a style= "font-size: 20px; color: #ffffff;text-decoration: underline;" href="' . site_url('login/register_account?loc=co') .'" class="link" >Registrate</a>';
					}
					if ($loc != 'w' && $loc == 'ec') {
						echo '<a style= "font-size: 20px; color: #ffffff;text-decoration: underline;" href="' . site_url('login/register_account?loc=ec') .'" class="link" >Registrate</a>';
					}
					if ($loc != 'w' && $loc == 'pe') {
						echo '<a style= "font-size: 20px; color: #ffffff;text-decoration: underline;" href="' . site_url('login/register_account?loc=pe') .'" class="link" >Registrate</a>';
					}
					if (!isset($_GET['loc'])) {
						echo '<a style= "font-size: 20px; color: #ffffff;text-decoration: underline;" href="' . site_url('login/register_account?loc=co') .'" class="link" >Registrate</a>';
					}
				?>

				<hr style="padding: 0px 15px 0px 15px">
        
        		<div class="login-content">
					<form method="post" role="form" id="form_login" action="<?php echo site_url('login/validate_login');?>">
						<div class="form-group">
              				<label>Documento</label>
						  	<input type="text" class="form-control text-center bloquear" name="identificacion" 
							onkeyup="javascript:this.value=this.value.toUpperCase();"
							onkeypress="return check3(event)" placeholder="N° de Identificacion" 
							required autocomplete="off">
						</div>
						<div class="form-group">
              				<label>Teléfono Celular</label>
							<input type="password" class="form-control text-center bloquear" name="telefono" 
							onkeypress="return check1(event)" placeholder="N° Celular" required>
						</div>
						<button type="submit" class="btn btn-primary"><?php echo 'Iniciar sesión' ?><i class="fa fa-sign-in"></i></button>
					</form>
				</div>
			</div>
				<div  style="display: table; height: 100%; background: #003d8b;" class="image-area">

					<div style="display: table-cell; height: 100%; vertical-align: middle;"> 
						<img  class="img-responsive center-block" src="<?php echo base_url('assets/login_page/img/bg.png');?>" alt="">
					</div>
				</div> 
		</div>
		<script src="<?php echo base_url('assets/login_page/js/vendor/jquery-1.12.0.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap-notify.js');?>"></script>

    	<script type="text/javascript">
    		function format(input) {
    			var num = input.value.replace(/\./g,'');
    			if(!isNaN(num)){
    				num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
    				num = num.split('').reverse().join('').replace(/^[\.]/,'');
    				input.value = num;
    			}

    			else { $.notify({
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
			function check1(e) {
				tecla = (document.all) ? e.keyCode : e.which;

				//Tecla de retroceso para borrar, siempre la permite
				if (tecla == 8) {
					return true;
				}

				// Patron de entrada, en este caso solo acepta numeros y letras
				// patron = /[A-Za-z0-9]/;
				patron = /[0-9]/;
				tecla_final = String.fromCharCode(tecla);
				return patron.test(tecla_final);
			}
			function check3(e) {
				tecla = (document.all) ? e.keyCode : e.which;

				//Tecla de retroceso para borrar, siempre la permite
				if (tecla == 8) {
					return true;
				}

				// Patron de entrada, en este caso solo acepta numeros y letras
				// patron = /[A-Za-z0-9]/;
				patron = /[A-Za-z0-9]/;
				tecla_final = String.fromCharCode(tecla);
				return patron.test(tecla_final);
			}
			$(document).ready(function(){
				$(".bloquear").on('paste', function(e){
					e.preventDefault();
					// alert('Esta acción está prohibida');
				})
				$(".bloquear").on('copy', function(e){
					e.preventDefault();
					// alert('Esta acción está prohibida');
				})
			});
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
