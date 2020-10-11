<?php
# Type="MYSQL"
# HTTP="true"
$hostname_elrecreoweb = "localhost";
$database_elrecreoweb = "elrecqcg_informacion";
$username_elrecreoweb = "elrecqcg_admin";
$password_elrecreoweb = "7?0U4O7$9%^FvKzV";


//$elrecqcgWeb = mysql_pconnect($hostname_elrecreoweb, $username_elrecreoweb, $password_elrecreoweb) or trigger_error(mysql_error(),E_USER_ERROR); 


//mysql_connect("$hostname_elrecreoweb","$username_elrecreoweb","$password_elrecreoweb"); // se conecta con la db
//mysql_select_db($database_elrecqcgWeb, $elrecqcgWeb);


$conn = mysqli_connect($hostname_elrecreoweb, $username_elrecreoweb, $password_elrecreoweb, $database_elrecreoweb);


/*
function cambiar_caracteres_especiales($s) {
	
		
		$s = str_replace("á","a",$s);
		$s = str_replace("Á","A",$s);
		$s = str_replace("é","e",$s);
		$s = str_replace("É","E",$s);
		$s = str_replace("í","i",$s);
		$s = str_replace("Í","I",$s);
		$s = str_replace("ó","o",$s);
		$s = str_replace("Ó","O",$s);
		$s = str_replace("ú","u",$s);
		$s = str_replace("Ú","U",$s);
		//$s = str_replace(" "," ",$s);
		$s = str_replace("ñ","n",$s);
		$s = str_replace("Ñ","N",$s);

		//$s = preg_replace('/[^a-zA-Z0-9_\.-]/', '', $s);
		return $s;
}
*/
?>


