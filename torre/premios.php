<?php	
	session_name("tetra");
	session_start();
	if( isset($_SESSION["nombres"]) == true ){
		$nombreUsuario = $_SESSION["nombres"];
		$idPais = $_SESSION["idpais"];
		$idParticipante = $_SESSION["idparticipante"];
		if(empty($nombreUsuario) ||empty($idPais) || empty($idParticipante) || $nombreUsuario=='' || $idPais=='' || $idParticipante==''){
			echo"<script language='javascript'>window.location='index.php'</script>;";
			session_destroy();
		}
	}else{
		echo"<script language='javascript'>window.location='index.php'</script>;";
		session_destroy();
	}
?>
<script src="jquery-3.3.1.min.js"></script>

<link rel="stylesheet" href="assets/plugins/sweetAlert2/sweetalert2.min.css">
<link rel="stylesheet" href="assets/plugins/animate.css/animate.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla5publico.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->

<meta name="Description" content="Turismo" />
<meta name="Keywords" content="RECREO" />
<title>El Recreo es de Todos</title>
<link rel="shortcut icon" href="../imagenes/icono.ico" />
    <link rel="icon" type="image/gif" href="../imagenes/animated_favicon1.gif" />
<title><fmt:message key="title"/></title>
        <meta charset="utf-8" />
        <meta name="Description" content="Sitio Web SyDes" />
        <meta name="author" content="Jairo Buitrago" />

<!-- InstanceEndEditable -->
 		<!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->


        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
				<script src="../assets/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../assets/css/styles2.css" />
        <link href="../assets/css/bootstrap.css" rel="stylesheet">
        <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="../assets/css/estilogeneralpublico.css"  rel="stylesheet" media="all">

<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->

</head>

<body>

