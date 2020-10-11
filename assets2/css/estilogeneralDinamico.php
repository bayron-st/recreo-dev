<?php require_once('../../conexiones/akixtremWeb.php'); ?>
<?php
	header('content-type:text/css');
	
	
	
	
	
	mysql_select_db($database_AkixtremWeb, $AkixtremWeb);
	mysql_query ("SET NAMES 'utf8'");
	$query_Recordset1 = "SELECT a.id, a.nombre, valor FROM PARAMETROS a";
	$Recordset1 = mysql_query($query_Recordset1, $AkixtremWeb) or die(mysql_error());
	$row_Recordset1 = mysql_fetch_assoc($Recordset1);
	$totalRows_Recordset1 = mysql_num_rows($Recordset1);
	do { 
		$nombre = $row_Recordset1['nombre'];
		$valor = $row_Recordset1['valor'];
		switch ($nombre) {
			case "colorPrincipal":
				$colorPrincipal = $valor;
				break;
			case "colorBloqueMenu":
				$colorBloqueMenu = $valor;
				break;
			case "colorBloqueContenidoBajo":
				$colorBloqueContenidoBajo = $valor;
				break;
			case "colorBloqueContenidoDerecha":
				$colorBloqueContenidoDerecha = $valor;
				break;
			case "colorBloquePie":
				$colorBloquePie = $valor;
				break;
			case "colorContenidoGeneral":
				$colorContenidoGeneral = $valor;
				break;
		}
		
	} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); 
	
	/*
	$colorPrincipal = '#508EA1';
	$colorBloqueMenu = '#32515F';
	$colorBloqueContenidoBajo = '#94AEBB';
	$colorBloqueContenidoDerecha = '#416672';
	$colorBloquePie = '#32515F';
	$colorContenidoGeneral = '#FB9444';

*/

echo <<<FINCSS






@charset "utf-8";
/* CSS Document */

body{	
    font-family: verdana, arial;
    background-color: $colorPrincipal;
	/*background-image: url(../../imagenes/fondo1.png); */
	width:100%;
	height:100%;
}

a:link {
	color:#FFFFFF;
	/*text-decoration: underline;  a no ser que aplique estilos a los vínculos para que tengan un aspecto muy exclusivo, es recomendable proporcionar subrayados para facilitar una identificación visual rápida */
}
a:visited {
	color: #FFFFFF;
	/*text-decoration: underline;*/
}



#general{
	//min-width: 165px;  
    margin-top:10px;
    border-radius:10px;
	width:90%;
	height:10%;
}


#generalMenu{
	width:90%;
	height:20%;
	//min-width: 165px;  
    margin-top:10px;
    background-color: $colorBloqueMenu;
    border-radius:10px;	
	/*background-image: url(../../imagenes/fondo2.png);*/
	font-size:7px;
}

#generalContenido{
	width:90%;
	height:20%;
    margin-top:5px;
    background-color: $colorContenidoGeneral;
    border-radius:10px;
	background-image: url(../../imagenes/fondo5.png);
}


#generalContenidoInfo{
	width:90%;
    margin-top:5px;
    background-color: $colorBloqueContenidoBajo ;
    border-radius:10px;
	/*background-image: url(../../imagenes/fondo4.png);*/
}


#generalPie{
	width:90%;
	height:20%; 
    margin-top:5px;
    background-color: $colorBloquePie;
    border-radius:10px;
	/*background-image: url(../../imagenes/fondo2.png);*/
}


#logo{
    width: 30%;
    color:#FF4000;
    margin-top: 1%;
    margin-left: 1%;
    margin-right:1%;
    float:left;  
	
}
#logoCentro{
    width: 30%;
    color:#FF4000;
    margin-top: 1%;
    margin-left: 1%;
    margin-right:1%;
    float:left;  
}


#logoSyDes{
    width: 30%;
    margin-top: 3%;
    margin-left: 1%;
    margin-right:1%;
    float:right;  
}



#contacto
{    
    width: 95%;
    margin-top: 10%;
    margin-left: 2%;
    border-radius:5px;
	alignment-adjust: left;
    
}





#centrado
{    
    width: 90%;
    margin-top: 2%;
    margin-left: 5%;
	margin-right:5%;
	margin-bottom:2%;
    border-radius:10px;
    /*border: 1px solid #848484;*/
	color:#000000;
	font-family:Tahoma, Geneva, sans-serif;
	font-size:16px;
	text-align:justify;
	
    
}

#centrado2
{    
    width: 95%;
    margin-top: 2%;
	margin-bottom:2%;
    margin-left: 2%;
	margin-right:2%;
    border-radius:10px;  
}



#izquierda
{ 
    width: 54%;
    margin-top: 3px;
    margin-left: 2%;
    border-radius:5px;
   /* border: 1px solid #848484;*/
	alignment-adjust:central;
    float:left 
       
}



