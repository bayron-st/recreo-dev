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
    </head>

    <body>
		<div class="main-content-wrapper">
			<div class="login-area">
				
				<div class="login-header">
					<img src="<?php echo base_url('assets/login_page/img/logo.png');?>" width="60%" max-width="200px" alt="">
					<h2 class="title"><?php echo $system_name; ?></h2>
					<p>* Para registrarte debes ser mayor de edad.</p>
				</div>


				<div class="login-content">
					<?php echo form_open(site_url('login/register/create') , array('enctype' => 'multipart/form-data'));?>
					<div class="form-group">
						<select name="ID_PAIS" class="form-control selectboxit">
							<option value=""><?php echo 'SELECIONAR PAIS';?></option>
							<option value="CO"><?php echo 'COLOMBIA';?></option>
							<option value="EC"><?php echo 'ECUADOR';?></option>
							<option value="PE"><?php echo 'PERU';?></option>
						</select>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" name="nombres" 
						onkeyup="javascript:this.value=this.value.toUpperCase();" 
						onkeypress="return check2(event)" placeholder="<?php echo 'NOMBRES'?>" 
						required autocomplete="off">
					</div>

					<div class="form-group">
						<input type="text" class="form-control" name="apellidos" 
						onkeyup="javascript:this.value=this.value.toUpperCase();" 
						onkeypress="return check2(event)" placeholder="<?php echo 'APELLIDOS'?>"
						required autocomplete="off">
					</div>

					<div class="form-group">
						<input type="text" class="form-control" name="identificacion"
						onkeyup="javascript:this.value=this.value.toUpperCase();" 
						onkeypress="return check3(event)" placeholder="NUMERO DE DOCUMENTO"
						required autocomplete="off">
					</div>

					<div class="form-group">
						<input type="text" id="dpk" class="form-control" name="ANO_NACIMIENTO" 
						placeholder="AÑO DE NACIMIENTO">
					</div>

					<div class="form-group">
						<input type="text" class="form-control" name="telefono"  
						onkeypress="return check1(event)" placeholder="TELEFONO CELULAR" 
						required autocomplete="off">
					</div>

					<div class="form-group">
						<input type="email" class="form-control" name="email" 
						placeholder="CORREO ELECTRONICO" required autocomplete="off">
					</div>

					<div class="form-group">
						<?php
							$loc = "w";
							$loc = $_GET['loc'];
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
					<?php
						$loc = 'w';
						$loc = $_GET['loc'];
						if ($loc != 'w' && $loc == 'co') {
							echo '<p>¿Ya tienes una cuenta? <a style="color:#ffffff; text-decoration: underline;" href="'.base_url('/?loc=co').'">Inicia sesión</a></p>';
						}
						if ($loc != 'w' && $loc == 'ec') {
							echo '<p>¿Ya tienes una cuenta? <a style="color:#ffffff; text-decoration: underline;" href="'.base_url('/?loc=ec').'">Inicia sesión</a></p>';
						}
						if ($loc != 'w' && $loc == 'pe') {
							echo '<p>¿Ya tienes una cuenta? <a style="color:#ffffff; text-decoration: underline;" href="'.base_url('/?loc=pe').'">Inicia sesión</a></p>';
						}
						if ($loc == 'w' || !isset($_GET['loc'])) {
							echo '<p>¿Ya tienes una cuenta? <a style="color:#ffffff; text-decoration: underline;" href="'.base_url('/?loc=co').'">Inicia sesión</a></p>';
						}
					?>
				</div>
			</div>
    		<div class="image-area"></div>
			<?php echo form_close();?>
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
			var maxBirthdayDate = new Date();
			maxBirthdayDate.setFullYear( maxBirthdayDate.getFullYear() - 18 );
			
			$('#dpk').datepicker({
				language: "es",
				autoclose: true,
				toggleActive: true,
				clearBtn: true,
				orientation: "auto right",
				endDate: "31/10/2002"
			});
		</script>
    </body>
</html>
