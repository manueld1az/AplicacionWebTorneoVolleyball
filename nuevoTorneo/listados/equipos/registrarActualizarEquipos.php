<?php

    include("../../../conexion/conexionServer.php");
    $NumeroRegistro=$_POST["NumeroRegistro"];
    $codigoEquipo=$_POST["Cod_Equipo"];
    $nombreColegio = $_POST["Nombre_Colegio"];
    $nombreEquipo = $_POST["Nombre_Equipo"];

    $sql = "UPDATE id17287989_torneovoleibol.equipos 
    SET Nombre_Colegio='$nombreColegio', Nombre_Equipo='$nombreEquipo',
    Cod_Equipo='$codigoEquipo'
    WHERE NumeroRegistro='$NumeroRegistro'";

$actualizar = mysqli_query($conexion, $sql);

if ($actualizar) {
    header("location: listaEquipos.php");
} else {
    echo "Error al Ingresar datos ";
}

mysqli_close($conexion);
