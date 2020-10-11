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
            	<a href="como.php"><img src="../imagenes/boton_como_participar_roll_over.png" width="100%"/></a>
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
            	<a href="premios.php"><img src="../imagenes/boton_premios.png" width="100%"/></a>
            </div> 
            <div class="opcionMenu" >
	          	<img src="../imagenes/barraVerticalEncabezado.png"  width="70%" />
            </div> 
            <div class="opcionMenu" >
            	<a href="perfil.php"><img src="../imagenes/boton_usuario.png" width="75%"/></a> 
            </div> 
            <div style="color:#039; font-size: 5vw;">
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
    
    
     	
          <div class="contentidoIzquierda" align="center">            	
          	<img src="../imagenes/texto_1_como.png" width="80%" />
            <br>
            <div class="recuadroAzulDos" align="center">
              <br>
              <?php
                if($idPais == 1){
                    echo '
                        <iframe width="560" height="315" style="margin-bottom:15px;" src="https://www.youtube.com/embed/0zrb-0BhrWU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    ';
                } else if($idPais == 2) {
                    echo '
                        <iframe width="560" height="315" style="margin-bottom:15px;" src="https://www.youtube.com/embed/zL1awpJ4pg0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    ';
                } else if($idPais == 3) {
                    echo '
                        <iframe width="560" height="315" style="margin-bottom:15px;" src="https://www.youtube.com/embed/sLCUs_8y8iY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    ';
                } else {
                    echo 'Sin ubicación geográfica';
                }
              ?>
              <center><a class="btn btn-small" style="color:#ffffff" href="https://api.whatsapp.com/send?phone=+51902030519&text=Hola%20quiero%20informaci%C3%B3n" target="_blank"><img src="../imagenes/registra-compras.png" width="90%"></a></center>
            </div>
          </div>  
          <div class="contentidoDerecha">   
              <br>        		
              <div class="recuadroBlanco">
              		<img src="../imagenes/texto_2_como.png" width="30%"  />
              </div>                
              <br />		
              <div class="recuadroBlanco">
              		<img src="../imagenes/texto_3_como.png" width="80%"  />
              </div>                   
              <br />      	         	                 		
              <div class="recuadroBlanco">
              		<img src="../imagenes/texto_4_como.png" width="80%"  />
              </div>      
              <br>         	         	                 		
              <div class="recuadroBlanco">
              		<img src="../imagenes/texto_5_como.png" width="80%"  />
              </div>      
              <br>         	         	                 		
              <div class="recuadroBlanco">
              		<img src="../imagenes/texto_6_como.png" width="80%"  />
              </div>      
              <br>        		    	          	
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