<div class="container">
  <div class="recuadroBlanco">
  </div>
  <div class="header">
      <div class="headerIzqueirda" align="right">
	  <!-- InstanceBeginEditable name="EditRegion4" -->


            <div class="opcionMenu" >
            	<a href="inicio.php"><img src="../imagenes/boton_inicio.png" width="100%"  /></a>
            </div>
            <div class="opcionMenu" >
          		<img src="../imagenes/barraVerticalEncabezado.png"   width="70%"/>
            </div>
            <div class="opcionMenu" >
            	<a href="como.php"><img src="../imagenes/boton_como_participar.png" width="100%"/></a>
            </div>
	  <!-- InstanceEndEditable -->

    </div>
      <div class="headerCentro">
      	<img src="../imagenes/logo.png" width="800%" alt="logo" />
      </div>
      <div class="headerDerecha" align="left">
	  <!-- InstanceBeginEditable name="EditRegion5" -->



            <div class="opcionMenu" >
            	<a href="juego.php"><img src="../imagenes/boton_juego.png" width="100%" /></a>
            </div>
            <div class="opcionMenu" >
          		<img src="../imagenes/barraVerticalEncabezado.png"   width="70%"/>
            </div>
            <div class="opcionMenu" >
            	<a href="premios.php"><img src="../imagenes/boton_premios_roll_over.png" width="100%"/></a>
            </div>
            <div class="opcionMenu" >
	          	<img src="../imagenes/barraVerticalEncabezado.png"  width="70%" />
            </div>
            <div class="opcionMenu" >
            	<a href="perfil.php"><img src="../imagenes/boton_usuario.png" width="75%"/></a>
            </div>
            <div style="color:#039"; font-size: "5vw;">
                <?php
                  if (isset($nombreUsuario)) {
                    echo $nombreUsuario;
                  } 
                ?>
            </div>
            <div class="opcionMenu" >
	          	<img src="../imagenes/barraVerticalEncabezado.png"  width="70%" />
            </div>
            <div class="opcionMenu" >
	            <a href="salirLoginParticipante.php"><img src="../imagenes/cerrar_session.png" width="50%" title="Salir"/></a>
            </div>
	  <!-- InstanceEndEditable -->

      </div>
  </div>
  <div class="contentido">
  	<!-- InstanceBeginEditable name="EditRegion3" -->

      <div class="recuadroBlancoDos" align="center">
	      <br>
          <div class="recuadroBlanco" align="center">
          		<img src="../imagenes/texto_1_premios.png" width="10%" />
          </div>
          <div class="recuadroAzul" align="center">
              <div class="contentidoTercioUno" align="center">
                    <img src="../imagenes/texto_2_premios.png" width="100%" />
                    <img src="../imagenes/premios-playstation4.jpg" width="100%" />
                    <img src="../imagenes/texto_5_premios.png" width="100%" />
										<a class="btn btn-small btn-success" style="color:#ffffff" href="https://api.whatsapp.com/send?phone=+51902030519&text=Hola%20quiero%20informaci%C3%B3n" target="_blank">REGISTRAR<BR>COMPRAS  <i class="fa fa-whatsapp" style="font-size:16px;"></i></a>
										<!-- <button type="button" class="btn btn-small disabled" disabled="disabled">GANAR CREDITOS <BR>ADICIONALES</button> -->
                    <a class="btn btn-small btn-primary" style="color:#ffffff" href="juego.php">GANAR CREDITOS <BR>ADICIONALES</a>
              </div>
              <div class="contentidoTercioDos">
                    <img src="../imagenes/texto_3_premios.png" width="100%"  />
                    <img src="../imagenes/premios-netflix_spotify.jpg" width="100%" />
                    <img src="../imagenes/texto_6_premios.png" width="100%" />
										<button type="button" class="btn btn-small btn-primary" onClick="mensaje2()">REDIMIR <BR>PREMIOS</button>
                    <a class="btn btn-small btn-success" style="color:#ffffff" href="https://api.whatsapp.com/send?phone=+51902030519&text=Hola%20quiero%20informaci%C3%B3n" target="_blank">REGISTRAR<BR>COMPRAS  <i class="fa fa-whatsapp" style="font-size:16px;"></i></a>
										<!-- <button type="button" class="btn btn-small disabled" disabled="disabled">GANAR CREDITOS <BR>ADICIONALES</button> -->
                    <a class="btn btn-small btn-primary" style="color:#ffffff" href="juego.php">GANAR CREDITOS <BR>ADICIONALES</a>
              </div>
              <div class="contentidoTercioTres">
                    <img src="../imagenes/texto_4_premios.png" width="100%"  />
                    <img src="../imagenes/premios-juegos_celular.jpg" width="100%" />
                    <img src="../imagenes/texto_7_premios.png" width="100%" />
										<button type="button" class="btn btn-small btn-primary" onClick="mensaje()">REDIMIR <BR>PREMIOS</button>
										<a class="btn btn-small btn-success" style="color:#ffffff" href="https://api.whatsapp.com/send?phone=+51902030519&text=Hola%20quiero%20informaci%C3%B3n" target="_blank">REGISTRAR<BR>COMPRAS  <i class="fa fa-whatsapp" style="font-size:16px;"></i></a>
	  							  <!-- <button type="button" class="btn btn-small disabled" disabled="disabled">GANAR CREDITOS <BR>ADICIONALES</button> -->
                    <a class="btn btn-small btn-primary" style="color:#ffffff" href="juego.php">GANAR CREDITOS <BR>ADICIONALES</a>
              </div>
          </div>

      </div>




	<!-- InstanceEndEditable -->
  </div>


  <div class="footer">
      <div class="recuadroAzulClaroDos">
      </div>
      <div class="recuadroGris">
	  	<div class="recuadroGrisIzquierda">
          	<a href="https://rappi.app.link/AbCo1Li2N9" target="_blank"><img src="../imagenes/compraYRecibeDomicilio.png" width="60%" alt="domicilios" /></a>
          	<span style="font-size:12px">
                Políticas de privacidad:<br>
                <a href="https://www.tetrapak.com/co/about/legal-information" style="color:#033F88; padding-right:5px" target="_blank">Colombia</a>
                <a href="https://www.tetrapak.com/pe/about/legal-information" style="color:#033F88; padding-right:5px" target="_blank">Perú</a>
                <a href="https://www.tetrapak.com/ec/about/legal-information" style="color:#033F88; padding-right:5px" target="_blank">Ecuador</a>          	    
          	</span>
          	<span style="font-size:12px">
                Términos y condiciones:<br>
                <a href="../TYC/Colombia-T&C.pdf" style="color:#033F88; padding-right:5px" target="_blank">Colombia</a>
                <a href="../TYC/Peru-T&C.pdf" style="color:#033F88; padding-right:5px" target="_blank">Perú</a>
                <a href="../TYC/Ecuador-T&C.pdf" style="color:#033F88; padding-right:5px" target="_blank">Ecuador</a>
            </span>
          </div> 
          <div class="recuadroGrisDerecha">
          	<img src="../imagenes/siguenos.png"  />
            <a href="http://facebook.com/tetrapakcolombia" target="_blank"><img src="../imagenes/facebook.png"  /></a>
          	<img src="../imagenes/barraVertical.png"  />
            <a href="http://instagram.com/TetraPakAndina" target="_blank"><img src="../imagenes/instagram.png" /></a>
          	<img src="../imagenes/barraVertical.png" />
            <a href="https://www.youtube.com/channel/UChbiQa6dP4GNzsp1CNUBX2w" target="_blank"><img src="../imagenes/youtube.png" /></a>
          	<img src="../imagenes/barraVertical.png" />
            <a href="http://twitter.com/TetraPakAndina" target="_blank"><img src="../imagenes/twitter.png" /></a>
          	<img src="../imagenes/barraVertical.png" />
            <a href="http://linkedin.com/company/tetra-pak/" target="_blank"><img src="../imagenes/in.png" /></a>
          </div>
      </div>
  </div>
</div>
</body>
<!-- InstanceEnd --></html>
<script type="text/javascript">

function getRChar() {
	return (Math.random() * 26 + 10 | 0).toString(36).toUpperCase();
}

function mensaje() {

var aleatorio = getRChar() + getRChar() + Math.floor((Math.random() * 9999) * 4);

  swal.fire({

		html:'<h3 style="color:blue">JUEGOS PARA DISPOSITIVOS MOVILES ANDROID</h3> <br>Tu requerimiento será revisado<br>'+
        'Nos pondremos en contacto contigo si tienes créditos disponibles<br><br> ',
		width: 700,
		showConfirmButton: false,
		showCancelButton: true,
		cancelButtonText: "CERRAR",

  });
}

function mensaje2() {
  swal.fire({

    html:'<h3 style="color:blue">PINES DIGITALES - NETFLIX O SPOTIFY</h3>'+
    '<p style="margin: 15 0 10 0;">Elige tu premio</p>'+
    '<button type="button" class="btn btn-danger btn-large" style="margin: 5;" data-dismiss="modal">Netflix</button>'+
    '<button type="button" class="btn btn-success btn-large" style="margin: 5;" data-dismiss="modal">Spotify</button>'+
    '<p style="margin: 20 5 20 5;">Enviaremos tu premio en un plazo máximo de 72 horas</p>'
    ,
		width: 700,
		showConfirmButton: false,
		showCancelButton: false,
		cancelButtonText: "CERRAR",

  });
}
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
