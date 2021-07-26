<?php

    include("../../../../conexion/conexionServer.php");
    $Cod_Encuentro=$_POST["Cod_Encuentro"];
    $Fecha= $_POST["Fecha"];
    $Hora= $_POST["Hora"];
    $idCancha= $_POST["idCancha"];
    $idJuezuno= $_POST["Id_Juezuno"];
    $idJuezdos= $_POST["Id_Juezdos"];
    $idJueztres= $_POST["Id_Jueztres"];

    $sql = "UPDATE id17287989_torneovoleibol.encuentro 
            SET Fecha='".$_POST["Fecha"]."', Hora='".$_POST["Hora"]."',
            idCancha='$idCancha', Id_Juezuno='$idJuezuno', 
            Id_Juezdos='$idJuezdos', Id_Jueztres='$idJueztres'
            WHERE Cod_Encuentro='$Cod_Encuentro'";

$actualizar = mysqli_query($conexion, $sql);

if ($actualizar) {
    header("location: listarEncuentros.php");
} else {
    echo "Error al Ingresar datos ";
}

mysqli_close($conexion);
