<?php
include("../conexion/conexionServer.php");
$sql = "INSERT INTO torneo ( nombreTorneo, descripcionTorneo )
        VALUES ( '$nombreTorneo', '$descripcionTorneo' )";
$ingresar = mysqli_query($conexion, $sql);
if ($ingresar) {
    header("location: nuevoTorneo.html");
}
?>