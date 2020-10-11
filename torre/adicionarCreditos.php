<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla4.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->

<?php require_once('../conexiones/elrecreoweb.php'); ?>


<?php

	if (isset($_POST['identificacion'])) {
		$mensaje = "";
		$error = "";
		$fileName ="";
		$identificacion = $_POST['identificacion'];
		$paisId = $_POST['pais'];
		$cantidad = $_POST['cantidad'];
		$factura = $_POST['factura'];
		$nit = $_POST['nit'];
		$nombreTienda = $_POST['nombreTienda'];
		$direccionTienda = $_POST['direccionTienda'];
		$telefonoTienda = $_POST['telefonoTienda'];
	}

	if (!empty($identificacion) && $identificacion!='' && !empty($nit) && $nit!=''){	
		
        //consulta de sig del pais
		$query_pais = "SELECT ID_PAIS_SIG FROM paises WHERE ID_PAIS = ".$paisId;
		$qry_pais = mysqli_query($connElrecqcgWeb, $query_pais) or die(mysqli_error());												 												 
		$row_pais = mysqli_fetch_array($qry_pais, MYSQLI_ASSOC);
		$sigPais = $row_pais["ID_PAIS_SIG"];

		//Consultados identificacion del cliente
		$query_participante = "SELECT ID_PARTICIPANTE FROM participantes WHERE ID_PAIS = '" .$sigPais. "' AND IDENTIFICACION = '" .$identificacion . "' LIMIT 1";
		echo $query_participante;
		$participante = mysqli_query($connElrecqcgWeb, $query_participante) or die(mysqli_error());												 												 
		$rowParticipante = mysqli_fetch_array($participante, MYSQLI_ASSOC);
		$idParticipante = $rowParticipante["ID_PARTICIPANTE"]; 		 
		if (empty($idParticipante) || $idParticipante==''){
			$error = "No existe la identificacion del Participante";
		}else{
			
			
			if ($_FILES['archivo']["error"] > 0)
			  {
				$error = "No se selecciono ningun archivo de la factura";
			  }
			else
			  {
				  /*ahora co la funcion move_uploaded_file lo guardaremos en el destino que queramos*/
				  if ($_FILES[uploadedfile][size] < 500000)
				  {
					  $fileName = $_FILES['archivo']['name'];
					  $fileNameCmps = explode(".", $fileName);
					  $fileExtension = strtolower(end($fileNameCmps));
					  $allowedfileExtensions = array('image/jpeg', 'jpg', 'JPG', 'jpeg', 'JPEG');
					  echo "   ....  " . $fileExtension . "   ....  ";
					  if (in_array($fileExtension, $allowedfileExtensions))
					  {
						  move_uploaded_file($_FILES['archivo']['tmp_name'],"../imagenes/facturas/" . $_FILES['archivo']['name']);
						  //echo " Ha sido subido satisfactoriamente";
						  //echo "<img src='uploads/$file_name' >";
					  }
					  else
					  {
						  $error = " Solo se permite subir archivos jpg";
					  }
				  }
				  else
				  {
					  $error = " El Archivo no debe superar los 500 KB";
				  }
			  }	
			
			
			if (empty($error) || $error==''){
			
			
				//Consultadmos si existe tienda o se registra la tienda
				$query_tienda = "SELECT ID_TIENDA FROM tiendas WHERE ID_PAIS = " .$paisId. " AND NIT = '" .$nit . "' LIMIT 1";
				$tienda = mysqli_query($connElrecqcgWeb, $query_tienda) or die(mysqli_error());												 												 
				$rowTienda = mysqli_fetch_array($tienda, MYSQLI_ASSOC);
				$idTienda = $rowTienda["ID_TIENDA"]; 		 
				if (empty($idTienda) || $idTienda==''){
					//Insertamos la tienda			
					$queryInsertTienda = "INSERT INTO tiendas (ID_PAIS , NIT , NOMBRE, DIRECCION, TELEFONO) VALUES (".$paisId.",'".$nit."', '".$nombreTienda."', '".$direccionTienda."', '".$telefonoTienda."')";
																
					if (mysqli_query($connElrecqcgWeb, $queryInsertTienda)){ 
						//recibo el último id
						$idTienda = mysqli_insert_id($connElrecqcgWeb); 
						//echo $ultimo_id; 
						$mensaje = "Se realizo correctamente el registro de la Tienda"; 
					}else{ 
						$error = "No se realizo correctamente el registro de la Tienda"; 
					}
				}
				//Se registra creditos al participante
				if (!empty($idTienda) && $idTienda != ''){					
					$tipo = "FACTURA";
					$queryInsertCreditos = "INSERT INTO creditos (ID_PARTICIPANTE, ID_TIENDA, TIPO, CANTIDAD , FACTURA, ARCHIVO,  FECHA, usuario) VALUES (".$idParticipante.",".$idTienda.", '".$tipo."', ".$cantidad.", '".$factura."', '".$fileName."', NOW(), 'READMIN')";
					mysqli_query($connElrecqcgWeb, $queryInsertCreditos);
					if (empty($mensaje) || $mensaje==''){
						$mensaje = "Se realizó correctamente el registro de los Creditos al participante";
					}else{
						$mensaje = $mensaje . ", y se realizó correctamente el registro de los Creditos al participante";
					}
				} else {
				    echo 'error...';
				}
			
			}
		}
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


                                     
<script>
    function isNull(campo, nombre){
		valor = document.getElementById(campo, nombre).value;
		if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
			alert('ERROR: El campo ' + nombre + ' no debe ir vacío o lleno de solamente espacios en blanco');
			return false;
		}
		return true;
	}
	
	function validacion() {
		valido = isNull("identificacion", "'Identificación'");	
		if(valido){
			valido = isNull("cantidad", "'Cantidad'");
		}
		if(valido){
			valido = isNull("factura", "'Factura'");
		}
		if(valido){
			valido = isNull("nit", "'Identificación de la Tienda'");
		}
		if(valido){
			valido = isNull("nombreTienda", "'Nombre Tienda'");
		}
		/*
		if(valido){
			valido = isNull("direccionTienda", "'Dirección Tienda'");
		}
		if(valido){
			valido = isNull("telefonoTienda", "'Teléfono Tienda'");
		}
		*/
		if(valido){
			valido = isNull("archivo", "'Archivo de la Factura'");
		}
		return valido;
	}
