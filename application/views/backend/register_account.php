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


<script>
$(document).ready(function(){

	$("#div1").hide();
	$("#div2").hide();


	$("#id_captacion").change(function(){

					var  referencias_com_cliente = $('select[id=id_captacion]').val();


				if (referencias_com_cliente == "otro") {
						$("#div1").show();
						$("#div2").show();


					}

					else if (referencias_com_cliente != "otro"  ) {

						$("#div1").hide();
						$("#div2").hide();

					}

	});

});

</script>

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
                  <label for=""><a href="https://elrecreoesdetodos.com/TYC/terminosYCondiciones.pdf"> Ver terminos y condiciones </a></label>
                         <label>
                         			<input type="radio" name="optionsRadios" value="aceptar"  name="terminos" checked="" required> Aceptar términos y condiciones
                        </label>
         		</div>


						<div class="form-group">
							<input type="text" class="form-control" name="name" placeholder="<?php echo 'NOMBRES'?>"
                required autocomplete="off">
						</div>

            <div class="form-group">
							<input type="text" class="form-control" name="apellido" placeholder="<?php echo 'APELLIDOS'?>"
                required autocomplete="off">
						</div>


            <div class="form-group">

                <select name="identificacion" class="form-control selectboxit">
                                <option value=""><?php echo 'Tipo de Documento';?></option>
                                <option value="cedula"><?php echo 'CEDULA';?></option>
                                <option value="dni"><?php echo 'DNI';?></option>
                            </select>
            </div>

            <div class="form-group">
							<input type="text" class="form-control" name="num_documento" placeholder="<?php echo 'NUMERO DE DOCUMENTO'?>"
                required autocomplete="off">
						</div>

            <div class="form-group">

                <select name="pais" class="form-control selectboxit">
                                <option value=""><?php echo 'Seleccionar Pais';?></option>
                                <option value="1"><?php echo 'COLOMBIA';?></option>
                                <option value="2"><?php echo 'ECUADOR';?></option>
                                <option value="3"><?php echo 'PERU';?></option>

                            </select>
            </div>

            <div class="form-group">

                <input type="text" name="fecha_nacimiento" id="datepicker" class="form-control" placeholder="<?php echo 'FECHA DE NACIMIENTO'?>" autocomplete="off" >


                <script type="text/javascript">
                                  var maxBirthdayDate = new Date();
                  maxBirthdayDate.setFullYear( maxBirthdayDate.getFullYear() - 18 );

                  $( "#datepicker" ).datepicker({
                    dateFormat: 'dd.mm.yy',
                    changeMonth: true,
                    changeYear: true,
                    maxDate: maxBirthdayDate
                  });
                </script>

              </div>

            <div class="form-group">
							<input type="text" class="form-control" name="phone" placeholder="<?php echo 'CELULAR'?>"
                required autocomplete="off">
						</div>

            <div class="form-group">
							<input type="email" class="form-control" name="email" placeholder="<?php echo 'CORREO ELECTRONICO'?>"
                required autocomplete="off">
						</div>


              <div class="form-group">
                <div class="radio">
										<label>
											<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">Radio Input 1
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio Input 2
										</label>
									</div>
              </div>

              <div class="col-sm-5" id="div1">
                            <h4>&nbsp;<strong>Marca:</strong> </h4>


                         <input  id="marca5" type="text" class="form-control" name="marca"  value=" " onkeyup="cap_marca();">

                          </div>

                          <div id="div2" class="col-sm-5" >
                            <h4>&nbsp;<strong>Modelo:</strong> </h4>


                              <input id="modelo5" type="text" class="form-control" name="modelo"   value=" " onkeyup="cap_modelo();">
                            </div>



            <div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="<?php echo 'CONTRASEÑA'?>"
                required autocomplete="off">
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


    </body>
</html>
