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
                <img src="../imagenes/logo.png"> 
            </div> 
                            

       </div>
       
        
        
       <div class="container" id="generalContenido">
       				<div id="centrado"   >
                           
							<!-- InstanceBeginEditable name="EditRegion5" -->
                                 <?PHP 
                                 
                                 	 $id = $_GET['id'];
								  
								 ?>
                                 
                                 <div class="container" id="generalMenu">    
                                        <nav>
                                            <ul class="fancyNav" style="width:100%;">
                                                  <li id="news" class="opcionMenuB"><a href="listaPlanes.php" class="opcionMenuB">Lista de Destinos</a></li>
                                                  <li id="news" class="opcionMenuB"><a href="agregarEvento.php?idPlan=<?PHP echo $id; ?>" class="opcionMenuB">Agregar Evento al Destino</a></li>
                                                  <li id="news" class="opcionMenuE"><a href="salirLogin.php" class="opcionMenuB">Salir</a></li>
                                            </ul>
                                        </nav>   
                               </div>
                               
                            	<div align="center">
                                 <?PHP 
									 mysql_query ("SET NAMES 'utf8'");
									 $query_Recordset0 = "SELECT * FROM PLANES WHERE id = " . $id . " ";
									 $Recordset0 = mysql_query($query_Recordset0, $AkixtremWeb) or die(mysql_error());
									 if($row0 = mysql_fetch_array($Recordset0)){
								 
								 ?>
                                    
                               			<br />
                                         <form action="actualizarPlan.php" method="post" name="contact02" enctype="multipart/form-data">                                                
                                             <table width="65%" border="3" align="center" cellpadding="2" cellspacing="2">   
                                             	<tr>
                                             		<td width="20%" bgcolor="#93A5C4" align="center">
                                                    	<label for="workname">Nombre del Plan:</label> 
                                                    </td>
                                                    <td width="80%" align="center">
                                             			<input type="text" id="nombre" name="nombre" class="required input_field" value="<?PHP echo $row0[nombre]; ?>" size="80"/>
                                                    </td>
                                             	</tr><tr>
                                             		<td width="20%" bgcolor="#93A5C4" align="center">
                                                    	<label for="technique">Descripción:</label>  
                                                    </td>
                                                    <td width="80%" align="center">
                                             			<textarea class="form-control" id="descripcion" name="descripcion" rows="6" cols="80"><?PHP echo $row0[descripcion]; ?></textarea>
                                                    </td>
                                             	</tr><tr>
                                             		<td width="20%" bgcolor="#93A5C4" align="center">
                                                    	<label for="materials">Contenido:</label>  
                                                    </td>
                                                    <td width="80%" align="center">
                                             			<textarea id="contenido" name="contenido" rows="6" cols="80"><?PHP echo $row0[contenido]; ?></textarea>
                                                    </td>
                                             	</tr></tr><tr>
                                             		<td width="20%" bgcolor="#93A5C4" align="center">
                                                    	<label for="materials">Id Youtube:</label>  
                                                    </td>
                                                    <td width="80%" align="center">
                                             			<input type="text" id="idYoutube" name="idYoutube" class="required input_field" value="<?PHP echo $row0[id_youtube]; ?>" size="80"/>
                                                        <div align="center">
                                                             <iframe width="50%" height="215" src="https://www.youtube.com/embed/<?PHP echo $row0[id_youtube]; ?>?autoplay=0" frameborder='0' allowfullscreen webkitallowfullscreen mozallowfullscreen">
                                                            </iframe>                                        
                                                        </div> 
                                                    </td>
                                             	</tr>
                                             </table>   
                                                 
                                                  
                               				<br />
                                                
                                             <button type="submit">Guardar Datos del Destino</button>
                                             <input name="id" type="hidden" value="<?PHP echo $row0[id]; ?>" />
                                                
                                          </form>
                                 
                                 </div>
                                 
                                 
                                 <?PHP 	
									 }
								 								
									// este archivo  muestra todas un plan y sus eventos //
									
									 mysql_query ("SET NAMES 'utf8'");
									 $query_Recordset1 = "SELECT * FROM EVENTO WHERE plan_id = " . $id . " ORDER BY id ";
									 $Recordset1 = mysql_query($query_Recordset1, $AkixtremWeb) or die(mysql_error());
									
									 //$query = mysql_query("SELECT * FROM `PLANES` ORDER BY `id` ");
									 echo'<table width="85%" border="3" align="center" cellpadding="2" cellspacing="2">';
									 echo'<tr>
											 <td width="5%" bgcolor="#93A5C4" align="center">id</td>
											<td width="15%" bgcolor="#93A5C4" align="center">Nombre</td>
											<td width="20$" bgcolor="#93A5C4" align="center">Descripción</td>
											<td width="35%" bgcolor="#93A5C4" align="center">Imagen</td>
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
														<strong style="font-weight: 400"><img src="../imagenes/fotografias/'.$row[imagen].'" width="90%" alt="'.$row[imagen].'" /></strong></span> </td>
														
											<td>
											<p align="center"><span style="FONT-SIZE: 8pt"><font color="#315090"></font>
														<strong style="font-weight: 400"><a href="cambiarDestacadoEvento.php?id='.$row[id].'&destacado='.$row[destacado].'&idplan='.$row[plan_id].'"><img src="../imagenes/'. $imagenDestacado. '" width="50" height="50" alt="Destacado" /></a></strong></span> </td>
											<td>
											<p align="center"><span style="FONT-SIZE: 8pt"><font color="#315090"></font>
														<strong style="font-weight: 400"><a href="cambiarActivoEvento.php?id='.$row[id].'&activo='.$row[activo].'&idplan='.$row[plan_id].'"><img src="../imagenes/'. $imagenActivo. '" width="50" height="50" alt="Inactivo" /></a></strong></span> </td>
											
											<td>			
											<p align="center"><span style="FONT-SIZE: 8pt"><font color="#315090"></font>
														<strong style="font-weight: 400"><a href="editarEvento.php?id='.$row[id].'"><img src="../imagenes/editar.png" width="50" height="50" alt="Editar" /></a></strong></span> </td>
										  </tr>';
									 } 
									  echo'</table><br><br>'; 
									 
									
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

