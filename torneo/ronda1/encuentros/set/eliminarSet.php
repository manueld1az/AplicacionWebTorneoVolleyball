<?php
include("../../../../conexion/conexionServer.php");
$NumregistroSet = $_GET['NumregistroSet'];

$sql = "DELETE FROM zet WHERE NumregistroSet='$NumregistroSet'";

$eliminar = mysqli_query($conexion, $sql);

if ($eliminar) {
    header("location: listarSet.php");
} else {
    echo "<script>alert('No se pudo eliminar');
        windows.history.go(-1);</script>";
}

?>