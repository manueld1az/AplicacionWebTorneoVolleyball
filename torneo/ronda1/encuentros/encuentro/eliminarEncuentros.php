<?php
include("../../../../conexion/conexionServer.php");
$Cod_Encuentro = $_GET['Cod_Encuentro'];

$sql = "DELETE FROM encuentro WHERE Cod_Encuentro='$Cod_Encuentro'";

$eliminar = mysqli_query($conexion, $sql);

if ($eliminar) {
    header("location: listarEncuentros.php");
} else {
    echo "<script>alert('No se pudo eliminar');
        windows.history.go(-1);</script>";
}

?>