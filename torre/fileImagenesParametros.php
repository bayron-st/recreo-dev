<?php
    
	$id = $_POST['id'];
	if ($_FILES['archivo']["error"] > 0)
	  {
	  	echo "Error: " . $_FILES['archivo']['error'] . "<br>";
	  }
	else
	  {
		  //echo "Nombre: " . $_FILES['archivo']['name'] . "<br>";
	  	  //echo "Tipo: " . $_FILES['archivo']['type'] . "<br>";
	  	  //echo "Tamaño: " . ($_FILES["archivo"]["size"] / 1024) . " kB<br>";
	  	  //echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name'];
		  
		  
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
				  move_uploaded_file($_FILES['archivo']['tmp_name'],"../imagenes/" . $_FILES['archivo']['name']);
				  //echo " Ha sido subido satisfactoriamente";
				  //echo "<img src='uploads/$file_name' >";
			  }
			  else
			  {
				  //echo " Solo se permite subir archivos jpg";
			  }
		  }
		  else
		  {
			  //echo " El Archivo no debe superar los 500 KB";
		  }
	  }	  
	  
	 echo"<script language='javascript'>window.location='editarParametro.php?id=".$id."'</script>;";
?>