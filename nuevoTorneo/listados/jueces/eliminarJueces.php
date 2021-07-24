<?php

include("../../../conexion/conexionServer.php");
$numeroRegistro=$_GET['numeroRegistro'];

$sql = "DELETE FROM id17287989_torneovoleibol.jueces WHERE numeroRegistro='$numeroRegistro'";

$eliminar = mysqli_query($conexion, $sql);

if ($eliminar) {
    header("location: listaJueces.php");
} else {
    echo "<script>alert('No se pudo eliminar');
         windows.history.go(-1);</script>";
}
