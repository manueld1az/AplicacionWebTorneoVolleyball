<?php
    include("../../../../../conexion/conexionServer.php");

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
    $sql = "INSERT INTO encuentro(Grupo, Fecha, Hora, Cod_Equipo1, Ptos_Equipo2, Cod_Equipo2, 
            Ptos_Equipo2, idCancha, Id_Juezuno, Id_Juezdos, Id_Jueztres) 
            VALUES ( $Grupo, $Fecha, $Hora, $codigoEquipo1, $ptosEquipo1, $codigoEquipo2, 
                    $ptosEquipo2, $idCancha, $idJuezuno, $idJuezdos, $idJueztres)";

    if (mysqli_query($conexion, $sql)) {
        header("location: ../../encuentro/listarEncuentros.php");
    } else {
        echo "Error: ";
    }
    $conexion->close();
?>