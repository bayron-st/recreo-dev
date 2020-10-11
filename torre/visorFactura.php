<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php
    $archivo = $_GET['archivo'];
?>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>El Recreo es de Todos</title>
</head>

<body>
</body>

                                     <div align="center"><strong>Viauslizando Factura de Créditos Participante </strong><br />
                                     </div>          
                                     <br />  
                                     <div align="center">
                                     	<img src="../imagenes/facturas/<?php echo $archivo; ?>" width="70%" >
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

	

</html>