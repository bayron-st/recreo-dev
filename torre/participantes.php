<?php		
	
	session_name("tetraa");	
	session_start();
	
	if( isset($_SESSION["usuario"]) == true ){
		$nombreUsuario = $_SESSION["usuario"];
		if(empty($nombreUsuario) || $nombreUsuario=='' ){
			echo"<script language='javascript'>window.location='loginAdministracion.php'</script>;";
			session_destroy();
		}
	}else{
		echo"<script language='javascript'>window.location='loginAdministracion.php'</script>;";
		session_destroy();
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla4.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->

<?php require_once('../conexiones/elrecreoweb.php'); ?>

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
                            	<?php require_once('menuAdministracion.php'); ?>
                            <!-- InstanceEndEditable -->                                                                                                                 				   
                       
                	</div>                                 
       </div>
       
       
       <div class="container" id="generalContenidoInfo">
       				<div id="centrado"   >
					
					
						<!-- InstanceBeginEditable name="EditRegion3" -->
                        
							<script>
                                $(document).ready(function () {
                                  $('#dtBasicExample').DataTable();
                                  $('.dataTables_length').addClass('bs-select');
                                });						
                            </script>
                                     <div align="center"><strong>Participantes</strong><br />
                                     </div>
                                     <br />
                                             
                                     <?PHP 									
										// este archivo  muestra todas los planes //
										
										 //mysql_query ("SET NAMES 'utf8'");
										 $query_Recordset1 = "SELECT 
										 						P.ID_PARTICIPANTE, 
																PA.NOMBRE PAIS, 
																P.NOMBRES, 
																P.APELLIDOS, 
																P.ANO_NACIMIENTO, 
																P.MES_NACIMIENTO, 
																P.DIA_NACIMIENTO, 
																P.IDENTIFICACION, 
																P.TELEFONO, 
																P.EMAIL, 
																P.FECHA
																FROM participantes P,
																paises PA
																WHERE P.ID_PAIS = PA.ID_PAIS_SIG
																ORDER BY ID_PARTICIPANTE ";
										 
										 $Recordset1 = mysqli_query($connElrecqcgWeb, $query_Recordset1) or die(mysql_error());
										 
									 
									
									 ?>
                                             
                                           </p>
                                         </blockquote>
                                       </blockquote>
                                     </blockquote>
                                   </blockquote>
                            </blockquote>
                            
                            
							
                                             
                                     	
                            
										 <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
										 <thead>
												<tr>
												  <th class="th-sm">id</th>
												  <th class="th-sm">País</th>
												  <th class="th-sm">Identificacion</th>
												  <th class="th-sm">Nombres</th>
												  <th class="th-sm">Apellidos</th>
												  <th class="th-sm">Año Nacimiento</th>
												  <th class="th-sm">Mes Nacimiento</th>
												  <th class="th-sm">Día Nacimiento</th>
												  <th class="th-sm">Teléfono</th>
												  <th class="th-sm">Email</th>
												  <th class="th-sm">Fecha Registro</th>
												  <th class="th-sm"></th>
												</tr>
										  </thead>  
										  <tbody>
										<?PHP  
											while($row = mysqli_fetch_array($Recordset1))  // aqui hacemos ya la llamada a la base de dqatos 
										 {
											 echo '<tr>
												<td>'.$row[ID_PARTICIPANTE]. '</td>
												<td>'.$row[PAIS]. '</td>												
												<td>'.$row[IDENTIFICACION].'</td>															
												<td>'.$row[NOMBRES]. '</td>												
												<td>'.$row[APELLIDOS].'</td>															
												<td>'.$row[ANO_NACIMIENTO].'</td>															
												<td>'.$row[MES_NACIMIENTO].'</td>															
												<td>'.$row[DIA_NACIMIENTO].'</td>															
												<td>'.$row[TELEFONO].'</td>															
												<td>'.$row[EMAIL].'</td>															
												<td>'.$row[FECHA].'</td>															
												<td></td>																								
											  </tr>';
										 } 
									 
									
									 ?> 
                                     
										  </tbody>
										  <tfoot>
											<tr>
												  <th class="th-sm">id</th>
												  <th class="th-sm">País</th>
												  <th class="th-sm">Identificacion</th>
												  <th class="th-sm">Nombres</th>
												  <th class="th-sm">Apellidos</th>
												  <th class="th-sm">Año Nacimiento</th>
												  <th class="th-sm">Mes Nacimiento</th>
												  <th class="th-sm">Día Nacimiento</th>
												  <th class="th-sm">Teléfono</th>
												  <th class="th-sm">Usuario</th>
												  <th class="th-sm">Fecha Registro</th>
												  <th class="th-sm"></th>
											</tr>
										  </tfoot>
										</table>
                            
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

