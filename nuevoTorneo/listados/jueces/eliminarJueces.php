<?php
include("../../../ignore/conexionServer.php");
$idEquipo = $_GET['idEquipo'];

$sql = "DELETE FROM equipos WHERE idEquipo='$idEquipo'";

$eliminar = mysqli_query($conexion, $sql);

if ($eliminar) {
    header("location: listaEquipos.php");
} else {
    echo "<script>alert('No se pudo eliminar');
         windows.history.go(-1);</script>";
}

?>