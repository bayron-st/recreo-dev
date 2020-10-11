
									<?php           				
									            session_name("tetra");						
												session_start();
  												unset($_SESSION['identificacion']); 
  												unset($_SESSION['nombres']);
  												unset($_SESSION['idpais']);
  												unset($_SESSION['idparticipante']);
												session_destroy();
												echo"<script language='javascript'>window.location='indexDos.php'</script>;";
												exit();
									?>