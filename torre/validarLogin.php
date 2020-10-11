<?php		
	session_name("tetraa");	
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla4.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->

<?php require_once('../conexiones/elrecreoweb.php'); ?>

<meta name="Description" content="Turismo" />
<meta name="Keywords" content="Operadores, Viajes, Turismo ,Aventura, Colombia, Travel Tour, colombia, bogota, boyacá, duitama" />
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
        <link href="../assets/css/estilogeneral.css"  rel="stylesheet" media="all">
        
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->

</head>

<body>
        <div class="container" id="general">       
            
            <div id="logo" class="span4">  
                <img src="../imagenes/logo.png" > 
            </div> 
                            

       </div>
       
        
        
       <div class="container" id="generalContenido">
       				<div id="centrado"   >
                           
							<!-- InstanceBeginEditable name="EditRegion5" -->
                            
                            
									<?php          
									
										
									    if (!$connElrecqcgWeb) {
											echo "Error: No se pudo conectar a MySQL." .
											exit;
										}
										$key = $_POST['g-recaptcha-response'];
										$usuario = $_POST['nnombre'];
										$pass = $_POST['npassword'];
										if(empty($key) ||empty($usuario) || empty($pass) || $key=='' || $pass=='' || $usuario==''){
											echo"<script language='javascript'>window.location='loginAdministracion.php'</script>;";
											//header("Location: /paginas/loginAdministracion.php");
											exit();
										}									
										//mysql_query ("SET NAMES 'utf8'");
										$query_Recordset1 = "SELECT * from usuarios where NOMBRE_USUARIO='" . $usuario . "'";
										$Recordset1 = mysqli_query($connElrecqcgWeb, $query_Recordset1) or die(mysql_error());	
										if($row = mysqli_fetch_array($Recordset1)){
											$sha1_first_value = sha1("secret", FALSE);
    										$sha1_second_value = hash("sha256", $pass, FALSE);
											if($sha1_second_value == $row['PASSWORD']){												
												$_SESSION['usuario'] = $usuario;
												echo"<script language='javascript'>window.location='administracion.php'</script>;";
												exit();
											}else{
												echo"<script language='javascript'>window.location='loginAdministracion.php'</script>;";
												exit();
											}
										}else{
											echo"<script language='javascript'>window.location='loginAdministracion.php'</script>;";
											exit();
										}			
										mysqli_close($enlace);											
									?>
                                 
                            <!-- InstanceEndEditable -->                                                                                                                 				   
                       
                	</div>                                 
       </div>
       
       
       <div class="container" id="generalContenidoInfo">
       				<div id="centrado"   >
					
					
						<!-- InstanceBeginEditable name="EditRegion3" -->
                            EditRegion3
                        <!-- InstanceEndEditable -->     
                        
                       
                       
                	</div>                                 
				   

       </div>
       
       
       <div class="container" id="generalPie">
                <div id="footer" class="span12">
                	
                </div>  
        </div>




        <script src="../assets/js/bootstrap.js"></script>
        <script src="../assets/js/util-formularios.js"></script>     
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap-transition.js"></script>
        <script src="../assets/js/bootstrap-alert.js"></script>
        <script src="../assets/js/bootstrap-modal.js"></script>
        <script src="../assets/js/bootstrap-dropdown.js"></script>
        <script src="../assets/js/bootstrap-scrollspy.js"></script>
        <script src="../assets/js/bootstrap-tab.js"></script>
        <script src="../assets/js/bootstrap-tooltip.js"></script>
        <script src="../assets/js/bootstrap-popover.js"></script>
        <script src="../assets/js/bootstrap-button.js"></script>
        <script src="../assets/js/bootstrap-collapse.js"></script>
        <script src="../assets/js/bootstrap-carousel.js"></script>
        <script src="../assets/js/bootstrap-typeahead.js"></script>
        <script src="../assets/js/modernizr.js"></script>
		<script src="../assets/js/jquery.tools.min.js"></script>  
</body>
<!-- InstanceEnd --></html>

