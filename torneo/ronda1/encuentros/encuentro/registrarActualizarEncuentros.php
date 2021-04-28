<?php
    include("../../../../conexion/conexionServer.php");
    $NumregistroEncuentro=$_POST["NumregistroEncuentro"];
    $Grupo= $_POST["Grupo"];
    $Fecha= $_POST["Fecha"];
    $Hora= $_POST["Hora"];
    $codigoEquipo1= $_POST["Cod_Equipo1"];
    $ptosEquipo1= $_POST["Ptos_Equipo1"];
    $codigoEquipo2= $_POST["Cod_Equipo2"];
    $ptosEquipo2= $_POST["Ptos_Equipo2"];
    $idCancha= $_POST["idCancha"];
    $idJuezuno= $_POST["Id_Juezuno"];
    $idJuezdos= $_POST["Id_Juezdos"];
    $idJueztres= $_POST["Id_Jueztres"];

    $sql = "UPDATE encuentro 
    SET Grupo='$Grupo', Fecha='".$_POST["Fecha"]."', Hora='".$_POST["Hora"]."',
        Cod_Equipo1='$codigoEquipo1', Ptos_Equipo1='$ptosEquipo1', Cod_equipo2='$codigoEquipo2', 
        Ptos_Equipo2='$ptosEquipo2', idCancha='$idCancha', Id_Juezuno='$idJuezuno', 
        Id_Juezdos='$idJuezdos', Id_Jueztres='$idJueztres'
    WHERE NumregistroEncuentro='$NumregistroEncuentro'";

$actualizar = mysqli_query($conexion, $sql);

if ($actualizar) {
    header("location: listarEncuentros.php");
} else {
    echo "Error al Ingresar datos ";
}

mysqli_close($conexion); 
?>