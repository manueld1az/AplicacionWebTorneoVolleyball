<?php
include("../../../../conexion/conexionServer.php");
$NumregistroPuntos = $_GET['NumregistroPuntos'];

$sql = "DELETE FROM puntaje WHERE NumregistroPuntos='$NumregistroPuntos'";

$eliminar = mysqli_query($conexion, $sql);

if ($eliminar) {
    header("location: listarPuntos.php");
} else {
    echo "<script>alert('No se pudo eliminar');
        windows.history.go(-1);</script>";
}

?>