#derechaPublica
{
	background-color: $colorBloqueContenidoDerecha;
    float:left; 
    width: 40%;
	height:80%;
    margin-top: 10%;
	margin-bottom: 10%;
    margin-left: 2%;
    border-radius:10px;
    border: 1px solid #423f389;
	/*background-image: url(../../imagenes/fondo3.png);*/
    
}


#centradoPublica
{
	background-color: #FFFFF;
    float:left; 
    width: 90%;
	height:80%;
    margin-top: 10%;
	margin-bottom: 10%;
    margin-left: 2%;
    border-radius:10px;
    border: 1px solid #423f389;
	background-image: url(../../imagenes/fondo3.png);
    
}


#textoDerechaPublica
{
    margin-top: 5%;
    margin-left: 5%;
	margin-right:2%;	
	color:#cccccc;
	text-align:justify;
	/*overflow-y:scroll;*/
	height:90%;
	overflow-y:scroll;
    
}



#textoCentrado
{
    margin-top: 5%;
    margin-left: 5%;
	margin-right:2%;	
	color:#cccccc;
	text-align:justify;
	/*overflow-y:scroll;*/
	height:90%;
	overflow-y:scroll;
    
}


#destacado
{    
    margin-top: 2%;
	margin-bottom:2%;
    margin-left: 2%;
	margin-right:2%;
    float:left;  
    alignment-adjust: auto;
    width: 44%;
    border-radius:10px;
    border: 1px solid #848484;
    background-color: #FFF;
	text-align:center;
	color:#060;
	
	
  overflow: hidden;
}




#destacadoTexto
{    
    min-width: 180px;        
    margin-top: 2%;
    margin-left: 15px;
    float:left;  
    alignment-adjust: auto;
    width: 42%;
    border-radius:10px;
    border: 1px solid #848484;
}





#destacado2
{        
    min-width: 75px; 
	min-height: 75px; 
    margin-top: 3px;
    margin-left: 2%;
    float:left; 
    alignment-adjust: uato;
    width: 10%;
    border-radius:15px;	
    border: 1px solid #FFF;
}


#cuerpo
{
    float:right; 
    width: 96%;
    margin-top:5px;
}

#derecha1 h3
{
    text-align: center;
    color:#fff;
}


#footer
{
    
    width: 96%;
    height: 70px;
    text-align: center;
    margin-top: 10px;
    color:#fff;
}



    border-radius: 0px;
}    

#leftMenu .accordion-heading {
    height: 34px;
    border-top: 1px solid #717171; /* inner stroke */
    border-bottom: 1px solid #5A5A5A; /* inner stroke */
    background-color: #353535; /* layer fill content */
    background-image: -moz-linear-gradient(90deg, #595b59 0%, #616161 100%); /* gradient overlay */
    background-image: -o-linear-gradient(90deg, #595b59 0%, #616161 100%); /* gradient overlay */
    background-image: -webkit-linear-gradient(90deg, #595b59 0%, #616161 100%); /* gradient overlay */
    background-image: linear-gradient(90deg, #595b59 0%, #616161 100%); /* gradient overlay */
    list-style-type:none;
}  

#leftMenu .accordion-heading  a{  
    color: #cbcbcb; /* text color */
    text-shadow: 0 1px 0 #3b3b3b; /* drop shadow */
    text-decoration:none;
    font-weight:bold;  
}

#leftMenu .accordion-heading  a:hover{  
    color:#ccc     
}

#leftMenu .accordion-heading .active {
    width: 182px;
    height: 34px;
    border: 1px solid #5b5b5b; /* inner stroke */
    background-color: #353535; /* layer fill content */
    background-image: -moz-linear-gradient(90deg, #4b4b4b 0%, #555 100%); /* gradient overlay */
    background-image: -o-linear-gradient(90deg, #4b4b4b 0%, #555 100%); /* gradient overlay */
    background-image: -webkit-linear-gradient(90deg, #4b4b4b 0%, #555 100%); /* gradient overlay */
    background-image: linear-gradient(90deg, #4b4b4b 0%, #555 100%); /* gradient overlay */
}


a.menu:after, .dropdown-toggle:after {
        content: none;
      }

    ul.nav li.dropdown:hover {
      font-weight: bold;
    

     
}
  ul.nav li.dropdown:hover ul.dropdown-menu.submenu{
    display: block;
    margin-left: 220px;
    
    margin-top: -36px;
                
    background-color:#FFF;
    font-weight: normal;
                
  } 
  
  
.opcionMenuA{
	font-size:7px;
	width:14%;
}


.opcionMenuB{
	font-size:6px;
	width:23%;
}

.opcionMenuC{
	font-size:6px;
	width:9%;
}


.opcionMenuD{
	font-size:6px;
	width:20%;
}

.opcionMenuE{
	font-size:6px;
	width:7%;
}



FINCSS;
?>