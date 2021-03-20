<?php
    include("../../../ignore/conexionServer.php");

    $Nombre= $_POST["Nombre"];
    $Cargo= $_POST["Cargo"];
    $Telefono= $_POST["Telefono"];
    $Cod_equipo= $_POST["Cod_equipo"];

    $sql = "INSERT INTO cuerpotecnico ( Nombre, Cargo, fechaNacimiento, Telefono, Cod_equipo ) 
            VALUES ( '$Nombre', '$Cargo', '".$_POST["fechaNacimiento"]."', $Telefono, $Cod_equipo )";

    $registrar=mysqli_query($conexion, $sql);

    if ( $registrar ) {
        header("location: ../../listados/cuerpoTecnico/listaCuerpoTecnico.php");
    } else {
        echo "Error: ";
    }
    $conexion->close();
?>