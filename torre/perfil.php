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

<?php require_once('../conexiones/elrecreoweb.php'); ?>

<?php	
	
	if (!empty($idParticipante) && $idParticipante!='' ){	
			$query_Recordset1 = "SELECT * from PARTICIPANTES where ID_PARTICIPANTE = " . $idParticipante ;
			$Recordset1 = mysqli_query($connElrecqcgWeb, $query_Recordset1) or die(mysql_error());
			if($row = mysqli_fetch_array($Recordset1)){
				$nombre = $row[NOMBRES] . " " . $row[APELLIDOS];
				$telefono = 0 + $row[TELEFONO] ;
			}else{
				
			}
			mysqli_close($enlace);
	}
	
	$creditosCompras = 0;
	if (!empty($idParticipante) && $idParticipante!='' ){	
	
			$query_Recordset1 = "SELECT SUM(CANTIDAD) from CREDITOS where ID_PARTICIPANTE = " . $idParticipante." and TIPO = 'FACTURA'";
			$Recordset1 = mysqli_query($connElrecqcgWeb, $query_Recordset1) or die(mysql_error());
			if($row = mysqli_fetch_array($Recordset1)){
				$creditosCompras = 0 + $row[0];
			}else{
				
			}
			mysqli_close($enlace);
	}
	
	$creditosJuegos = 0;
	if (!empty($idParticipante) && $idParticipante!='' ){	
	
			$query_Recordset1 = "SELECT SUM(CANTIDAD) from CREDITOS where ID_PARTICIPANTE = " . $idParticipante." and TIPO = 'JUEGO'";
			$Recordset1 = mysqli_query($connElrecqcgWeb, $query_Recordset1) or die(mysql_error());
			if($row = mysqli_fetch_array($Recordset1)){
				$creditosJuegos = 0 + $row[0];
			}else{
				
			}
			mysqli_close($enlace);
	}
	
	$redimidosNetfix = 0;
	if (!empty($idParticipante) && $idParticipante!='' ){	
	
			$query_Recordset1 = "SELECT SUM(CANTIDAD) from CANJES where ID_PARTICIPANTE = " . $idParticipante." and ID_CODIGO IS NULL";
			$Recordset1 = mysqli_query($connElrecqcgWeb, $query_Recordset1) or die(mysql_error());
			if($row = mysqli_fetch_array($Recordset1)){
				$redimidosNetfix = 0 + $row[0];
			}else{
				
			}
			mysqli_close($enlace);
	}
	
?>

