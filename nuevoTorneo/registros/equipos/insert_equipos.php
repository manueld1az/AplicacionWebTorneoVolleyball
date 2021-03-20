<?php
    include("../../../ignore/conexionServer.php");

    $codigoEquipo= $_POST["Codigo_Equipo"];
    $nombreColegio= $_POST["Nombre_Colegio"];
    $nombreEquipo= $_POST["Nombre_Equipo"];

    $sql = "INSERT INTO equipos(Cod_Equipo, Nombre_Colegio, Nombre_Equipo) 
            VALUES ( $codigoEquipo, '$nombreColegio', '$nombreEquipo' )";

    $registrar=mysqli_query($conexion, $sql);
    if ( $registrar ) {
        header("location: ../../listados/equipos/listaEquipos.php");
    } else {
        echo "Error: ";
    }
?>