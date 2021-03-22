<?php
include("../../../conexion/conexionServer.php");
$NumeroRegistro = $_GET['NumeroRegistro'];

$sql = "DELETE FROM jugadoras WHERE NumeroRegistro='$NumeroRegistro'";

$eliminar = mysqli_query($conexion, $sql);

if ($eliminar) {
    header("location: listaJugadoras.php");
} else {
    echo "<script>alert('No se pudo eliminar');
         windows.history.go(-1);</script>";
}

?>