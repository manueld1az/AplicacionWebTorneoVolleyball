<?php
    include("../../../../../conexion/conexionServer.php");

    $codSet= $_POST["Cod_Set"];
    $codEncuentro= $_POST["Cod_Encuentro"];
    $ptosEquipo1= $_POST["Ptos_Equipo1"];
    $ptosEquipo2= $_POST["Ptos_Equipo2"];
    $sql = "INSERT INTO puntaje(Cop_Set, Cod_Encuentro, Ptos_Equipo1, Ptos_Equipo2) 
            VALUES ( $CodSet, $codEncuentro, $ptosEquipo1, $ptosEquipo2)";

    if (mysqli_query($conexion, $sql)) {
        header("location: ../../set/listarSet.php");
    } else {
        echo "Error: ";
    }
    $conexion->close();
?>