<?php	
	$redimidosCelular = 0;
	if (!empty($idParticipante) && $idParticipante!='' ){	
	
			$query_Recordset1 = "SELECT SUM(CANTIDAD) from CANJES where ID_PARTICIPANTE = " . $idParticipante." and ID_CODIGO IS NOT NULL";
			$Recordset1 = mysqli_query($connElrecqcgWeb, $query_Recordset1) or die(mysql_error());
			if($row = mysqli_fetch_array($Recordset1)){
				$redimidosCelular = 0 + $row[0];
			}else{
				
			}
			mysqli_close($enlace);
	}
	
	$creditosDisponibles = $creditosCompras + $creditosJuegos - $redimidosNetfix - $redimidosCelular;
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
            	<a href="premios.php"><img src="../imagenes/boton_premios.png" width="100%"/></a>
            </div> 
            <div class="opcionMenu" >
	          	<img src="../imagenes/barraVerticalEncabezado.png"  width="70%" />
            </div> 
            <div class="opcionMenu" >
            	<a href="perfil.php"><img src="../imagenes/boton_usuario_roll_over.png" width="75%"/></a> 
            </div> 
            <div style="color:#FFF; font-size: 5vw;">
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
          		<img src="../imagenes/texto_1_perfil.png" width="10%" />	
          </div>  	
          <div class="recuadroAzul" style="width:auto !important;">   
              <div class="contentidoIzquierdaDos">       
              	<div class="contentidoIzquierdaSeccion">
                    <img src="../imagenes/imagen_usuario.png" width="30%" />
                     
                    <br>
                    <div class="recuadroBlancoTres" style="text-align:left !inportant;">
                      <b style="color:#666666;">Nombre: </b><b style="color:#033F88"><?php if (isset($nombre)) {echo $nombre;}?></b>
                    </div> 
                    <br>
                    <div class="recuadroBlancoTres">
                      <b style="color:#666666">Telefono: </b><b style="color:#033F88"><?php if (isset($telefono)) {echo $telefono;}?></b> 
                    </div> 
                    <br>
                    <img src="../imagenes/texto_2_perfil.png" width="75%" style="margin-bottom:20px"/><br>
										<a class="btn btn-small btn-success" style="color:#ffffff; border: 2px solid #FFFFFF" href="https://api.whatsapp.com/send?phone=+51902030519&text=Hola%20quiero%20informaci%C3%B3n" target="_blank">REGISTRAR<BR>COMPRAS  <i class="fa fa-whatsapp" style="font-size:16px;"></i></a>
                    <a class="btn btn-small btn-primary" style="color:#ffffff; border: 2px solid #FFFFFF" href="juego.php">GANAR CREDITOS <BR>ADICIONALES</a>
                    <br>
                 </div>
              </div>  
              <div class="contentidoDerecha">  
                  <div class="contentidoDerechaSeccion" style="padding:20px; backgroud-color:#ececec !important;">
                    <p style="font-family: Oswald; font-size: 25px; color:#033f88; padding:0px;">TOTAL CRÉDITOS ACUMULADOS.</p>
                    <table width="100%">
                      <tbody>
                        <tr style="">
                          <td style="background-color:#033f88; color:#FFFFFF" valign="middle">
                            <p style="font-size:50px; text-align:center; padding:0px;"><?php if (isset($creditosDisponibles)) {echo $creditosDisponibles;}?><img src="../imagenes/creditos_disponibles_b.png"/></p>
                          </td>
                          <td width="20px" style="background-color: #ffffff"></td>
                          <td style="padding:10px;">
                            <table style="background-color:#ffffff;" width="100%">
                              <tbody>
                                <tr style="margin-bottom:5px">
                                  <td width="35%" style="border-right:1px solid #75BEE9;">COMPRAS<br>REGISTRADAS</td>
                                  <td style="padding:10px;"><?php echo $creditosCompras.' Creditos'; ?><img src="../imagenes/compras_registradas_b.png"/></td>
                                </tr>
                              </tbody>
                            </table>
                            <br>
                            <table style="background-color:#ffffff;" width="100%">
                              <tbody>
                                <tr>
                                  <td width="35%"d style="border-right:1px solid #75BEE9;">RETA TU<br>MEMORIA</td>
                                  <td style="padding:10px;"><?php echo $creditosJuegos.' Creditos'; ?><img src="../imagenes/compras_registradas_b.png"/></td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <br>
                    <br>
                    <div class="contentidoDerechaSA">
                        <p style="font-family: Oswald; font-size: 25px; color:#033f88; padding:0px;">PREMIOS REDIMIDOS.</p>
                        <table width="100%">
                          <tr>
                            <td><img src="../imagenes/pin_netfix.png"/></td>
                            <td> <b style="color:#033F88";><?php 	echo $redimidosNetfix.' Creditos'; ?> </b>  </td>
                            <td><img src="../imagenes/imagen_creditos_gris.png"/></td>
                          </tr>
                          <tr>
                            <td><img src="../imagenes/juego_celular.png"/></td>
                            <td> <b style="color:#033F88";><?php 	echo $redimidosCelular.' Creditos'; ?> </b> </td>
                            <td><img src="../imagenes/imagen_creditos_gris.png"/></td>
                          </tr>
                        </table>
                    </div> 
                    
                    <br>
                    <div class="contentidoDerechaSA">
                        <img src="../imagenes/texto_6_perfil.png" />
                    </div> 
                    
                    <br>
                    
                  </div>    
                <br>    		    	          	
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

