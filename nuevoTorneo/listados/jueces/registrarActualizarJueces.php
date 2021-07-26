<?php

    include("../../../conexion/conexionServer.php");
    $idJuez=$_POST["idJuez"];
    $Nombre = $_POST["Nombre"];
    $Telefono = $_POST["Telefono"];

    $sql = "UPDATE id17287989_torneovoleibol.jueces 
    SET Nombre='$Nombre', Telefono='$Telefono'
    WHERE idJuez='$idJuez'";

$actualizar = mysqli_query($conexion, $sql);

if ($actualizar) {
    header("location: listaJueces.php");
} else {
    echo "Error al Ingresar datos ";
}

mysqli_close($conexion);