</script>

<!-- InstanceEndEditable -->
 		<!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
	
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>             
		<script src="../assets2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../assets2/css/styles2.css" />
        <link href="../assets2/css/bootstrap.css" rel="stylesheet">
        <link href="../assets2/css/bootstrap-responsive.css" rel="stylesheet"> 
        <link href="../assets2/css/estilogeneral.css"  rel="stylesheet" media="all">
        
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
                            	<?php require_once('menuAdministracion.php'); ?>
                            <!-- InstanceEndEditable -->                                                                                                                 				   
                       
                	</div>                                 
       </div>
       
       
       <div class="container" id="generalContenidoInfo">
       				<div id="centrado"   >
					
					
						<!-- InstanceBeginEditable name="EditRegion3" -->
                        
                                     <div align="center"><strong>Adicionar Créditos Participante </strong><br />
                                     </div>          
                                     <br />  
                                     <div align="center">
										 <?php 
                                            if (!empty($mensaje) && $mensaje!=''){
                                                echo '<p style="color:#006600";>'.$mensaje.'</p>';												
                                            }
											if (!empty($error) && $error!=''){
                                                echo '<p style="color:#FF0000";>'.$error.'</p>';
                                            }
                                         ?>
                                         <br />
                                     </div>  
                                     
                                     
                                                                 
                                     <form action="adicionarCreditos.php" method="post" onsubmit="return validacion()" enctype="multipart/form-data">
                                     
                                         <table id="tbFormulario" class="table table-striped table-bordered table-sm" cellspacing="0" width="50%">
                                             
                                              <tbody>
                                              

    
                                                	<tr>
                                                        <td>País del  Participante:</td>	
                                                        <td>
                                                        	<?php
                                                                $query_Paises = "SELECT ID_PAIS, NOMBRE FROM paises ";
                                                                $paises = mysqli_query($connElrecqcgWeb, $query_Paises) or die(mysql_error());															
                                                            ?>
                                                            <select name="pais" id="pais">
                                                                <?php foreach ($paises as $pais): ?>  
                                                                	<option value="<?php echo $pais['ID_PAIS']; ?>"><?php echo $pais['NOMBRE']; ?></option>                                                      			<?php endforeach; ?> 
                                                            
                                                            </select>
                                                        </td>																				
                                                  	</tr>
                                                    <tr>
                                                        <td>Identificación Participante:</td>	
                                                        <td><input type="text" name="identificacion" id="identificacion"  required/></td>																				
                                                  	</tr>
                                                	<tr>
                                                        <td>Cantidad de Creditos: </td>	
                                                        <td><input type="text" name="cantidad" id="cantidad"  required/></td>																				
                                                  	</tr>
                                                	<tr>
                                                        <td>No. Factura Compra:</td>	
                                                        <td><input type="text" name="factura" id="factura"  required/></td>																				
                                                  	</tr>                                                    
                                                	<tr>
                                                        <td>Identificación de la Tienda:</td>	
                                                        <td><input type="text" name="nit" id="nit"  required/></td>																				
                                                  	</tr>                                                    
                                                	<tr>
                                                        <td>Nombre de la Tienda:</td>	
                                                        <td><input type="text" name="nombreTienda" id="nombreTienda"  required/></td>																				
                                                  	</tr>                                               
                                                	<tr>
                                                        <td>Dirección de la Tienda:</td>	
                                                        <td><input type="text" name="direccionTienda" id="direccionTienda" /></td>																				
                                                  	</tr>                                               
                                                	<tr>
                                                        <td>Teléfono de la Tienda:</td>	
                                                        <td><input type="text" name="telefonoTienda" id="telefonoTienda" /></td>																			
                                                  	</tr>                                                
                                                	<tr>
                                                        <td>Upload a File:</td>	
                                                        <td>                                                            
                                                            <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
                                                            <input type="file" name="archivo" id="archivo" accept=" .jpg"  required></input>  
                                                         </td>																			
                                                  	</tr>                                               
                                                	<tr>
                                                        <td></td>	
                                                        <td><input type="submit"  value="Adicionar"/></td>																				
                                                  	</tr>                                                    
                                              </tbody>
                                         </table>
                                    </form>
                            
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

