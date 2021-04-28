<?php
include("../../../../conexion/conexionServer.php");
$NumregistroEncuentro = $_GET['NumregistroEncuentro'];

$sql = "DELETE FROM encuentro WHERE NumregistroEncuentro='$NumregistroEncuentro'";

$eliminar = mysqli_query($conexion, $sql);

if ($eliminar) {
    header("location: listarEncuentros.php");
} else {
    echo "<script>alert('No se pudo eliminar');
        windows.history.go(-1);</script>";
}

?>