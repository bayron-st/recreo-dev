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


<?php 
	 $loc2 = $_GET['loc'];
    if ($loc2 == 'co') {
		$video_promo = '<iframe width="560" height="315" src="https://www.youtube.com/embed/0zrb-0BhrWU?autoplay=1&amp;mute=1"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    } elseif ($loc2 == 'ec') {
        $video_promo = '<iframe width="560" height="315" src="https://www.youtube.com/embed/zL1awpJ4pg0?autoplay=1&amp;mute=1"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';     
    } elseif ($loc2 == 'pe') {
        $video_promo = '<iframe width="560" height="315" src="https://www.youtube.com/embed/sLCUs_8y8iY?autoplay=1&amp;mute=1"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';      
	}
	elseif($loc2 == "" || !isset($_GET['loc'])){
		$video_promo = '<iframe width="560" height="315" src="https://www.youtube.com/embed/0zrb-0BhrWU?autoplay=1&amp;mute=1"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
	<body style="background-color: #033f88;">
		<div class="main-content-wrapper" style="display:table;">
			<div class="login-area" style="display: table-cell; vertical-align:middle;">
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
				?><center>
					<div style="height:20px; width:230px; margin-bottom: 40px;; background-color: transparent;box-shadow:0px 10px 11px -7px rgba(0,0,0,0.7);;"></div>
				</center>
				<!-- <hr style="margin-left:30px; margin-right: 30px; border-top: 1px solid transparent; "> -->
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
			<div style="display: table-cell; vertical-align:middle;">
				<img class="img-responsive center-block" src="<?php echo base_url('assets/login_page/img/bg.png');?>" alt="">
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
			
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">   
						<div class="modal-body">
							<div  class="modal-body">
								<div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
									<?php
										echo $video_promo;
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	
			<script>
				
				jQuery.noConflict();
				$(window).on('load',function(){
					var delayMs = 500;
					setTimeout(function(){
						$('#myModal').modal('show');
					}, delayMs);
				})(jQuery);    
			</script>