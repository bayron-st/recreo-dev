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
                                 <div class="container" id="generalMenu">    
                                        <nav>
                                            <ul class="fancyNav" style="width:100%;">
                                                  <li id="news" class="opcionMenuB"><a href="listaPlanes.php" class="opcionMenuB">Lista de Destinos</a></li>
                                                  <li id="news" class="opcionMenuE"><a href="salirLogin.php" class="opcionMenuB">Salir</a></li>
                                            </ul>
                                        </nav>   
                               </div>
                               <br />
                                             <div align="center"><strong>Agregar Destinos </strong><br />
                                             </div>
                                             <br />
                               <br />
                               
                               <div align="center">
                                         <form action="guardarPlan.php" method="post" name="contact02" enctype="multipart/form-data">                                                
                                             <table width="65%" border="1" align="center" cellpadding="2" cellspacing="2">   
                                             	<tr>
                                             		<td width="20%" bgcolor="#93A5C4" align="center">
                                                    	<label for="workname">Nombre del Destino:</label> 
                                                    </td>
                                                    <td width="80%" align="center">
                                             			<input type="text" id="nombre" name="nombre" class="required input_field" value="" size="80"/>
                                                    </td>
                                             	</tr><tr>
                                             		<td width="20%" bgcolor="#93A5C4" align="center">
                                                    	<label for="technique">Descripción:</label>  
                                                    </td>
                                                    <td width="80%" align="center">
                                             			<textarea class="form-control" id="descripcion" name="descripcion" rows="6" cols="80"></textarea>
                                                    </td>
                                             	</tr>
                                                <tr>
                                             		<td width="20%" bgcolor="#93A5C4" align="center">
                                                    	<label for="materials">Contenido:</label>  
                                                    </td>
                                                    <td width="80%" align="center">
                                             			<textarea id="contenido" name="contenido" rows="6" cols="80"></textarea>
                                                    </td>
                                             	</tr>
                                                <tr>
                                             		<td width="20%" bgcolor="#93A5C4" align="center">
                                                    	<label for="materials">Id Youtube:</label>  
                                                    </td>
                                                    <td width="80%" align="center">
                                             			<input type="text" id="idYoutube" name="idYoutube" class="required input_field" value="" size="80"/>
                                                    </td>
                                             	</tr>
                                             </table>                                                                                                     
                               				 <br />                                                
                                             <button type="submit">Guardar Datos del Nuevo Destino</button>                                                
                                          </form>
                                 
                                 </div>
                            <!-- InstanceEndEditable -->                                                                                                                 				   
                       
                	</div>                                 
       </div>
       
       
       <div class="container" id="generalContenidoInfo">
       				<div id="centrado"   >
					
					
						<!-- InstanceBeginEditable name="EditRegion3" -->
                            Esta sección puede agregar un plan de AkiXtrem.
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

