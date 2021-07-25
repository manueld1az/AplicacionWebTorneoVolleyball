<?php

    include("../../../conexion/conexionServer.php");

    $Id_Jugadora= $_POST["Id_Jugadora"];
    $Nombre= $_POST["Nombre"];
    $Telefono= $_POST["Telefono"];
    $Cod_equipo= $_POST["Cod_equipo"];
    $sql = "INSERT INTO jugadoras(Id_Jugadora, Nombre, FechaNacimiento, Telefono, Cod_equipo) 
            VALUES ( $Id_Jugadora, '$Nombre', '".$_POST["fechaNacimiento"]."',
                     $Telefono, $Cod_equipo)";

    if (mysqli_query($conexion, $sql)) {
        header("location: ../../listados/jugadoras/listaJugadoras.php");
    } else {
        echo "Error: ";
    }
    $conexion->close();
