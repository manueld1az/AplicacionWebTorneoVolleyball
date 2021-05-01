<?php
include("../../../../conexion/conexionServer.php");
$NumeroRegistro = $_GET['NumeroRegistro'];

$sql = "DELETE FROM zet WHERE NumeroRegistro='$NumeroRegistro'";

$eliminar = mysqli_query($conexion, $sql);

if ($eliminar) {
    header("location: listarSet.php");
} else {
    echo "<script>alert('No se pudo eliminar');
        windows.history.go(-1);</script>";
}
