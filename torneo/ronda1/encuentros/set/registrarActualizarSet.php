<?php
    include("../../../../conexion/conexionServer.php");
    $NumregistroSet=$_POST["NumregistroSet"];
    $codigoSet= $_POST["Cod_Set"];
    $codigoEncuentro= $_POST["Cod_Encuentro"];
    $puntosEquipo1= $_POST["Ptos_Equipo1"];
    $puntosEquipo2= $_POST["Ptos_Equipo2"];

    $sql = "UPDATE zet
    SET Cod_Set='$codigoSet', Cod_Encuentro='$codigoEncuentro', Ptos_Equipo1='$puntosEquipo1', 
    Ptos_Equipo2='$puntosEquipo2'
    WHERE NumregistroSet='$NumregistroSet'";

$actualizar = mysqli_query($conexion, $sql);

if ($actualizar) {
    header("location: listarSet.php");
} else {
    echo "Error al Ingresar datos ";
}

mysqli_close($conexion); 
?>