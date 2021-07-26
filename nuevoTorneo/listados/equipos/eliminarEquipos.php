<?php

include("../../../conexion/conexionServer.php");
$idEquipo = $_GET['Cod_Equipo'];

$sql = "DELETE FROM id17287989_torneovoleibol.equipos WHERE Cod_Equipo='$idEquipo'";

$eliminar = mysqli_query($conexion, $sql);

if ($eliminar) {
    header("location: listaEquipos.php");
} else {
    echo "<script>alert('No se pudo eliminar');
         windows.history.go(-1);</script>";
}
