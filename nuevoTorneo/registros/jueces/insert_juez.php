<?php
    include("../../../conexion/conexionServer.php");

    $Id_Juez= $_POST["Id_Juez"];
    $Nombre= $_POST["Nombre"];
    $Telefono= $_POST["Telefono"];

    $sql = "INSERT INTO jueces ( idJuez, Nombre, Telefono ) 
            VALUES ( $Id_Juez, '$Nombre', $Telefono )";

    $registrar=mysqli_query($conexion, $sql);

    if ( $registrar ) {
        header("location: ../../listados/jueces/listaJueces.php");
    } else {
        echo "Error: ";
    }
?>