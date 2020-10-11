<?php		
	session_name("tetra");
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla4publico.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->


<?php require_once('../conexiones/elrecreoweb.php'); ?>
<?php
// esta archivo insertara los datos del formulario a la base de datos
	$errorValidacion = "";
	if(isset($_POST['g-recaptcha-response'])){
		$key = $_POST['g-recaptcha-response'];
		$pais = $_POST['pais'];
		$identificacion = $_POST['identificacion'];
		$telefono = $_POST['telefono'];
	} 
	
	if (!empty($identificacion) && $identificacion!='' && !empty($telefono) && $telefono!=''){	
		if (!empty($key) && $key!=''){	
			$query_Recordset1 = "SELECT * from PARTICIPANTES where IDENTIFICACION = '" . $identificacion . "' AND TELEFONO = '" . $telefono . "' AND ID_PAIS = ".$pais;
			$Recordset1 = mysqli_query($connElrecqcgWeb, $query_Recordset1) or die(mysql_error());
			if($row = mysqli_fetch_array($Recordset1)){
												$sha1_first_value = sha1("secret", FALSE);
												$sha1_second_value = hash("sha256", $pass, FALSE);
												
												//session_start();
												$nombres = explode(" ", $row[NOMBRES]);
												$_SESSION["identificacion"] = $identificacion;
												$_SESSION["nombres"] = $nombres[0];
												$_SESSION["idpais"] = $pais;
												$_SESSION["idparticipante"] = $row[ID_PARTICIPANTE];
												
		
												
												///$_SESSION['usuario']
												//echo "Sesión iniciada y establecido nombre de usuario!" . $_SESSION["nombres"];
												echo"<script language='javascript'>window.location='inicio.php'</script>;";		
			}else{
				$errorValidacion = "Identificación o teléfono errado."; 
			}
			mysqli_close($enlace);
		}else{
			$errorValidacion = "Debe seleccionar la casilla 'No soy un robot'."; 
		}
	}
?>  

<?php 
	require_once "recaptchalib.php";
	// Register API keys at https://www.google.com/recaptcha/admin
	$siteKey = "6LfyBM8ZAAAAAF5TbSj7rSBAZFCevDhNsI3LN2YW";
	$secret = "6LfyBM8ZAAAAAOQn4Azol89GQvVJA78V84Jnq8ko";
	// reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
	$lang = "en";
	
	// The response from reCAPTCHA
	$resp = null;
	// The error code from reCAPTCHA, if any
	$error = null;
	
	$reCaptcha = new ReCaptcha($secret);
	
	// Was there a reCAPTCHA response?
	if (isset($_POST["g-recaptcha-response"])) {
		$resp = $reCaptcha->verifyResponse(
			$_SERVER["REMOTE_ADDR"],
			$_POST["g-recaptcha-response"]
		);
	}
?>
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
      <div class="headerIzqueirda">
      </div>      
      <div class="headerCentro">
      	<img src="../imagenes/logo.png" width="800%" alt="logo" />
      </div>   
      <div class="headerDerecha">
      </div>
  </div>
  <div class="contentido">
  	<!-- InstanceBeginEditable name="EditRegion3" -->
                             
<script>
	function isNull(campo, nombre){
		valor = document.getElementById(campo, nombre).value;
		if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
			alert('ERROR: El campo "' + nombre + '" no debe ir vacío o lleno de solamente espacios en blanco');
			return false;
		}
		return true;
	} 
	
	
	function validacion() {
		valido = isNull("identificacion", "Identificación");	
		if(valido){
			valido = isNull("telefono", "Teléfono");
		}
		return valido;
	}
</script>     	
          <div class="contentidoIzquierda" align="center">            	
          	<img src="../imagenes/promoConEncabezado.png" width="75%" />
          </div>  
          <div class="contentidoDerecha">           		
              <div class="recuadroBlanco">
              		<img src="../imagenes/paises.png" width="20%"  />
              </div>         	         		
              <div class="recuadroGrisDos">
              		<div  style="width:50%;" align="right">                    
                    	<a href="https://elrecreoesdetodos.com/paginas/registro.php" ><img src="../imagenes/siAunNoMiembro.png" width="40%" style="min-width: 10%;"   /></a>
                    </div>
                    <div  style="width:50%;" align="left"> 
                    	<a href="https://elrecreoesdetodos.com/paginas/registro.php" ><img src="../imagenes/botonRegistrate.png" width="40%"  style="min-width: 10%;"  /></a>
                    </div> 
                    
              </div>                		
              <div class="recuadroBlanco">
              		<img src="../imagenes/iniciaSesion.png" width="50%"  />
              </div>    
              <br>
                            		
              <div class="recuadroBlanco">
					<?php 
											if (!empty($errorValidacion) && $errorValidacion!=''){
                                                echo '<b><p style="color:#FF0000";>'.$errorValidacion.'</p></b>';
                                            }
                    ?>
              </div>         	                 		
              <div class="recuadroBlanco">
              		 <form action="indexDos.php" method="post" onsubmit="return validacion()" >
                         
                     	<br>   
                     	<div class="recuadroBlanco"> 
                                </p><input type="radio" name="pais" value="1"  required><img src="../imagenes/banderaColombia.png" width="17%"  style="min-width: 10%;" /> </p>  
                                <input type="radio" name="pais" value="2"> <img src="../imagenes/banderaEcuador.png" width="17%"  style="min-width: 10%;" /> </p> 
                                <input type="radio" name="pais" value="3"> <img src="../imagenes/banderaPeru.png" width="17%"  style="min-width: 10%;" /></p> 
                        </div> 
                     	<br>
                     
                     	<div class="recuadroBlanco">
                            <b style="margin-right:10px">Identificación</b> <input type="text" name="identificacion" id="identificacion" placeholder="Identificación"  placeholder="Identificación" pattern="[0-9]{5,15}" required/>
                        </div>                        
                     	<div class="recuadroBlanco">
                            <b style="margin-right:10px">Teléfono celular</b> <input type="text" name="telefono" id="telefono" placeholder="Teléfono celular" pattern="[0-9]{10,15}"  required/>
                        </div>                       
                     	<div class="recuadroBlanco">
                                <input type="checkbox" name="aceptar" value="1">Recordar mis datos. 
                        </div>     
                     	<br>                
                     	<div class="recuadroBlanco"> 
                                <div class="g-recaptcha" data-sitekey="<?php echo $siteKey;?>"  ></div>  </p></p>                              
                                <input type="submit" style="width:25%;height:50px; background-color:#033F88; color:#FFF; font-size: 22px;" value="Entrar"/>
                        </div>
                     </form>
                                    <!--js-->
								    <script src='https://www.google.com/recaptcha/api.js'></script>
              </div>          	                 		
              <div class="recuadroBlanco">
              		<img src="../imagenes/premiosA.png" width="35%"  />
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

