<!doctype html>
<?php
	//$system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
	$system_name  = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
	if (!$_GET['loc']) {
		echo"<script language='javascript'>window.location='https://elrecreoesdetodos.com/'</script>;";
	}
?>

<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title><?php echo 'REGISTRARSE'; ?> | <?php echo $system_name; ?></title>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker.css');?>" class="">
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-ML7KXVN');</script>
		<!-- End Google Tag Manager -->
    </head>
	<body style="background-color: #033f88;">
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-ML7KXVN"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<div class="main-content-wrapper" style="display: table;">
			<div class="login-area" style="display: table-cell; vertical-align: middle;">
				<div align="center" class="login-header">
					<img class="img-responsive" src="<?php echo base_url('assets/login_page/img/logo.png');?>" width="60%" max-width="200px" alt="">
					<h2 class="title"><?php echo $system_name; ?></h2>
					<p>* Para registrarte debes ser mayor de edad.</p>
				</div>
				<div class="login-content">
					<?php 
						if (isset($_GET['reg'])) {
							if ($_GET['reg']=='error') {
								echo '<div class="alert alert-danger">Ya se encuentra registrado!</div>';
							}
						}
						echo form_open(site_url('login/register/create') , array('enctype' => 'multipart/form-data'));
					?>
					<div class="form-group">
						<select name="ID_PAIS" class="form-control selectboxit" required>
							<option value="">SELECIONAR PAIS</option>
							<option value="CO"><?php echo 'COLOMBIA';?></option>
							<option value="EC"><?php echo 'ECUADOR';?></option>
							<option value="PE"><?php echo 'PERU';?></option>
						</select>
						<input type="hidden" name="ID_PAIS_GET" value="<?php echo strtoupper($_GET['loc']);?>">
					</div>

					<div class="form-group">
						<input type="text" class="form-control bloquear" name="nombres" 
						onkeyup="javascript:this.value=this.value.toUpperCase();" 
						onkeypress="return check2(event)" placeholder="<?php echo 'NOMBRES'?>" 
						required autocomplete="off">
					</div>

					<div class="form-group">
						<input type="text" class="form-control bloquear" name="apellidos" 
						onkeyup="javascript:this.value=this.value.toUpperCase();" 
						onkeypress="return check2(event)" placeholder="<?php echo 'APELLIDOS'?>"
						required autocomplete="off">
					</div>

					<div class="form-group">
						<input type="text" class="form-control bloquear" name="identificacion"
						onkeyup="javascript:this.value=this.value.toUpperCase();" 
						onkeypress="return check3(event)" placeholder="NUMERO DE DOCUMENTO"
						required autocomplete="off">
					</div>

					<div class="form-group">
						<input type="text" id="dpk" class="form-control bloquear" name="ANO_NACIMIENTO" 
						placeholder="AÑO DE NACIMIENTO">
					</div>

					<div class="form-group">
						<input type="text" class="form-control bloquear" name="telefono"  
						onkeypress="return check1(event)" placeholder="TELEFONO CELULAR" 
						required autocomplete="off">
					</div>

					<div class="form-group">
						<input type="email" class="form-control bloquear" name="email" 
						placeholder="CORREO ELECTRONICO" required autocomplete="off">
					</div>

					<div class="form-group">
						<?php
							$loc = "w";
							$loc = strtolower($_GET['loc']);
							if ($loc != 'w' && $loc == 'co') {
								echo '<input type="checkbox" name="aceptar" value="ACEPTO" required> Aceptar <a style="text-decoration: underline; color:#ffffff" href="https://elrecreoesdetodos.com/TYC/dashboard/Colombia-T&C.pdf" target="_blank" style="color:white">terminos y condiciones.</a>';
							}
							if ($loc != 'w' && $loc == 'ec') {
								echo '<input type="checkbox" name="aceptar" value="ACEPTO" required> Aceptar <a style="text-decoration: underline; color:#ffffff" href="https://elrecreoesdetodos.com/TYC/dashboard/Ecuador-T&C.pdf" target="_blank" style="color:white">terminos y condiciones.</a>';
							}
							if ($loc != 'w' && $loc == 'pe') {
								echo '<input type="checkbox" name="aceptar" value="ACEPTO" required> Aceptar <a style="text-decoration: underline; color:#ffffff" href="https://elrecreoesdetodos.com/TYC/dashboard/Peru-T&C.pdf" target="_blank" style="color:white">terminos y condiciones.</a>';
							}
						?>
					</div>
            		
					<button type="submit" class="btn btn-primary">REGISTRARSE<i class="fa fa-unlock"></i></button>
					<?php echo form_close();?>
					<?php
						$loc = 'w';
						$loc = strtolower($_GET['loc']);
						if ($loc != 'w' && $loc == 'co') {
							echo '<p>¿Ya tienes una cuenta? <a style="color:#ffffff; text-decoration: underline;" href="'.base_url('/?loc=co').'">Inicia sesión</a></p>';
						}
						if ($loc != 'w' && $loc == 'ec') {
							echo '<p>¿Ya tienes una cuenta? <a style="color:#ffffff; text-decoration: underline;" href="'.base_url('/?loc=ec').'">Inicia sesión</a></p>';
						}
						if ($loc != 'w' && $loc == 'pe') {
							echo '<p>¿Ya tienes una cuenta? <a style="color:#ffffff; text-decoration: underline;" href="'.base_url('/?loc=pe').'">Inicia sesión</a></p>';
						}
					?>
				</div>
			</div>
    		<div  style="display: table-cell; vertical-align: middle;" class="image-area">
				<img class="img-responsive center-block" src="<?php echo base_url('assets/login_page/img/bg.png');?>" alt="">
			</div> 
		</div>

		<script src="<?php echo base_url('assets/login_page/js/vendor/jquery-1.12.0.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap-notify.js');?>"></script>
		<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.js');?>"></script>
		<script type="text/javascript">
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
			};
			function check2(e) {
				tecla = (document.all) ? e.keyCode : e.which;

				//Tecla de retroceso para borrar, siempre la permite
				if (tecla == 8 || tecla  == 32) {
					return true;
				}

				// Patron de entrada, en este caso solo acepta numeros y letras
				// patron = /[A-Za-z0-9]/;
				patron = /[A-Za-z]/;
				tecla_final = String.fromCharCode(tecla);
				return patron.test(tecla_final);
			};
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
			};

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


			var maxBirthdayDate = new Date();
			maxBirthdayDate.setFullYear( maxBirthdayDate.getFullYear() - 18 );
			$('#dpk').datepicker({
				language: "es",
				autoclose: true,
				toggleActive: true,
				clearBtn: false,
				orientation: "auto right",
				endDate: maxBirthdayDate
			});
		</script>
    </body>
</html>
