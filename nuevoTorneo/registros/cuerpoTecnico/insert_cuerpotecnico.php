<?php
    include("../../../conexion/conexionServer.php");

    $id_Cuerpotecnico= $_POST["id_Cuerpotecnico"];
    $Nombre= $_POST["Nombre"];
    $Cargo= $_POST["Cargo"];
    $Telefono= $_POST["Telefono"];
    $Cod_equipo= $_POST["Cod_equipo"];

    $sql = "INSERT INTO cuerpotecnico ( id_Cuerpotecnico, Nombre, Cargo, fechaNacimiento, Telefono, Cod_equipo ) 
            VALUES ( '$id_Cuerpotecnico', '$Nombre', '$Cargo', '".$_POST["fechaNacimiento"]."', $Telefono, $Cod_equipo )";

    $registrar=mysqli_query($conexion, $sql);

    if ( $registrar ) {
        header("location: ../../listados/cuerpoTecnico/listaCuerpoTecnico.php");
    } else {
        echo "Error: ";
    }
    $conexion->close();
?>