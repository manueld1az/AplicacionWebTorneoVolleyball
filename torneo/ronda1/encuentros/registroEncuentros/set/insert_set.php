<?php
    include("../../../../../conexion/conexionServer.php");
    $sql = "SELECT MAX(NumeroRegistro) AS ultimoNumeroRegistro FROM zet";
    $consulta = mysqli_query($conexion, $sql);

    $ultimoNumeroRegistro=mysqli_fetch_array($consulta);
    $numeroRegistro=$ultimoNumeroRegistro['ultimoNumeroRegistro'] + 1;

    $codSet= $_POST["Cod_Set"];
    $codEncuentro= $_POST["Cod_Encuentro"];
    $ptosEquipo1= $_POST["Ptos_Equipo1"];
    $ptosEquipo2= $_POST["Ptos_Equipo2"];
    $sql = "INSERT INTO zet( NumeroRegistro, Cod_Set, Cod_Encuentro, Ptos_Equipo1, Ptos_Equipo2) 
            VALUES ( $numeroRegistro, $codSet, $codEncuentro, $ptosEquipo1, $ptosEquipo2)";

    if (mysqli_query($conexion, $sql)) {
        header("location: ../../set/listarSet.php");
    } else {
        echo "Error: ";
    }
    $conexion->close();
?>