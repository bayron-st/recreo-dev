
<?php require_once('../conexiones/elrecreoweb.php'); ?>

<?php

// esta archivo insertara los datos del formulario a la base de datos

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$contenido = $_POST['contenido'];
$idYoutube = $_POST['idYoutube'];

$sql = "UPDATE PLANES SET nombre = '".$nombre."', descripcion = '".$descripcion."', id_youtube = '".$idYoutube."', contenido = '".$contenido."' WHERE id = ".$id. " ";
mysqli_query($conn, $sql);
echo"<script language='javascript'>window.location='editarPlan.php?id=".$id."'</script>;";

/*
if (mysqli_query($conn, $sql)) {
    echo"<script language='javascript'>window.location='editarPlan.php?id=".$id."'</script>;";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
 
*/
?>