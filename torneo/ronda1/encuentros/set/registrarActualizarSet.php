<?php

include("../../../../conexion/conexionServer.php");
$NumeroRegistro = $_POST["NumeroRegistro"];
$puntosEquipo1 = $_POST["Ptos_Equipo1"];
$puntosEquipo2 = $_POST["Ptos_Equipo2"];

$sql = "UPDATE id17287989_torneovoleibol.zet
        SET Ptos_Equipo1='$puntosEquipo1', Ptos_Equipo2='$puntosEquipo2'
        WHERE NumeroRegistro='$NumeroRegistro'";

$actualizar = mysqli_query($conexion, $sql);

if ($actualizar) {
    header("location: listarSet.php");
} else {
    echo "Error al Ingresar datos ";
}

mysqli_close($conexion);
