<?php
    include("../../../../../conexion/conexionServer.php");

    $puntos= $_POST["puntos"];
    $idJugadora= $_POST["idJugadora"];
    $codigoEquipo= $_POST["codigoEquipo"];
    $codigoEncuentro= $_POST["codigoEncuentro"];
    $codigoSet= $_POST["codigoSet"];
    $sql = "INSERT INTO puntaje(puntos, idJugadora, codigoEquipo, codigoEncuentro, codigoSet) 
            VALUES ( $puntos, $idJugadora, $codigoEquipo, $codigoEncuentro, $codigoSet)";

    if (mysqli_query($conexion, $sql)) {
        header("location: ../../puntos/listarPuntos.php");
    } else {
        echo "Error: ";
    }
    $conexion->close();
?>