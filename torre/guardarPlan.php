
<?php require_once('../conexiones/elrecreoweb.php'); ?>

<?php

// esta archivo insertara los datos del formulario a la base de datos

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$contenido = $_POST['contenido'];
$idYoutube = $_POST['idYoutube'];
$sql = "INSERT INTO PLANES (nombre, descripcion, id_youtube, contenido, destacado, activo) VALUES ('".$nombre."', '".$descripcion."', '".$idYoutube."', '".$contenido."', false, true)";
mysqli_query($conn, $sql);
echo"<script language='javascript'>window.location='listaPlanes.php'</script>;";

?>