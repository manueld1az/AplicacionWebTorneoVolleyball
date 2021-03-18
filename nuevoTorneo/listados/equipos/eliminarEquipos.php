<?php
include("../../../ignore/conexionServer.php");
$codigoEquipo=$_GET["Cod_Equipo"];

$sql = "DELETE FROM equipos WHERE Cod_Equipo='$codigoEquipo'";

$eliminar = mysqli_query($conexion, $sql);

if ($eliminar) {
    header("location: listaEquipos.php");
} else {
    echo "<script>alert('No se pudo eliminar');
         windows.history.go(-1);</script>";
}

?>