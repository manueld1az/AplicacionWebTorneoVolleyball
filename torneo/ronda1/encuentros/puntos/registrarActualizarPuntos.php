<?php
    include("../../../../conexion/conexionServer.php");
    $NumregistroPuntos=$_POST["NumregistroPuntos"];
    $puntos= $_POST["puntos"];
    $idJugadora= $_POST["idJugadora"];
    $codigoEquipo= $_POST["codigoEquipo"];
    $codigoEncuentro= $_POST["codigoEncuentro"];
    $codigoSet= $_POST["codigoSet"];

    $sql = "UPDATE puntaje
    SET puntos='$puntos', codigoEquipo='$codigoEquipo', codigoEncuentro='$codigoEncuentro', 
        codigoSet='$codigoSet'
    WHERE NumregistroPuntos='$NumregistroPuntos'";

$actualizar = mysqli_query($conexion, $sql);

if ($actualizar) {
    header("location: listarPuntos.php");
} else {
    echo "Error al Ingresar datos ";
}

mysqli_close($conexion); 
?>