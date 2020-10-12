
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title></title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/fancybox/jquery.fancybox-1.3.4.js');?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/fancybox/jquery.fancybox-1.3.4.css');?>" media="screen" />

    <script type="text/javascript">
        $(document).ready(function() {

            $("#yt").click(function() {
                $.fancybox({
                        'padding'        : 0,
                        'autoScale'      : false,
                        'transitionIn'   : 'none',
                        'transitionOut'  : 'none',
                        'title'          : this.title,
                        'width'          : 680,
                        'height'         : 495,
                        'href'           : this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
                        'type'           : 'swf',
                        'swf'            : {
                            'wmode'              : 'transparent',
                            'allowfullscreen'    : 'true'
                        }
                    });
                return false;
            });
        });
        $('#foo').bind('click', function() {
              alert($(this).text());
            });
            $('#foo').trigger('click');
    </script>
</head>

<body onload='$("#yt").trigger("click");'>

       
        <p><a id="yt" title="" href="https://www.youtube.com/watch?v=0zrb-0BhrWU&feature=emb_logo&ab_channel=ELRECREOESDETODOS"></a></p>
</body>
</html>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div align="center"class="col-md-12">
                    <img src="<?php echo base_url('uploads/logo.png');?>" >
					<div class="row">
						<div class="col-md-12"> <br>
                        <img src="<?php echo base_url('uploads/inicio/familia_inicio.jpg');?>" >

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div align="center" class="col-md-12"> <br></BR>
                <img src="<?php echo base_url('uploads/inicio/texto_1.png');?>" >
					<div class="row">
						<div class="col-md-12">
                        <img src="<?php echo base_url('uploads/inicio/premios-bienvenida_2celulares.jpg');?>" >
                        
                        <br><br><br><img src="<?php echo base_url('uploads/inicio/texto3.png');?>" >
                        
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>