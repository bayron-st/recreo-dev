<?php		
	session_name("tetra");
	session_start();
	if( isset($_SESSION["nombres"]) == true ){
		$nombreUsuario = $_SESSION["nombres"];
		$idPais = $_SESSION["idpais"];
		$idParticipante = $_SESSION["idparticipante"];
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
        <link rel="stylesheet" href="../assets/css/styles-game.css">
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
            	<a href="juego.php"><img src="../imagenes/boton_juego_roll_over.png" width="100%" /></a>
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
  <div class="contentido" stile="margin-bottom:30px;">
     	
          <div class="contentidoIzquierda" align="center">
            <div class="recuadroAzulDos" align="center">    	
          		<img src="../imagenes/linea_transparente.png" width="15%" />	
            </div>       
            <div class="recuadroAzulDos" align="center">    	
          		<img src="../imagenes/texto_1_juego.png" width="60%" style="margin-bottom:15px"/>
            </div>     
            <div class="recuadroBlanco" align="center">    	
          		<img src="../imagenes/linea_transparente.png" width="15%" />	
            </div>
            <div class="recuadroBlanco" align="center">    	
          		<img src="../imagenes/texto_2_juego.png" width="60%" />
            </div>
          </div>  

          <div class="contentidoDerecha">
              <div class="recuadroBlanco" align="center">    	
                <img src="../imagenes/linea_transparente.png" width="15%" />	
              </div>         		
              <div class="recuadroBlanco">
                <section class="memory-game">
                  <div class="memory-card" data-framework="envase_2">
                    <img class="front-face" src="../assets/img/game/envase_2.jpg" alt="envase_2" />
                    <img class="back-face" src="../assets/img/game/pregunta.png" alt="JS Badge" />
                  </div>
                  <div class="memory-card" data-framework="envase_2">
                    <img class="front-face" src="../assets/img/game/envase_2.jpg" alt="envase_2" />
                    <img class="back-face" src="../assets/img/game/pregunta.png" alt="JS Badge" />
                  </div>

                  <div class="memory-card" data-framework="envase_3">
                    <img class="front-face" src="../assets/img/game/envase_3.jpg" alt="envase_3" />
                    <img class="back-face" src="../assets/img/game/pregunta.png" alt="JS Badge" />
                  </div>
                  <div class="memory-card" data-framework="envase_3">
                    <img class="front-face" src="../assets/img/game/envase_3.jpg" alt="envase_3" />
                    <img class="back-face" src="../assets/img/game/pregunta.png" alt="JS Badge" />
                  </div>

                  <div class="memory-card" data-framework="envase_4">
                    <img class="front-face" src="../assets/img/game/envase_4.jpg" alt="envase_4" />
                    <img class="back-face" src="../assets/img/game/pregunta.png" alt="JS Badge" />
                  </div>
                  <div class="memory-card" data-framework="envase_4">
                    <img class="front-face" src="../assets/img/game/envase_4.jpg" alt="envase_4" />
                    <img class="back-face" src="../assets/img/game/pregunta.png" alt="JS Badge" />
                  </div>

                  <div class="memory-card" data-framework="envase_5">
                    <img class="front-face" src="../assets/img/game/envase_5.jpg" alt="envase_5" />
                    <img class="back-face" src="../assets/img/game/pregunta.png" alt="JS Badge" />
                  </div>
                  <div class="memory-card" data-framework="envase_5">
                    <img class="front-face" src="../assets/img/game/envase_5.jpg" alt="envase_5" />
                    <img class="back-face" src="../assets/img/game/pregunta.png" alt="JS Badge" />
                  </div>

                  <div class="memory-card" data-framework="envase_6">
                    <img class="front-face" src="../assets/img/game/envase_6.jpg" alt="envase_6" />
                    <img class="back-face" src="../assets/img/game/pregunta.png" alt="JS Badge" />
                  </div>
                  <div class="memory-card" data-framework="envase_6">
                    <img class="front-face" src="../assets/img/game/envase_6.jpg" alt="envase_6" />
                    <img class="back-face" src="../assets/img/game/pregunta.png" alt="JS Badge" />
                  </div>

                  <div class="memory-card" data-framework="envase_7">
                    <img class="front-face" src="../assets/img/game/envase_7.jpg" alt="envase_7" />
                    <img class="back-face" src="../assets/img/game/pregunta.png" alt="JS Badge" />
                  </div>
                  <div class="memory-card" data-framework="envase_7">
                    <img class="front-face" src="../assets/img/game/envase_7.jpg" alt="envase_7" />
                    <img class="back-face" src="../assets/img/game/pregunta.png" alt="JS Badge" />
                  </div>

                  <div class="memory-card" data-framework="envase_8">
                    <img class="front-face" src="../assets/img/game/envase_8.jpg" alt="envase_8" />
                    <img class="back-face" src="../assets/img/game/pregunta.png" alt="JS Badge" />
                  </div>
                  <div class="memory-card" data-framework="envase_8">
                    <img class="front-face" src="../assets/img/game/envase_8.jpg" alt="envase_8" />
                    <img class="back-face" src="../assets/img/game/pregunta.png" alt="JS Badge" />
                  </div>

                  <div class="memory-card" data-framework="envase_9">
                    <img class="front-face" src="../assets/img/game/envase_9.jpg" alt="envase_9" />
                    <img class="back-face" src="../assets/img/game/pregunta.png" alt="JS Badge" />
                  </div>
                  <div class="memory-card" data-framework="envase_9">
                    <img class="front-face" src="../assets/img/game/envase_9.jpg" alt="envase_9" />
                    <img class="back-face" src="../assets/img/game/pregunta.png" alt="JS Badge" />
                  </div>

                </section>
              </div>                
              <br />
              <center><input class="btn btn-primary" type="button" value="Volver a jugar" onClick="location.reload()"></center>
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


<script src="../assets/js/scripts-game.js"></script>
</body>
<!-- InstanceEnd --></html>

