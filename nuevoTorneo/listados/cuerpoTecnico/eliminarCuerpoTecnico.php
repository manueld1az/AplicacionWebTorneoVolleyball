<?php
include("../../../conexion/conexionServer.php");
$id_Cuerpotecnico = $_GET['id_Cuerpotecnico'];

$sql = "DELETE FROM cuerpotecnico WHERE id_Cuerpotecnico='$id_Cuerpotecnico'";

$eliminar = mysqli_query($conexion, $sql);

if ($eliminar) {
    header("location: listaCuerpoTecnico.php");
} else {
    echo "<script>alert('No se pudo eliminar');
         windows.history.go(-1);</script>";
}

?>