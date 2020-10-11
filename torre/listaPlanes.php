<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla4.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->

<?php require_once('../conexiones/elrecreoweb.php'); ?>

<meta name="Description" content="Turismo" />
<meta name="Keywords" content="Operadores, Viajes, Turismo ,Aventura, Colombia, Travel Tour, colombia, bogota, boyacá, duitama" />
<title>AKIXTREM</title>
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
                                 
                                 <div class="container" id="generalMenu">    
                                        <nav>
                                            <ul class="fancyNav" style="width:100%;">
                                                  <li id="news" class="opcionMenuB"><a href="administracion.php" class="opcionMenuB">Administración</a></li>
                                                  <li id="news" class="opcionMenuB"><a href="agregarPlan.php" class="opcionMenuB">Agregar Destino</a></li>
                                                  <li id="news" class="opcionMenuE"><a href="salirLogin.php" class="opcionMenuB">Salir</a></li>
                                            </ul>
                                        </nav>                                           
                               </div>
                               
                                           <p><br />
                                             <div align="center"><strong>Lista de Destinos </strong><br />
                                             </div>
                                             <br />
                                             
                                             <?PHP 									
									// este archivo  muestra todas los planes //
									
									 mysql_query ("SET NAMES 'utf8'");
									 $query_Recordset1 = "SELECT * FROM `PLANES` ORDER BY `id` ";
									 $Recordset1 = mysql_query($query_Recordset1, $AkixtremWeb) or die(mysql_error());
									
									 //$query = mysql_query("SELECT * FROM `PLANES` ORDER BY `id` ");
									 echo'<table width="85%" border="3" align="center" cellpadding="2" cellspacing="2">';
									 echo'<tr>
											 <td width="5%" bgcolor="#93A5C4" align="center">id</td>
											<td width="15%" bgcolor="#93A5C4" align="center">Nombre</td>
											<td width="20$" bgcolor="#93A5C4" align="center">Descripción</td>
											<td width="35%" bgcolor="#93A5C4" align="center">Contenido</td>
											<td width="10%" bgcolor="#93A5C4" align="center">Destacado</td>
											<td width="10%" bgcolor="#93A5C4" align="center">Activo</td>											
											<td width="5%" bgcolor="#93A5C4"></td>
										  </tr>';
									 while($row = mysql_fetch_array($Recordset1))  // aqui hacemos ya la llamada a la base de dqatos 
									 {
										 $imagenDestacado = "noseleccionado.png";
										 if ($row[destacado] == 1){
											 $imagenDestacado = "seleccionado.png";
										 }
										 $imagenActivo = "noseleccionado.png";
										 if ($row[activo] == 1){
											 $imagenActivo = "seleccionado.png";
										 }
										 $id = $row[id];
										 $link = "editPlan.php?id=$id";  // asignamos una variable con un link del perfil de la descarga
										 echo '<tr>
											<td>
											<p align="center"><span style="FONT-SIZE: 8pt"><font color="#315090"></font>
														<strong style="font-weight: 400"> '.$row[id]. '</strong></span></td>
											<td>
											<p align="center"><span style="FONT-SIZE: 8pt"><font color="#315090"></font>
														<strong style="font-weight: 400"> '.$row[nombre]. '</strong></span></td>
											
											<td>
											<p align="center"><span style="FONT-SIZE: 8pt"><font color="#315090"></font>
														<strong style="font-weight: 400">'.$row[descripcion]. '</strong></span></td>
											
											<td>
											<p align="center"><span style="FONT-SIZE: 8pt"><font color="#315090"></font>
														<strong style="font-weight: 400">'.$row[contenido].'</strong></span> </td>
														
											<td>
											<p align="center"><span style="FONT-SIZE: 8pt"><font color="#315090"></font>
														<strong style="font-weight: 400"><a href="cambiarDestacado.php?id='.$row[id].'&destacado='.$row[destacado].'"><img src="../imagenes/'. $imagenDestacado. '" width="50" height="50" alt="Destacado" /></a></strong></span> </td>
											<td>
											<p align="center"><span style="FONT-SIZE: 8pt"><font color="#315090"></font>
														<strong style="font-weight: 400"><a href="cambiarActivo.php?id='.$row[id].'&activo='.$row[activo].'"><img src="../imagenes/'. $imagenActivo. '" width="50" height="50" alt="Inactivo" /></a></strong></span> </td>
											
											<td>			
											<p align="center"><span style="FONT-SIZE: 8pt"><font color="#315090"></font>
														<strong style="font-weight: 400"><a href="editarPlan.php?id='.$id.'"><img src="../imagenes/editar.png" width="50" height="50" alt="Editar" /></a></strong></span> </td>
										  </tr>';
									 } 
									  echo'</table><br><br>'; 
									 
									
								?>
                                             
                                           </p>
                                         </blockquote>
                                       </blockquote>
                                     </blockquote>
                                   </blockquote>
                            </blockquote>
							<!-- InstanceEndEditable -->                                                                                                                 				   
                       
                	</div>                                 
       </div>
       
       
       <div class="container" id="generalContenidoInfo">
       				<div id="centrado"   >
					
					
						<!-- InstanceBeginEditable name="EditRegion3" -->
                            Esta sección contiene todos los planes definidos en AkiXtrem.
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

