


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
        <?php echo 'REGISTRARSE'; ?> | <?php echo $system_name; ?>
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

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
          <?php echo form_open(site_url('login/register/create') , array('enctype' => 'multipart/form-data'));?>



						<div class="form-group">
							<input type="text" class="form-control" name="nombres" placeholder="<?php echo 'NOMBRES'?>"
                required autocomplete="off">
						</div>

            <div class="form-group">
							<input type="text" class="form-control" name="apellidos" placeholder="<?php echo 'APELLIDOS'?>"
                required autocomplete="off">
						</div>


            <div class="form-group">

                <select name="tipo_documento" class="form-control selectboxit">
                                <option value=""><?php echo 'Tipo de Documento';?></option>
                                <option value="CC"><?php echo 'CEDULA DE CIUDADANIA';?></option>
                                <option value="CE"><?php echo 'CEDULA DE EXTRANJERIA';?></option>
                                <option value="DNIEC"><?php echo 'DNI ECUADOR';?></option>
                                <option value="DNIPE"><?php echo 'DNI PERU';?></option>

                            </select>
            </div>

            <div class="form-group">
							<input type="text" class="form-control" name="identificacion" onkeypress="return check1(event)" placeholder="<?php echo 'NUMERO DE DOCUMENTO'?>"
                required autocomplete="off">
						</div>

            <div class="form-group">

                <select name="id_pais" class="form-control selectboxit">
                                <option value=""><?php echo 'Seleccionar Pais';?></option>
                                <option value="CO"><?php echo 'COLOMBIA';?></option>
                                <option value="EC"><?php echo 'ECUADOR';?></option>
                                <option value="PE"><?php echo 'PERU';?></option>

                            </select>
            </div>

              <div class="form-group">

                <input type="text" name="fecha_nacimiento" id="datepicker" class="form-control" placeholder="<?php echo 'FECHA DE NACIMIENTO'?>" autocomplete="off" >

              </div>

              <script>
                var maxBirthdayDate = new Date();
                maxBirthdayDate.setFullYear( maxBirthdayDate.getFullYear() - 18 );
                $( "#datepicker" ).datepicker({
                  dateFormat: 'dd.mm.yy',
                  changeMonth: true,
                  changeYear: true,
                  maxDate: maxBirthdayDate
                });
              </script>

            <div class="form-group">
							<input type="text" class="form-control" name="telefono" placeholder="<?php echo 'CELULAR'?>"
                required autocomplete="off">
						</div>

            <div class="form-group">
							<input type="email" class="form-control" name="email" placeholder="<?php echo 'CORREO ELECTRONICO'?>"
                required autocomplete="off">
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
                  if ($loc == 'w') {
                    echo '<input type="checkbox" name="aceptar" value="ACEPTO" required> Aceptar <a style="text-decoration: underline; color:#ffffff" href="https://elrecreoesdetodos.com/TYC/dashboard/Colombia-T&C.pdf" target="_blank" style="color:white">terminos y condiciones.</a>';
                  }
                ?>
            </div>


						<button type="submit" class="btn btn-primary"><?php echo 'REGISTRARSE' ?><i class="fa fa-unlock"></i></button>

				</div>
			</div>

       <div class="image-area">


       </div>
			<?php echo form_close();?>
		</div>

    <script src="<?php echo base_url('assets/login_page/js/vendor/jquery-1.12.0.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-notify.js');?>"></script>
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

    </script>


    </body>
</html>
